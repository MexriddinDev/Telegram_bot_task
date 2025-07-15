<?php

namespace Database\Seeders;

use App\Models\GroupAttendanceDate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupAttendanceDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroupAttendanceDate::insert([
            [
                'group_id' => 1,
                'lesson_date' => '2025-07-10',
                'attendance_taken' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'group_id' => 1,
                'lesson_date' => '2025-07-11',
                'attendance_taken' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'group_id' => 2,
                'lesson_date' => '2025-07-12',
                'attendance_taken' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'group_id' => 3,
                'lesson_date' => '2025-07-13',
                'attendance_taken' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'group_id' => 4,
                'lesson_date' => '2025-07-14',
                'attendance_taken' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
