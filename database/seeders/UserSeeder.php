<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert users using insert() to handle multiple records
        DB::table('users')->insert([
            [
                'username' => 'vitovit',
                'email' => 'adyatmavincencius@gmail.com',
                'phone_number' => '081234567890',
                'address' => 'Alamat bebas',
                'password' => bcrypt('password123'),
            ],
            [
                'username' => 'nicolaus123',
                'email' => 'reva@gmail.com',
                'phone_number' => '081234567890',
                'address' => 'Alamat bebas',
                'password' => bcrypt('password123'),
            ],
            [
                'username' => 'ferly123',
                'email' => 'ferli@gmail.com',
                'phone_number' => '081234567890',
                'address' => 'Alamat bebas',
                'password' => bcrypt('password123'),
            ]
        ]);

        // Insert roles for users
        DB::table('role_ownerships')->insert([
            [
                'user_id' => 1,
                'role_id' => 2,
            ],
            [
                'user_id' => 2,
                'role_id' => 2,
            ]
        ]);

        // Insert user course enrollment
        DB::table('user_take_courses')->insert([
            'user_id' => 1,
            'course_id' => 1,
        ]);
    }
}
