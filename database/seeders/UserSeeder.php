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
                'username' => 'reva',
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
            ],
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'phone_number' => '081234567890',
                'address' => 'Alamat bebas',
                'password' => bcrypt('admin123'),
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
                'role_id' => 1,
            ],
            [
                'user_id' => 2,
                'role_id' => 2,
            ],
            [
                'user_id' => 4,
                'role_id' => 1,
            ],
            [
                'user_id' => 4,
                'role_id' => 2,
            ]
        ]);

      
    }
}
