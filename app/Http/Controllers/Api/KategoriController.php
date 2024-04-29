<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\kategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index() {
        return kategoriModel::all();
    }

    public function store(Request $request) {
        $kategori = kategoriModel::create($request->all());
        return response()->json($kategori, 201);
    }

    public function show(kategoriModel $kategori) {
        return kategoriModel::find($kategori);
    }

    public function update(Request $request, kategoriModel $kategori) {
        $kategori->update($request->all());
        return kategoriModel::find($kategori);
    }

    public function destroy(kategoriModel $user) {
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
