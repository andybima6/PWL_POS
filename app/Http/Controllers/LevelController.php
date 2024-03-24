<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use App\DataTables\LevelDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\CreateSimpanPostRequest;

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
    // public function index()
    // {
    //     $data = DB::select('select * from m_levels');
    //     return view('level',['data' => $data]);
    public function index(levelDataTable $dataTable)
    {

        return $dataTable->render('level.index');
    }
    public function create()
    {
        return view('level.create');
    }
    // public function create_simpan(Request $request): RedirectResponse
    // {
    //     // levelModel::create([
    //     //     'level_code' => $request->kodeLevel,
    //     //     'level_code_nama' => $request->namaLevel,
    //     // ]);
    //     // return redirect('/level');

    //     $validated = $request->validate([
    //         'level_code' => ['bail', 'required', 'max:3'],
    //         'level_code_nama' => ['bail', 'required', 'min:12'],

    //     ]);
    //     return redirect('/level')->with('success', 'Data kategori berhasil diubah');

    public function create_simpan(CreateSimpanPostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated = $request->safe()->only(['level_code', 'level_code_nama']);
        $validated = $request->safe()->except(['level_code', 'level_code_nama']);

        return redirect('/level');
    }


    public function edit($id)
    {
        $level = levelModel::find($id);
        return view('level.edit', ['data' => $level]);
    }
    public function edit_simpan(Request $request, $id)
    {
        $level = levelModel::find($id);

        $level->level_code = $request->kodeLevel;
        $level->level_code_nama = $request->namaLevel;

        $level->save();

        return redirect('/level')->with('success', 'Data level berhasil diubah');
    }
    public function hapus($id)
    {
        $level = levelModel::find($id);
        $level->delete();

        return redirect('/level');
    }

}
