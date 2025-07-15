<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'active'];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_student', 'group_id', 'student_id')->withTimestamps();
    }

    public function debts()
    {
        return $this->hasMany(Debt::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}

