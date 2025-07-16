<?php

namespace App\Services;

use App\Models\Group;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupsService
{

    public function authenticateUser(Request $request)
    {
        if (Auth::check()) {
            return Auth::user();
        }
        $user = Contact::where('telegram_id', $request->contact_id)->first();
        if (!$user) {
            return null;
        }
        Auth::login($user);
        return $user;
    }


    public function getUserGroups($userId)
    {
        return Group::with(['students', 'contact', 'attendanceDates'])
            ->where('contact_id', $userId)
            ->get()
            ->map(function ($group) {
                $group->students_count = $group->students->count();
                $latestAttendance = $group->attendanceDates
                    ->sortByDesc('lesson_date')
                    ->first();
                $group->attendance_taken = $latestAttendance?->attendance_taken ?? false;
                return $group;
            });
    }


    public function getGroupDetails($groupId)
    {
        $group = Group::with(['students', 'contact', 'attendanceDates', 'attendances', 'debts'])->findOrFail($groupId);

        $activeCount = $group->students->where('active', true)->count();
        $debtorsCount = $group->students->filter(fn($s) => $s->debt > 0)->count();
        $totalDebt = $group->students->sum('debt');

        return [
            'group' => $group,
            'activeCount' => $activeCount,
            'debtorsCount' => $debtorsCount,
            'totalDebt' => $totalDebt,
        ];
    }
}
