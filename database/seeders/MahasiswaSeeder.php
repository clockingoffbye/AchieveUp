<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            [
                'nim' => '222107023001',
                'user_id' => 3,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '222107023002',
                'user_id' => 4,
                'program_studi_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '222107023003',
                'user_id' => 5,
                'program_studi_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
