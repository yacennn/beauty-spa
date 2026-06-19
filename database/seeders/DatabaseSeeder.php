<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'yassinezaid@icloud.com'],
            [
                'name'     => 'Administrateur',
                'password' => Hash::make('Yassine123!'),
            ]
        );

        $this->call(BeautySpaSeeder::class);
    }
}
