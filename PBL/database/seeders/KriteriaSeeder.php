<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kriteria = [
            ['nama_kriteria' => 'Kriteria1'],
            ['nama_kriteria' => 'Kriteria2'],
            ['nama_kriteria' => 'Kriteria3'],
            ['nama_kriteria' => 'Kriteria4'],
            ['nama_kriteria' => 'Kriteria5'],
            ['nama_kriteria' => 'Kriteria6'],
            ['nama_kriteria' => 'Kriteria7'],
            ['nama_kriteria' => 'Kriteria8'],
            ['nama_kriteria' => 'Kriteria9'],
        ];

        DB::table('t_kriteria')->insert($kriteria);
    }
}