<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Group;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index($id)
    {
        $group = Group::with([
            'students' => function ($query) {
                $query->withSum('debts as debt', 'amount');
            }
        ])->findOrFail($id);

        $activeCount = $group->students->where('debt', '<=', 0)->count();
        $debtorsCount = $group->students->where('debt', '>', 0)->count();
        $totalDebt = $group->students->sum('debt');

        return view('group', compact('group', 'activeCount', 'debtorsCount', 'totalDebt'));
    }


    public function create()
    {
        $groups = Group::all();
        return view('students.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'debt' => 'nullable|numeric',
            'groups' => 'nullable|array',
        ]);

        $student = Student::create($validated);

        if ($request->has('groups')) {
            $student->groups()->attach($validated['groups']);
        }

        return redirect()->route('students.index')->with('success', 'O‘quvchi qo‘shildi');
    }

    public function show($id)
    {
        $student = Student::with('groups')->findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $groups = Group::all();
        return view('students.edit', compact('student', 'groups'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'debt' => 'nullable|numeric',
            'groups' => 'nullable|array',
        ]);

        $student = Student::findOrFail($id);
        $student->update($validated);
        $student->groups()->sync($validated['groups'] ?? []);

        return redirect()->route('students.index')->with('success', 'O‘quvchi yangilandi');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->groups()->detach();
        $student->delete();

        return redirect()->route('students.index')->with('success', 'O‘quvchi o‘chirildi');
    }
}
