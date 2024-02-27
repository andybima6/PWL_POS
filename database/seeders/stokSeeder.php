<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class stokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'stok_id' => 1,
                'barang_id' => 1,
                'user_id' => 1,
                'stok_tanggal' => now(),
                'stok_jumlah' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 2,
                'barang_id' => 2,
                'user_id' => 2,
                'stok_tanggal' => now(),
                'stok_jumlah' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 3,
                'barang_id' => 3,
                'user_id' => 1,
                'stok_tanggal' => now(),
                'stok_jumlah' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 4,
                'barang_id' => 4,
                'user_id' => 2,
                'stok_tanggal' => now(),
                'stok_jumlah' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 5,
                'barang_id' => 5,
                'user_id' => 1,
                'stok_tanggal' => now(),
                'stok_jumlah' => 180,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 6,
                'barang_id' => 6,
                'user_id' => 2,
                'stok_tanggal' => now(),
                'stok_jumlah' => 210,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 7,
                'barang_id' => 7,
                'user_id' => 1,
                'stok_tanggal' => now(),
                'stok_jumlah' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 8,
                'barang_id' => 8,
                'user_id' => 2,
                'stok_tanggal' => now(),
                'stok_jumlah' => 130,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 9,
                'barang_id' => 9,
                'user_id' => 1,
                'stok_tanggal' => now(),
                'stok_jumlah' => 170,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 10,
                'barang_id' => 10,
                'user_id' => 2,
                'stok_tanggal' => now(),
                'stok_jumlah' => 190,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('t-stoks')->insert($data);
    }
}
