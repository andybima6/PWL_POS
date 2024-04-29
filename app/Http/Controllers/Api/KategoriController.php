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
        $level = kategoriModel::create($request->all());
        return response()->json($level, 201);
    }

    public function show(kategoriModel $level) {
        return kategoriModel::find($level);
    }

    public function update(Request $request, kategoriModel $level) {
        $level->update($request->all());
        return kategoriModel::find($level);
    }

    public function destroy(kategoriModel $user) {
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
