<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'BRG001',
                'barang_nama' => 'Barang 1',
                'harga_beli' => 10000,
                'harga_jual' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 2,
                'barang_kode' => 'BRG002',
                'barang_nama' => 'Barang 2',
                'harga_beli' => 12000,
                'harga_jual' => 18000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 1,
                'barang_kode' => 'BRG003',
                'barang_nama' => 'Barang 3',
                'harga_beli' => 15000,
                'harga_jual' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'BRG004',
                'barang_nama' => 'Barang 4',
                'harga_beli' => 11000,
                'harga_jual' => 16000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 1,
                'barang_kode' => 'BRG005',
                'barang_nama' => 'Barang 5',
                'harga_beli' => 13000,
                'harga_jual' => 19000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 2,
                'barang_kode' => 'BRG006',
                'barang_nama' => 'Barang 6',
                'harga_beli' => 14000,
                'harga_jual' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 1,
                'barang_kode' => 'BRG007',
                'barang_nama' => 'Barang 7',
                'harga_beli' => 16000,
                'harga_jual' => 22000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 2,
                'barang_kode' => 'BRG008',
                'barang_nama' => 'Barang 8',
                'harga_beli' => 17000,
                'harga_jual' => 23000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 1,
                'barang_kode' => 'BRG009',
                'barang_nama' => 'Barang 9',
                'harga_beli' => 18000,
                'harga_jual' => 24000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 2,
                'barang_kode' => 'BRG010',
                'barang_nama' => 'Barang 10',
                'harga_beli' => 19000,
                'harga_jual' => 25000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('m_barangs')->insert($data);
        DB::select('select * from m_users');
    }
}
