<?php

namespace App\Http\Controllers;

use App\Models\userModel;
use App\Models\stockModel;
use App\Models\barangModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class stockController extends Controller
{
        public function index()
        {
            $breadcrumb = (object)[
                'title' => 'Daftar stock',
                'list' => ['Home', 'stock']
            ];

        $page = (object)[
            'title' => 'Daftar stock yang terdaftar dalam sistem'
        ];

        $activeMenu = 'stock';
        $stock = stockModel::all();
        return view('stock.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stock' => $stock, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $stock = stockModel::select('stok_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah', 'created_at', 'updated_at');

        if ($request->stok_id) {
            $stock->where('stok_stokrequest->stok_id');
        }

        return DataTables::of($stock)
            ->addIndexColumn()
            ->addColumn('aksi', function ($stock) {
                $btn = '<a href="' . url('/stock/' . $stock->stok_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/stock/' . $stock->stok_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/stock/' . $stock->stok_id) . '">'
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
            'title' => 'Tambah Stok',
            'list' => ['Home', 'Barang', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah stok baru'
        ];

        $barang = BarangModel::all();
        $user = UserModel::all();
        $activeMenu = 'stok';

        return view('stock.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'user' => $user, 'activeMenu' => $activeMenu]);
    }
    public function create_simpan(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|integer',
            'user_id' => 'required|integer',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer|min:1',
        ]);

        StockModel::updateOrCreate(
            ['barang_id' => $request->barang_id],
            [
                'user_id' => $request->user_id,
                'stok_tanggal' => $request->stok_tanggal,
                'stok_jumlah' => DB::raw("stok_jumlah + {$request->stok_jumlah}") // Menambahkan jumlah stok yang baru
            ]
        );

        return redirect('/stock')->with('success', 'Data barang berhasil disimpan');
    }





    // Add other methods like show, edit, update, and delete here...



    public function show(string $id)
    {
        $stock = stockModel::find($id);

        if (!$stock) {
            return redirect('/stock')->with('error', 'Data stock tidak ditemukan');
        }

        $breadcrumb = (object) [
            'title' => 'Detail stock',
            'list' => ['Home', 'stock', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Detail stock'
        ];

        $activeMenu = 'stock'; // set menu yang sedang aktif
        return view('stock.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stock' => $stock, 'activeMenu' => $activeMenu]);
    }
    public function edit(string $id)
    {
        $stock = StockModel::find($id);
        $barang = barangModel::all();
        $user = userModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Stock',
            'list' => ['Home', 'Stock', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Stock'
        ];

        $activeMenu = 'stock';

        return view('stock.edit', ['breadcrumb' => $breadcrumb, 'stock' => $stock, 'page' => $page, 'barang' => $barang, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {

        $request->validate([
            'barang_id' => 'required|integer',
            'user_id' => 'required|integer',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer|max:200',
        ]);

        StockModel::find($id)->update([
            'barang_id' => $request->barang_id,
            'user_id' => $request->user_id,
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah' => $request->stok_jumlah,
        ]);

        return redirect('/stock/')->with('success', 'Data stok barang berhasil diubah');
    }
    public function delete(String $id)
    {
        $check = stockModel::find($id);
        if (!$check) {
            return redirect('/stock')->with('error', 'Data stock tidak ditemukan');
        }

        try {
            stockModel::destroy($id);
            return redirect('/stock')->with('success', 'Data stock berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/stock')->with('error', 'Data stock gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
