<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    public function run(): void
    {
        Group::insert([
            [
                'name' => 'Beginner 1',
                'level' => 'Boshlang‘ich',
                'contact_id' => 1,
            ],
            [
                'name' => 'Elementary A',
                'level' => 'Boshlang‘ich o‘rta',
                'contact_id' => 1,
            ],
            [
                'name' => 'Pre-Intermediate',
                'level' => 'O‘rta',
                'contact_id' => 1,
            ],
            [
                'name' => 'Intermediate B',
                'level' => 'O‘rta yuqori',
                'contact_id' => 1,
            ],
        ]);
    }
}
