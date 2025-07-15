<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'phone', 'group_id', 'active', 'debt'];

    public function group()
    {
        return $this->belongsTo(Groups::class, 'group_id');
    }
}
