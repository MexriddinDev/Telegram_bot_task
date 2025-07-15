<?php

namespace App\Http\Controllers;

use App\Models\GroupAttendanceDate;

class GroupAttendanceDateController extends Controller
{
    public function index()
    {
        $dates = GroupAttendanceDate::with('group')->get();
        return view('group_attendance_dates.index', compact('dates'));
    }
}
