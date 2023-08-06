<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id'    => 1, 
            'full_name' => 'Admin',
            'email' => 'admin@example.com', 
            'password'  => bcrypt('Randomstring23#$'),
            'role_id'   => 1, 
            'status'    => 'active'
        ]);
    }
}
