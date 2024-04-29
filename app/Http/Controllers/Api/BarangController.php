<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\barangModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index() {
        return barangModel::all();
    }

    public function store(Request $request) {
        $barang = barangModel::create($request->all());
        return response()->json($barang, 201);
    }

    public function show(barangModel $barang) {
        return barangModel::find($barang);
    }

    public function update(Request $request, barangModel $barang) {
        $barang->update($request->all());
        return barangModel::find($barang);
    }

    public function destroy(barangModel $user) {
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
