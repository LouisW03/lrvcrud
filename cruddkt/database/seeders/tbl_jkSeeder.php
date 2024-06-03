<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tbl_jk;

class tbl_jkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tbl_jk::create(['jeniskelamin' => 'Laki-laki']);
        tbl_jk::create(['jeniskelamin' => 'Perempuan']);
    }
}
