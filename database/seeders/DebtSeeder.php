<?php

namespace Database\Seeders;

use App\Models\Debt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DebtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Debt::insert([
            [
                'student_id' => 2,
                'group_id' => 1,
                'amount' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 6,
                'group_id' => 2,
                'amount' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 8,
                'group_id' => 3,
                'amount' => 200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 10,
                'group_id' => 4,
                'amount' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
