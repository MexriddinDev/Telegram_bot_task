<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Guruhga oid davomat va bahoni kiritish formasi (ko‘rsatish)
    public function create($groupId)
    {
        $group = Group::findOrFail($groupId);
        $students = $group->students; // relationshipdan foydalanamiz

        return view('attendance', compact('group', 'students'));
    }


    // Formdan kelgan ma'lumotlarni saqlash
    public function store(Request $request)
    {
        $data = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'students' => 'required|array',
            'students.*.attendance' => 'required|string',
            'students.*.attendance_note' => 'nullable|string',
            'students.*.grade' => 'required|integer|min:1|max:5',
            'students.*.grade_note' => 'nullable|string',
        ]);

        foreach ($data['students'] as $studentId => $studentData) {
            Attendance::updateOrCreate(
                [
                    'group_id' => $data['group_id'],
                    'student_id' => $studentId,
                ],
                [
                    'attendance' => $studentData['attendance'],
                    'attendance_note' => $studentData['attendance_note'] ?? null,
                    'grade' => $studentData['grade'],
                    'grade_note' => $studentData['grade_note'] ?? null,
                ]
            );
        }

        return redirect()->back()->with('success', 'Davomat va baholar muvaffaqiyatli saqlandi.');
    }


    // (Optional) Attendance ro'yxatini ko‘rsatish uchun index()
    public function index()
    {
        $attendances = Attendance::with(['student', 'group'])->get();
        return view('attendances.index', compact('attendances'));
    }
}
