<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('program_studi')->insert([
            ['kode_prodi' => 'D2PPLS','nama_prodi' => 'D2 Pengembangan Piranti Lunak Situs', 'created_at' => now(), 'updated_at' => now()],
            ['kode_prodi' => 'D4TI' ,'nama_prodi' => 'D4 Teknik Informatika', 'created_at' => now(), 'updated_at' => now()],
            ['kode_prodi' => 'D4SIB','nama_prodi' => 'D4 Sistem Informasi Bisnis', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
