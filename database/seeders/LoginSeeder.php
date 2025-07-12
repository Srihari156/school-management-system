<?php

namespace Database\Seeders;

use App\Models\Logins;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Logins::create([
            'username' => 'admin',
            'password' => Hash::make('password123')
        ]);
    }
}
