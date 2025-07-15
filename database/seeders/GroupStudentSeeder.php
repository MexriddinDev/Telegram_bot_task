<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\Student;

class GroupStudentSeeder extends Seeder
{
    public function run(): void
    {
        $studentIds = Student::pluck('id')->toArray();
        $groups = Group::all();

        $index = 0;

        foreach ($groups as $group) {
            $randomStudents = array_slice($studentIds, $index, 3); // Har bir guruhga 3 ta o‘quvchi
            $group->students()->syncWithoutDetaching($randomStudents);
            $index += 3;
        }
    }
}
