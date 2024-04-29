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
        $level = barangModel::create($request->all());
        return response()->json($level, 201);
    }

    public function show(barangModel $level) {
        return barangModel::find($level);
    }

    public function update(Request $request, barangModel $level) {
        $level->update($request->all());
        return barangModel::find($level);
    }

    public function destroy(barangModel $user) {
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
