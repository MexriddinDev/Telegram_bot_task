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
                Button::make('🧩 Web Appni ochish')->webApp('https://43140ee262b1.ngrok-free.app/webapp'),
            ]);

        $this->chat->message("👋 Salom! Botga xush kelibsiz.\n\nQuyidagi tugma orqali Web ilovamizni oching:")
            ->keyboard($keyboard)
            ->send();
    }




}
