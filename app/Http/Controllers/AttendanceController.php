<?php


namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Groups;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function create($group_id)
    {
        $group = Groups::findOrFail($group_id);
        $students = Student::where('group_id', $group_id)->get();
        return view('attendance', compact('group', 'students'));
    }

    public function store(Request $request)
    {

        $lessonDate = date('Y-m-d');

        foreach ($request->students as $studentId => $data) {
            Attendance::create([
                'student_id'        => $studentId,
                'group_id'          => $request->group_id,
                'lesson_date'       => $lessonDate,
                'attendance_status' => $data['attendance'],
                'attendance_note'   => $data['attendance_note'],
                'grade'             => $data['grade'],
                'grade_note'        => $data['grade_note'],
            ]);
        }

        return redirect()->back()->with('success', 'Davomat saqlandi!');
    }

}
