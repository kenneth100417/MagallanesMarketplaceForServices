<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::factory(1)->create([
            'user_id' => '1',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'photo' => 'uploads/profile/profile_temp.png'
        ]);
    }
}
