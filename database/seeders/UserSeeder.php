<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nama' => 'Silmi',
                'kode' => 'A032500001',
                'username' => 'silmi',
                'image' => 'leoaditia',
                'roles' => 'Administrator',
                'email' => 'silmi@gmail.com',
                'telepon' => '0812345678',
                'password' => Hash::make('password123'),
                'status' => 0,
                'date_login' => now(),
                'date_logout' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
           
        ];

        // Insert ke database
        DB::table('users')->insert($users);
    }
}
