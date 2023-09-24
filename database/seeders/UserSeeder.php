<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(1)->create([
            'email' => 'admin@gmail.com',
            'access' => 'admin',
            'password' => Hash::make('@admin')
        ]);
        Admin::factory(1)->create([
            'user_id' => '1',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'photo' => '/uploads/profile/profile_temp'
        ]);

    }
}
