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
            ['id_level' => 1, 'username' => 'admin1', 'name' => 'Paudra', 'password' => Hash::make('12345')],
            ['id_level' => 1, 'username' => 'admin2', 'name' => 'Filla', 'password' => Hash::make('12345')],
            ['id_level' => 1, 'username' => 'admin3', 'name' => 'Karina', 'password' => Hash::make('12345')],
            ['id_level' => 1, 'username' => 'admin4', 'name' => 'Arimbi', 'password' => Hash::make('12345')],
            ['id_level' => 1, 'username' => 'admin5', 'name' => 'Reza', 'password' => Hash::make('12345')],
            ['id_level' => 1, 'username' => 'admin6', 'name' => 'Devin', 'password' => Hash::make('12345')],
            ['id_level' => 1, 'username' => 'admin7', 'name' => 'Vita', 'password' => Hash::make('12345')],
            ['id_level' => 1, 'username' => 'admin8', 'name' => 'Claudia', 'password' => Hash::make('12345')],
            ['id_level' => 1, 'username' => 'admin9', 'name' => 'Yuan', 'password' => Hash::make('12345')],
            ['id_level' => 2, 'username' => 'kps', 'name' => 'Audric', 'password' => Hash::make('12345')],
            ['id_level' => 3, 'username' => 'kajur', 'name' => 'Gegas', 'password' => Hash::make('12345')],
            ['id_level' => 4, 'username' => 'kjm', 'name' => 'Bayu', 'password' => Hash::make('12345')],
            ['id_level' => 5, 'username' => 'direktur', 'name' => 'Ircham', 'password' => Hash::make('12345')],
            ['id_level' => 6, 'username' => 'superadmin', 'name' => 'Super Admin', 'password' => Hash::make('superadmin')],
        ];

        DB::table('m_user')->insert($users);
    }
}
