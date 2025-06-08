<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            ['level_kode' => 'ADM', 'level_nama' => 'admin'],
            ['level_kode' => 'KPS', 'level_nama' => 'kps'],
            ['level_kode' => 'KJR', 'level_nama' => 'kajur'],
            ['level_kode' => 'KJM', 'level_nama' => 'kjm'],
            ['level_kode' => 'DIR', 'level_nama' => 'direktur'],
            ['level_kode' => 'SP', 'level_nama' => 'superadmin'],
        ];

        DB::table('m_level')->insert($levels);
    }
}