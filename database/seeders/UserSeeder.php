<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 'admin',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dosen',
                'username' => 'dosen',
                'email' => 'dosen@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'dosen',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mahasiswa',
                'username' => 'mahasiswa',
                'email' => 'mahasiswa@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'mahasiswa',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mahasiswa 2',
                'username' => 'mahasiswa2',
                'email' => 'mahasiswa2@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'mahasiswa',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mahasiswa 3',
                'username' => 'mahasiswa3',
                'email' => 'mahasiswa3@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'mahasiswa',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
