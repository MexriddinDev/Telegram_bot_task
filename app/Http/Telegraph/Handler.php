<?php

namespace App\Http\Telegraph;

use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Telegraph;

class Handler extends \DefStudio\Telegraph\Handlers\WebhookHandler
{
    /**
     * Create a new class instance.
     */




    public function start(): void
    {
        $keyboard = Keyboard::make()
            ->buttons([
                Button::make('🧩 Web Appni ochish')->webApp('https://d227867fee33.ngrok-free.app/webapp'),
            ]);

        $this->chat->message("👋 Salom! Botga xush kelibsiz.\n\nQuyidagi tugma orqali Web ilovamizni oching:")
            ->keyboard($keyboard)
            ->send();
    }




}

//
//namespace App\Http\Telegraph;
//
//use App\Models\TelegramContact;
//use DefStudio\Telegraph\Handlers\WebhookHandler;
//use DefStudio\Telegraph\Models\TelegraphChat;
//use DefStudio\Telegraph\Keyboard\Keyboard;
//use DefStudio\Telegraph\Keyboard\Button;
//use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
//use DefStudio\Telegraph\Keyboard\ReplyButton;
//
//class Handler extends WebhookHandler
//{
//    /**
//     * Bot ishga tushganda chaqiriladi
//     */
//    public function start(): void
//    {
//        $keyboard = ReplyKeyboard::make()
//            ->buttons([
//                ReplyButton::make('📞 Kontakt yuborish')->requestContact(),
//            ])
//            ->resize()
//            ->oneTime();
//
//        $this->chat->message("👋 Salom! Botga xush kelibsiz.\n\nIltimos, quyidagi tugma orqali telefon raqamingizni yuboring:")
//            ->replyKeyboard($keyboard)
//            ->send();
//    }
//
//    /**
//     * Foydalanuvchi kontakt yuborganida avtomatik chaqiriladi
//     */
//    public function handleContact(TelegraphChat $chat, array $contact): void
//    {
//        $raqam = $contact['phone_number'] ?? null;
//
//        if (!$raqam) {
//            $chat->message("❗ Telefon raqam topilmadi. Iltimos, faqat tugma orqali yuboring.")
//                ->send();
//            return;
//        }
//
//        // Raqamni bazadagi ro‘yxat bilan solishtirish
//        $ruxsatBor = TelegramContact::where('phone_number', $raqam)->exists();
//
//
//        if ($ruxsatBor) {
//            $keyboard = Keyboard::make()
//                ->buttons([
//                    Button::make('🌐 Web Appga kirish')->webApp('https://43140ee262b1.ngrok-free.app/webapp'),
//                ]);
//
//            $chat->message("✅ Ruxsat berildi! Quyidagi tugma orqali Web ilovaga o'tishingiz mumkin:")
//                ->keyboard($keyboard)
//                ->send();
//        } else {
//            $chat->message("🚫 Kechirasiz, sizning telefon raqamingiz ruxsat etilganlar ro'yxatida yo'q.")
//                ->send();
//        }
//    }
//}

