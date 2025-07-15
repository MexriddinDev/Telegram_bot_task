<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::insert([
            [
                'phone_number' => '+998944866308',
                'username' => 'Mexriddin_Nuriddinov',
                'telegram_id' => 1184585040,
            ],


        ]);
    }
}
