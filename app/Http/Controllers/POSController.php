<?php

namespace App\Http\Controllers;

use App\Models\m_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class POSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $useri = m_user::all(); // Mengambil semua isi tabel
        return view('m_users.index', compact('useri'))->with('i');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('m_users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Melakukan validasi data
        $request->validate([
            'username' => 'required',
            'nama' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        m_user::create($request->all());

        return redirect()->route('m_users.index')
        ->with('success', 'User Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $useri = m_user::findOrFail($id);
        return view('m_users.show', compact('useri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $useri = m_user::find($id);
        return view('m_users.edit', compact('useri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required',
        ]);

        // Fungsi eloquent untuk mengupdate data inputan kita
        m_user::find($id)->update($request->all());
        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('m_users.index')
        ->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $useri = m_user::findOrFail($id)->delete();
        return redirect()->route('m_users.index')
        ->with('success', 'Data Berhasil Dihapus');
    }
}
