<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::insert([
            ['name' => 'Abdulloh Karimov', 'phone' => '+998901234567', 'group_id' => 1, 'active' => true, 'debt' => 0],
            ['name' => 'Madina Xoliqova', 'phone' => '+998919876543', 'group_id' => 1, 'active' => false, 'debt' => 150000],
            ['name' => 'Sardor Norqulov', 'phone' => '+998931112233', 'group_id' => 1, 'active' => true, 'debt' => 0],
            ['name' => 'Dilshod Bekov', 'phone' => '+998995557788', 'group_id' => 1, 'active' => false, 'debt' => 300000],

            ['name' => 'Diyor Murodov', 'phone' => '+998901112211', 'group_id' => 2, 'active' => true, 'debt' => 0],
            ['name' => 'Ozoda Qodirova', 'phone' => '+998911234123', 'group_id' => 2, 'active' => false, 'debt' => 100000],

            ['name' => 'Ali Umarov', 'phone' => '+998939998877', 'group_id' => 3, 'active' => true, 'debt' => 0],
            ['name' => 'Lola Xamidova', 'phone' => '+998907654321', 'group_id' => 3, 'active' => false, 'debt' => 200000],

            ['name' => 'Umid Safarov', 'phone' => '+998907771122', 'group_id' => 4, 'active' => true, 'debt' => 0],
            ['name' => 'Zarina Zokirova', 'phone' => '+998935551199', 'group_id' => 4, 'active' => false, 'debt' => 150000],
        ]);
    }
}


