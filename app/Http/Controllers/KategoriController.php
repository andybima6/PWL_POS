<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index()
    {
        // $data = [
        //     'kategori_kode' => 'SMK',
        //     'kategori_nama' => 'Snack',
        //     'created_at' => now()
        // ];

        // DB::table('m_kategoris')->insert($data);
        // return 'Insert data Baru Berhasil';
        
        // $row = DB::table('m_kategoris')->where('kategori_kode','SMK') -> update(['kategori_nama' =>'Camilan']);
        // return 'Update Data berhasil. Jumlah Data yang di update : '.$row .'baris';

    //     $row = DB::table('m_kategoris')->where('kategori_kode','SMK') -> delete();
    //     return 'Dalete Data berhasil. Jumlah Data yang di Delete : '.$row .' baris';

    $data = DB::table('m_kategoris')->get();
    return view ('kategori',['data' => $data]);
     }
}
