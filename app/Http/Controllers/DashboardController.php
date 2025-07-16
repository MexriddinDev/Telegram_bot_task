<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check()){
            $user = Auth::user();
        }else{
            $user = Contact::where('telegram_id', $request->contact_id)->first();

        }

        Auth::login($user);
        $authUser = Auth::user();
        $groups = Group::with(['students', 'attendanceDates', 'attendances'])->where('contact_id', $authUser->id)->get();

        $groupData = [];

        foreach ($groups as $group) {
            $latestLesson = $group->attendanceDates
                ->sortByDesc('lesson_date')
                ->first();

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
