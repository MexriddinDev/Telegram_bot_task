<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'username',
        'telegram_id',
    ];

    // Bitta contactda bir nechta group bo'lishi mumkin
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
