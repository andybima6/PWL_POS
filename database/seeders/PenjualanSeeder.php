<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 1,
                'pembeli' => 'Pembeli A',
                'penjualan_kode' => 'PJN001',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 2,
                'pembeli' => 'Pembeli B',
                'penjualan_kode' => 'PJN002',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 1,
                'pembeli' => 'Pembeli C',
                'penjualan_kode' => 'PJN003',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 2,
                'pembeli' => 'Pembeli D',
                'penjualan_kode' => 'PJN004',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 1,
                'pembeli' => 'Pembeli E',
                'penjualan_kode' => 'PJN005',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 2,
                'pembeli' => 'Pembeli F',
                'penjualan_kode' => 'PJN006',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 1,
                'pembeli' => 'Pembeli G',
                'penjualan_kode' => 'PJN007',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 2,
                'pembeli' => 'Pembeli H',
                'penjualan_kode' => 'PJN008',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 1,
                'pembeli' => 'Pembeli I',
                'penjualan_kode' => 'PJN009',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 2,
                'pembeli' => 'Pembeli J',
                'penjualan_kode' => 'PJN010',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table("t-penjualans")->insert($data);
    }
}
