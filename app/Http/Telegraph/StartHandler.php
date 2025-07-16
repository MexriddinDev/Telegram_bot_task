<?php

namespace App\Http\Telegraph;

use App\Models\Contact;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\DTO\Contact as TelegramContact;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;

class StartHandler extends WebhookHandler
{
    public function start(): void
    {
        $keyboard = ReplyKeyboard::make()
            ->buttons([
                ReplyButton::make('📞 Kontakt yuborish')->requestContact(),
            ])
            ->resize()
            ->oneTime();

        $this->chat->message("👋 Salom! Botga xush kelibsiz.\n\nIltimos, quyidagi tugma orqali telefon raqamingizni yuboring:")
            ->replyKeyboard($keyboard)
            ->send();
    }

    protected function handleContact(TelegramContact $telegramContact): void
    {
        // Telefon raqamini olish
        $phoneNumber = $telegramContact->phoneNumber();

        // Telefon raqamini validatsiya qilish (faqat raqamlar va '+' belgisi)
        if (!$this->isValidPhoneNumber($phoneNumber)) {
            $this->chat->message("❌ Iltimos, to‘g‘ri telefon raqamini yuboring (masalan, +998901234567). Harf yoki boshqa belgilar ishlatmang.")
                ->send();
            return;
        }

        // Bazada telefon raqamini tekshirish
        $contact = Contact::where('phone_number', $phoneNumber)->first();

        if ($contact) {
            // Agar raqam bazada bo‘lsa, veb-sayt URL manziliga yo‘naltirish
            $webUrl = 'https://b8b7449811ad.ngrok-free.app/'; // O‘zingizning URL manzilingizni qo‘ying
            $this->chat->message("✅ Telefon raqamingiz tasdiqlandi! Quyidagi havolaga o‘ting:\n\n{$webUrl}")
                ->send();
        } else {
            // Agar raqam bazada bo‘lmasa, xato xabari
            $this->chat->message("❌ Telefon raqamingiz bazada topilmadi. Iltimos, to‘g‘ri raqam yuboring yoki administrator bilan bog‘laning.")
                ->send();
        }
    }

    private function isValidPhoneNumber(string $phoneNumber): bool
    {
        // Telefon raqami faqat raqamlar va '+' belgidan iborat bo‘lishi kerak
        return preg_match('/^\+?[1-9]\d{1,14}$/', $phoneNumber);
    }
}
