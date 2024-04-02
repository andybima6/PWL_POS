<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


namespace App\Http\Controllers;

use App\Models\kategoriModel;
use Illuminate\Http\Request;
use App\DataTables\userDataTable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\CreateSimpanPostRequest;


class kategorisController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar kategoris',
            'list' => ['Home', 'kategoris']
        ];

        $page = (object)[
            'title' => 'Daftar kategoris yang terdaftar dalam sistem'
        ];

        $activeMenu = 'kategoris';
        $kategoris = kategoriModel::all(); // Gunakan kategoriModel dengan huruf besar
        return view('kategoris.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategoris' => $kategoris, 'activeMenu' => $activeMenu]);
    }

    // Ambil data kategori dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        $kategoris = kategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama');



        if ($request->kategori_id) {
            $kategoris->where('kategori_id', $request->kategori_id);
        }


        return DataTables::of($kategoris)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategori) {
                $btn = '<a href="' . url('/kategoris/' . $kategori->kategori_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/kategoris/' . $kategori->kategori_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/kategoris/' . $kategori->kategori_id) . '">'
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
            'title' => 'Tambah Kategori',
            'list' => ['Home', 'Kategori', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Kategori baru'
        ];

        $kategori = kategoriModel::all(); // ambil data level untuk ditampilkan di form
        $activeMenu = 'kategori'; // set menu yang sedang aktif
        return view('kategoris.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function create_simpan(Request $request)
    {
        $request->validate([
            // username harus diisi. berupa string, minimal 3 karakter, dan bernilai unik di tabel m_user kolom username
            'kategori_kode' => 'required|string|min:3|unique:m_kategoris,kategori_kode',
            'kategori_nama' => 'required|string|max:100',     // nama harus diisi, berupa string, dan maksimal 100 karakter

        ]);

        kategoriModel::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
            'kategori_id' => $request->kategori_id
        ]);

        return redirect('/kategoris')->with('success', 'Data user berhasil disimpan');
    }
    public function show(string $id)
    {
        $kategori = kategoriModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail kategori',
            'list' => ['Home', 'kategori', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Detail kategori'
        ];

        // ambil data level untuk ditampilkan di form
        $activeMenu = 'kategori'; // set menu yang sedang aktif
        return view('kategoris.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }
    public function edit(string $id)
    {
        $kategori = kategoriModel::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Edit kategoris',
            'list' => ['Home', 'kategoris', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit kategoris'
        ];

        $activeMenu = 'kategoris'; // set active menu
        return view('kategoris.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }
    public function Update(Request $request, string $id)
    {
        $request->validate([
            'kategori_kode' => 'required|string|min:3|unique:m_kategoris,kategori_kode,' . $id . ',kategori_id',
            'kategori_nama' => 'required|string|max:100',
        ]);

        $kategori = kategoriModel::find($id);
        $kategori->kategori_kode = $request->kategori_kode;
        $kategori->kategori_nama = $request->kategori_nama;
        $kategori->save();

        return redirect('/kategoris')->with('success', 'Data kategori Berhasil Diubah');
    }

    public function delete(String $id)
    {
        $check = kategoriModel::find($id);
        if (!$check) {
            return redirect('/kategoris')->with('error', 'Data kategori tidak ditemukan');
        }

        try {
            kategoriModel::destroy($id);
            return redirect('/kategoris')->with('success', 'Data kategori berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/kategoris')->with('error', 'Data kategori gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
