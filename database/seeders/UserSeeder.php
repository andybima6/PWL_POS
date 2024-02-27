<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'level_id' => 1,
                'username' => 'Andy',
                'nama' => 'Andy',
                'password' => Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'level_id' => 2,
                'username' => 'nugraha',
                'nama' => 'nugraha',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'level_id' => 3,
                'username' => 'putra',
                'nama' => 'putra',
                'password' => Hash::make('1234567'),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Tambahkan data dummy lainnya jika diperlukan
        ];
        DB::table('m_users')->insert($data);
    }
}
