<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Groups;

class GroupSeeder extends Seeder
{
    public function run(): void
    {
        Groups::insert([
            [
                'name' => 'Beginner 1',
                'level' => 'Boshlang‘ich',
                'attendance_taken' => true,
            ],
            [
                'name' => 'Elementary A',
                'level' => 'Boshlang‘ich o‘rta',
                'attendance_taken' => false,
            ],
            [
                'name' => 'Pre-Intermediate',
                'level' => 'O‘rta',
                'attendance_taken' => true,
            ],
            [
                'name' => 'Intermediate B',
                'level' => 'O‘rta yuqori',
                'attendance_taken' => false,
            ],
        ]);
    }
}
