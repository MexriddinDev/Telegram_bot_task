<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Contact extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'username',
        'telegram_id',
    ];

    public function groups()
    {
        return $this->hasMany(Group::class, 'contact_id', 'id');
    }

    public function getAuthPassword()
    {
        return '';
    }


}
