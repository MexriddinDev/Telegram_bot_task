<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;
    protected $table = 'groups';
    protected $fillable = ['name', 'level', 'contact_id'];

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'group_student', 'group_id', 'student_id')->withTimestamps();
    }

    public function debts()
    {
        return $this->hasMany(Debt::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function attendanceDates()
    {
        return $this->hasMany(GroupAttendanceDate::class, 'group_id');
    }
}
