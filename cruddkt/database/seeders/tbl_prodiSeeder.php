<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tbl_prodi;

class tbl_prodiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tbl_prodi::create(['prodi' => 'Teknik Informatika']);
        Tbl_prodi::create(['prodi' => 'Sistem Informasi']);
        Tbl_prodi::create(['prodi' => 'Pendidikan Teknologi Informasi']);
    }
}
