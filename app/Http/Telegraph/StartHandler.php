<?php

namespace App\Http\Telegraph;

use App\Models\Contact;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\DTO\Contact as TelegramContact;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use Illuminate\Support\Facades\Log;

class StartHandler extends WebhookHandler
{
    public function start(): void
    {
        $replyKeyboard = ReplyKeyboard::make()
            ->buttons([
                ReplyButton::make('📱 Raqamni ulashish')->requestContact(),
            ])
            ->resize();

        $this->chat->message("👋 Salom! Botga xush kelibsiz!\n\nIltimos, raqamingizni ulashing:")
            ->replyKeyboard($replyKeyboard)
            ->send();
    }

    public function handleChatMessage($message = null): void
    {
        Log::debug('Kelib tushgan webhook:', $this->data->toArray());

        try {
            $contact = $this->message->contact();
            $telegramId = $this->message->from()->id();
            if ($contact !== null) {
                $phoneNumber = $contact->phoneNumber();

                if ($phoneNumber) {
                    Log::info('Raqam qayta ishlanmoqda: ' . $phoneNumber);

                    $cleanPhoneNumber = str_replace([' ', '+'], '', $phoneNumber);
                    Log::info('phone number : ' . $cleanPhoneNumber);;
                    $validContact = Contact::where('phone_number', $cleanPhoneNumber)->first();



                    if ($validContact) {

                        $validContact->telegram_id = $telegramId;
                        $validContact->save();

                        $webUrl = 'https://6920043fbe91.ngrok-free.app/webapp?contact_id=' . $telegramId;

                        $keyboard = Keyboard::make()
                            ->buttons([
                                Button::make('🌐 Web Appni ochish')->webApp($webUrl),
                            ]);

                        $this->chat->message("✅ Raqamingiz tasdiqlandi!\n\nQuyidagi tugma orqali Web App'ni ochishingiz mumkin:")
                            ->keyboard($keyboard)
                            ->send();
                    } else {
                        Log::warning('  Noto‘g‘ri raqam urinish: ' . $phoneNumber);
                        $this->chat->message("❌ Kechirasiz, sizning raqamingiz tizimda topilmadi.")
                            ->send();
                    }
                }
            } else {
                Log::debug('Contact maʼlumotlari mavjud emas.');

                if (!$this->message->text() || !str_starts_with($this->message->text(), '/')) {
                    $replyKeyboard = ReplyKeyboard::make()
                        ->buttons([
                            ReplyButton::make('📱 Raqamni ulashish')->requestContact(),
                        ])
                        ->resize();

                    $this->chat->message("📲 Iltimos, raqamingizni ulashing:")
                        ->replyKeyboard($replyKeyboard)
                        ->send();
                }
            }
        } catch (\Exception $e) {
            Log::error('Xatolik yuz berdi: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

            $this->chat->message("⚠️ Xatolik yuz berdi. Iltimos, qayta urinib ko‘ring.")
                ->send();
        }
    }

}
