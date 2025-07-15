<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TelegramContact extends Model
{
    protected $fillable = [
        'phone_number',
        'username',
        'telegram_id',
    ];

}
