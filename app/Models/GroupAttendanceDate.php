<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupAttendanceDate extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'lesson_date', 'attendance_taken'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}

