<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LevelsController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Levels',
            'list' => ['Home', 'Levels']
        ];

        $page = (object)[
            'title' => 'Daftar levels yang terdaftar dalam sistem'
        ];

        $activeMenu = 'levels';
        $levels = LevelModel::all();
        return view('levels.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'levels' => $levels, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $levels = LevelModel::select('level_id', 'level_code', 'level_code_nama');

        if ($request->level_id) {
            $levels->where('level_id', $request->level_id);
        }

        return DataTables::of($levels)
            ->addIndexColumn()
            ->addColumn('aksi', function ($level) {
                $btn = '<a href="' . url('/levels/' . $level->level_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/levels/' . $level->level_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/levels/' . $level->level_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm"
    onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Level',
            'list' => ['Home', 'Level', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Level baru'
        ];

        $activeMenu = 'levels';
        return view('levels.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function create_simpan(Request $request)
    {
        $request->validate([
            'level_code' => 'required|string|min:3|unique:m_levels,level_code',
            'level_code_nama' => 'required|string|max:100',
        ]);

        LevelModel::create([
            'level_code' => $request->level_code,
            'level_code_nama' => $request->level_code_nama,
        ]);

        return redirect('/levels')->with('success', 'Data level berhasil disimpan');
    }

    // Add other methods like show, edit, update, and delete here...



public function show(string $id)
{
    $level = LevelModel::find($id);

    if (!$level) {
        return redirect('/levels')->with('error', 'Data level tidak ditemukan');
    }

    $breadcrumb = (object) [
        'title' => 'Detail Level',
        'list' => ['Home', 'Level', 'Tambah']
    ];

    $page = (object) [
        'title' => 'Detail Level'
    ];

    $activeMenu = 'level'; // set menu yang sedang aktif
    return view('levels.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
}
    public function edit(string $id)
    {
        $level = LevelModel::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Edit Level',
            'list' => ['Home', 'Levels', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Level'
        ];

        $activeMenu = 'levels'; // set active menu
        return view('levels.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function Update(Request $request, string $id)
    {
        $request->validate([
            // username harus diisi. berupa string, minimal 3 karakter, dan bernilai unik di tabel m_levels kolom username
            'level_code' => 'required|string|min:3|unique:m_levels,level_code',
            'level_code_nama' => 'required|string|max:100',        // level_id harus diisi dan berupa angka
        ]);

        LevelModel::find($id)->update([
            'level_code' => $request->level_code,
            'level_code_nama' => $request->level_code_nama
        ]);
        return redirect('/levels')->with('success', 'Data level Berhasil Diubah');
    }
    public function delete(String $id)
    {
        $check = LevelModel::find($id);
        if (!$check) {
            return redirect('/levels')->with('error', 'Data level tidak ditemukan');
        }

        try {
            LevelModel::destroy($id);
            return redirect('/levels')->with('success', 'Data level berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/levels')->with('error', 'Data level gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
