<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategoriModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\KategoriDataTable;
use Illuminate\Database\Eloquent\Model;

class KategoriController extends Controller
{

    // public function index()
    // {
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


    // Praktikum 2 jobsheet 5
    // public function index(KategoriDataTable $dataTable)
    // {
    //     return $dataTable->render('kategori.index');
    // }

    // Praktikum 3 jobsheet 5
    public function index(KategoriDataTable $dataTable)
    {

        return $dataTable->render('kategori.index');


    }
    public function create()
    {
        return view('kategori.create');
    }
    public function create_simpan(Request $request)
    {
        kategoriModel::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);
        return redirect('/kategori');
    }
    public function edit($id)
    {
        $kategori = kategoriModel::find($id);
        return view('kategori.edit', ['data' => $kategori]);
    }
    public function edit_simpan(Request $request, $id)
    {
        $kategori = kategoriModel::find($id);

        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;

        $kategori->save();

        return redirect('/kategori')->with('success', 'Data kategori berhasil diubah');
    }
    public function hapus($id)
    {
        $kategori = kategoriModel::find($id);
        $kategori->delete();

        return redirect('/kategori');
    }

}
