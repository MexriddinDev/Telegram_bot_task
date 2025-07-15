<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Attendance::insert([
            [
                'student_id' => 1,
                'group_id' => 1,
                'lesson_date' => '2025-07-10',
                'attendance_status' => 'kelgan',
                'attendance_note' => null,
                'grade' => 5,
                'grade_note' => 'A’lo qatnashdi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2,
                'group_id' => 1,
                'lesson_date' => '2025-07-10',
                'attendance_status' => 'kelmagan',
                'attendance_note' => 'Sog‘lig‘i yo‘q edi',
                'grade' => null,
                'grade_note' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 3,
                'group_id' => 1,
                'lesson_date' => '2025-07-12',
                'attendance_status' => 'kelgan',
                'attendance_note' => null,
                'grade' => 4,
                'grade_note' => 'Yaxshi qatnashdi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
