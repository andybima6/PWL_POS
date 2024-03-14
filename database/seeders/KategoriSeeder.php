<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // [
            //     'kategori_id' => 1,
            //     'kategori_kode' => 'KAT001',
            //     'kategori_nama' => 'Kategori A',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'kategori_id' => 2,
            //     'kategori_kode' => 'KAT002',
            //     'kategori_nama' => 'Kategori B',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'kategori_id' => 3,
            //     'kategori_kode' => 'KAT003',
            //     'kategori_nama' => 'Kategori C',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'kategori_id' => 4,
            //     'kategori_kode' => 'KAT004',
            //     'kategori_nama' => 'Kategori D',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'kategori_id' => 5,
            //     'kategori_kode' => 'KAT005',
            //     'kategori_nama' => 'Kategori E',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            [
                'kategori_id' => 6,
                'kategori_kode' => 'CML',
                'kategori_nama' => 'Cemilan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 7,
                'kategori_kode' => 'MNR',
                'kategori_nama' => 'Minuman Ringan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('m_kategoris')->insert($data);
    }
}
