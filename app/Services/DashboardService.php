<?php

namespace App\Services;

use App\Models\Group;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardService
{
    public function handleAuthentication(Request $request)
    {
        if (Auth::check()) {
            return Auth::user();
        }
        $user = Contact::where('telegram_id', $request->contact_id)->first();
        if ($user) {
            Auth::login($user);
        }
        return $user;
    }
    public function getGroupData($userId)
    {
        $groups = Group::with(['students', 'attendanceDates', 'attendances'])
            ->where('contact_id', $userId)
            ->get();

        $groupData = [];

        foreach ($groups as $group) {
            $latestLesson = $group->attendanceDates->sortByDesc('lesson_date')->first();

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

        return $groupData;
    }
}
