<?php

namespace App\Http\Controllers\Api;

use App\Models\UserModel;
use App\Models\barangModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    // CRUD
    // public function index() {
    //     return barangModel::all();
    // }

    // public function store(Request $request) {
    //     $barang = barangModel::create($request->all());
    //     return response()->json($barang, 201);
    // }

    // public function show(barangModel $barang) {
    //     return barangModel::find($barang);
    // }

    // public function update(Request $request, barangModel $barang) {
    //     $barang->update($request->all());
    //     return barangModel::find($barang);
    // }

    // public function destroy(barangModel $user) {
    //     $user->delete();

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Data terhapus',
    //     ]);
    // }

    // TUGAS JOBSHEET 11 (menambahkan column image)
    public function __invoke(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'barang_kode' => 'required',
            'barang_nama' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'kategori_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        //if validations fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create user
        $user = UserModel::create([
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'kategori_id' => $request->kategori_id,
            'image' => $request->image->hashName(),
        ]);

        //return response JSON user is created
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user,
            ], 201);
        }

        //return JSON process insert failed
        return response()->json([
            'success' => false,
        ], 409);
    }
}
