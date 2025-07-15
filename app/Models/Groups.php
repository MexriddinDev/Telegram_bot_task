<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $fillable = [
        'name',
        'level',
        'attendance_taken',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'group_id');
    }
}
