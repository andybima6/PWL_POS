<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\BarangModel;
use App\Models\stockModel;
use App\Models\DetailModel;
use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use JeroenNoten\LaravelAdminLte\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Penjualan',
            'list' => ['Home', 'Penjualan'],
        ];

        $page = (object) [
            'title' => 'Daftar Penjualan yang tersedia dalam sistem'
        ];

        $activeMenu = 'transaksi';
        $users = UserModel::all();
        return view('transaksi.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'users' => $users, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $transaksi = TransaksiModel::select(['penjualan_id', 'user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal'])->with('user');

        // Filter data user berdasarkan level_id
        if ($request->user_id) {
            $transaksi->where('user_id', $request->user_id);
        }

        return DataTables::of($transaksi)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($transaksis) {
                $btn = '<a href="' . url('/transaksi/' . $transaksis->penjualan_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/transaksi/' . $transaksis->penjualan_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/transaksi/' . $transaksis->penjualan_id) . '">' .
                    csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function show(string $id)
    {
        $transaksi = TransaksiModel::with(['user'])->find($id);
        $details = DetailModel::with(['barang'])->where('penjualan_id', $id)->get();
        $number = 1;

        // dd($details);
        $breadcrumb = (object) [
            'title' => 'Detail Penjualan',
            'list' => ['Home', 'Penjualan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Penjualan'
        ];

        $activeMenu = 'transaksi'; // set menu yang sedang aktif

        return view('transaksi.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'transaksi' => $transaksi, 'details' => $details, 'number' => $number, 'activeMenu' => $activeMenu]);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Data Penjualan',
            'list' => ['Home', 'Penjualan', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah data penjualan baru'
        ];

        $barang = BarangModel::all();
        $users = UserModel::all();
        $activeMenu = 'transaksi';
        return view('transaksi.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'users' => $users, 'activeMenu' => $activeMenu]);
    }

    public function create_simpan(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'pembeli' => 'required|string|max:100',
            'penjualan_kode' => 'required|string|max:8|unique:t-penjualans,penjualan_kode',
            'barang_id' => 'required|integer',
            'jumlah' => 'required|integer',
        ]);

        $transaksi = TransaksiModel::create([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $request->penjualan_kode,
            'penjualan_tanggal' => now(),
        ]);

        $barang = BarangModel::find($request->barang_id);

        DetailModel::create([
            'penjualan_id' => $transaksi->penjualan_id,
            'barang_id' => $request->barang_id,
            'harga' => $barang->harga_jual,
            'jumlah' => $request->jumlah,
        ]);
        stockModel::where('barang_id', $request->barang_id)->decrement('stok_jumlah', $request->jumlah);
        return redirect('/transaksi')->with('success', 'Data penjualan berhasil disimpan');
    }

    public function edit(string $id)
    {
        $transaksi = TransaksiModel::find($id);
        $items = BarangModel::all();
        $users = UserModel::all();
        $details = DetailModel::where('penjualan_id', $id)->get();

        $breadcrumb = (object) [
            'title' => 'Edit Data Penjualan',
            'list' => ['Home', 'Penjualan', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Data Penjualan'
        ];

        $activeMenu = 'transaksi';

        return view('transaksi.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'transaksi' => $transaksi, 'details' => $details, 'items' => $items, 'users' => $users, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {

        $request->validate([
            'user_id' => 'required|integer',
            'pembeli' => 'required|string|max:100',
            // 'penjualan_kode' => 'required|string|max:8',
            // 'barang_id' => 'required|integer',
            // 'jumlah' => 'required|integer',
        ]);
        // dd($request);
        TransaksiModel::find($id)->update([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            // 'penjualan_kode' => $request->penjualan_kode,
        ]);

        BarangModel::find($request->barang_id);

        for ($i = 0; $i < $request->count; $i++) {
            DetailModel::find($request->id[$i])->update([
                'barang_id' => $request->barang_id[$i],
                'jumlah' => $request->jumlah[$i],
            ]);
        }

        return redirect('/transaksi/')->with('success', 'Data penjualan berhasil diubah');
    }

    public function delete(string $id)
    {
        $check = TransaksiModel::find($id);
        if (!$check) {   // untuk mengecek apakah data user dengan id yang dimaksd ada atau tidak
            return redirect('/transaksi')->with('error', 'Data transaksi tidak ditemukan');
        }

        try {
            DetailModel::where('penjualan_id', $check->penjualan_id)->delete();
            TransaksiModel::destroy($id);

            return redirect('/transaksi')->with('success', 'Data stok barang berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/transaksi')->with('error', 'Data penjualan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
