<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    //     public function index()
    //     {
    //     DB::insert('insert into m_levels(level_code,level_code_nama,created_at)values(?,?,?)',['CUS','Pelanggan',now()]);
    //     return 'Insert data baru berhasil';
    // }

    // public function index()
    // {
    //     $row = DB::update('update  m_levels set level_code_nama = ? where level_code = ?', ['customer', 'CUS']);
    //     return 'Update data  berhasil. Jumlah data yang diupdate : ' . $row . 'baris';
    // }

    // public function index()
    // {
    //     $row = DB::delete('delete from m_levels where level_code = ?',['CUS']);
    //     return 'Delete data  berhasil. Jumlah data yang Didelete : ' . $row . ' baris';
    // }
    public function index()
    {
        $data = DB::select('select * from m_levels');
        return view('level',['data' => $data]);
    }
}
