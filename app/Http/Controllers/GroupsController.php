<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupsController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            $user = Contact::where('telegram_id', $request->contact_id)->first();

            if (!$user) {
                abort(403, 'Foydalanuvchi topilmadi');
            }

            Auth::login($user);
        }

        $groups = Group::with(['students', 'contact', 'attendanceDates'])
            ->where('contact_id', $user->id)
            ->get()
            ->map(function ($group) {
                $group->students_count = $group->students->count();

                $latestAttendance = $group->attendanceDates
                    ->sortByDesc('lesson_date')
                    ->first();

                $group->attendance_taken = $latestAttendance?->attendance_taken ?? false;

                return $group;
            });

        return view('groups', compact('groups'));
    }


    public function show($id)
    {
        $group = Group::with(['students', 'contact', 'attendanceDates', 'attendances', 'debts'])->findOrFail($id);

        $activeCount = $group->students->where('active', true)->count();
        $debtorsCount = $group->students->filter(fn($s) => $s->debt > 0)->count();
        $totalDebt = $group->students->sum('debt');

        return view('group-show', compact('group', 'activeCount', 'debtorsCount', 'totalDebt'));
    }
}
