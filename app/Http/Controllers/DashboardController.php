<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Barcha guruhlar bilan birga ularning talabalarini va dars sanalarini chaqiramiz
        $groups = Group::with(['students', 'attendanceDates', 'attendances'])->get();

        $groupData = [];

        foreach ($groups as $group) {
            // Guruhga tegishli eng so‘nggi dars sanasini topamiz
            $latestLesson = $group->attendanceDates
                ->sortByDesc('lesson_date')
                ->first();

            // Bugungi sana uchun davomat bor-yo‘qligini tekshiramiz
            $hasTodayAttendance = $group->attendances
                ->where('lesson_date', now()->toDateString())
                ->isNotEmpty();

            $groupData[] = [
                'id' => $group->id,
                'name' => $group->name,
                'students' => $group->students->count(),
                'attendance' => $hasTodayAttendance,
                'time' => optional($latestLesson)->lesson_date ?? 'Nomaʼlum vaqt',
            ];
        }

        return view('dashboard', [
            'groupsCount' => count($groupData),
            'attendanceCount' => collect($groupData)->where('attendance', true)->count(),
            'groupData' => $groupData,
        ]);
    }
}
