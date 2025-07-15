<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::insert([
            ['name' => 'Abdulloh Karimov', 'phone' => '+998901234567', 'active' => true],
            ['name' => 'Madina Xoliqova', 'phone' => '+998919876543', 'active' => false],
            ['name' => 'Sardor Norqulov', 'phone' => '+998931112233', 'active' => true],
            ['name' => 'Dilshod Bekov', 'phone' => '+998995557788', 'active' => false],

            ['name' => 'Diyor Murodov', 'phone' => '+998901112211', 'active' => true],
            ['name' => 'Ozoda Qodirova', 'phone' => '+998911234123', 'active' => false],

            ['name' => 'Ali Umarov', 'phone' => '+998939998877', 'active' => true],
            ['name' => 'Lola Xamidova', 'phone' => '+998907654321', 'active' => false],

            ['name' => 'Umid Safarov', 'phone' => '+998907771122', 'active' => true],
            ['name' => 'Zarina Zokirova', 'phone' => '+998935551199', 'active' => false],
        ]);
    }
}
