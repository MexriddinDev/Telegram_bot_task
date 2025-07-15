<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    // Guruhlar ro‘yxati
    public function index()
    {
        // Guruhlar bilan birga bog‘langan o‘quvchilar va kontaktni yuklaymiz
        $groups = Group::with(['students', 'contact', 'attendanceDates'])
            ->get()
            ->map(function ($group) {
                // Har bir guruhga o‘quvchilar sonini qo‘shamiz
                $group->students_count = $group->students->count();

                // Guruhga tegishli eng so‘nggi dars sanasini topamiz
                $latestAttendance = $group->attendanceDates
                    ->sortByDesc('lesson_date')
                    ->first();

                // Davomat olinganmi-yo‘qmi
                $group->attendance_taken = $latestAttendance?->attendance_taken ?? false;

                return $group;
            });

        return view('groups', compact('groups'));
    }

    // Bitta guruh tafsiloti
    public function show($id)
    {
        $group = Group::with(['students', 'contact', 'attendanceDates', 'attendances', 'debts'])->findOrFail($id);

        // O‘quvchilarni hisoblab statistik ma’lumotlar tayyorlaymiz
        $activeCount = $group->students->where('active', true)->count();
        $debtorsCount = $group->students->filter(fn($s) => $s->debt > 0)->count();
        $totalDebt = $group->students->sum('debt');

        return view('group-show', compact('group', 'activeCount', 'debtorsCount', 'totalDebt'));
    }
}
