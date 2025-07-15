<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Attendance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $todayGroups = Groups::with('students')->get(); // Aslida bu yerni date bo‘yicha filterlash kerak bo'lishi mumkin

        $groupData = [];

        foreach ($todayGroups as $group) {
            $studentCount = $group->students->count();

            $attendanceTaken = Attendance::where('group_id', $group->id)
                ->whereDate('lesson_date', date('Y-m-d'))
                ->exists();

            $groupData[] = [
                'name' => $group->name,
                'students' => $studentCount,
                'attendance' => $attendanceTaken,
                'time' => '08:00', // Hozircha statik, kerak bo‘lsa dars vaqti ustuni qo‘shiladi
                'id' => $group->id,
            ];
        }

        return view('dashboard', [
            'groupsCount' => count($groupData),
            'attendanceCount' => collect($groupData)->where('attendance', true)->count(),
            'groupData' => $groupData,
        ]);
    }
}
