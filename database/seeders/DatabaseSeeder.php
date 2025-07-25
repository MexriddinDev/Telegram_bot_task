<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            ContactSeeder::class,
            GroupSeeder::class,
            StudentSeeder::class,
            GroupStudentSeeder::class,
            DebtSeeder::class,
            AttendanceSeeder::class,
            GroupAttendanceDateSeeder::class,
            // Add other seeders here as needed
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
