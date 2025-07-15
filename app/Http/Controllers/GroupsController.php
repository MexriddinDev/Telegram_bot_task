<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function groups()
    {
        $groups = Groups::withCount('students')->get();
        return view('groups', compact('groups'));
    }

    public function show($id)
    {
        $group = Groups::with('students')->findOrFail($id);

        $activeCount = $group->students->where('active', true)->count();
        $debtorsCount = $group->students->where('debt', '>', 0)->count();
        $totalDebt = $group->students->sum('debt');

        return view('group', compact('group', 'activeCount', 'debtorsCount', 'totalDebt'));
    }
}
