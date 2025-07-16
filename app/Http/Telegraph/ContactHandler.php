<?php

namespace App\Http\Telegraph;

use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\DTO\Message;

class ContactHandler extends WebhookHandler
{



    public function handleMessage(Message $message): void
    {
        // Qanday ma'lumot bo‘lishidan qat'i nazar, xabar yuboriladi
        $this->chat->message("✅ Kontakt(raqam) yuborildi!")->send();
    }





//    public function handleMessage(Message $message): void
//    {
//        \Log::debug('📥 Message:', $message->toArray());
//
//        $contact = $message->contact();
//
//        if (!$contact) {
//            $this->chat->message("❌ Kontakt olinmadi. Faqat mobil Telegram ilovasidan foydalaning.")->send();
//            return;
//        }
//
//        $phone = $contact->phoneNumber();
//
//        $this->chat->message("📞 Telefon raqamingiz: $phone")->send();
//    }
}
