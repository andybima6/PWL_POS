<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['level_id' => 1, 'level_code' => 'ADM', 'level_code_nama' => 'Administrator'],
            ['level_id' => 2, 'level_code' => 'MNG', 'level_code_nama' => 'Manager'],
            ['level_id' => 3, 'level_code' => 'STF', 'level_code_nama' => 'Staff/Kasir'],
        ];
        DB::table('m_levels')->insert($data);
    }
}
