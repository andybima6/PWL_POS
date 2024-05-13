<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\detailModel;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    public function index() {
        return detailModel::all();
    }

    public function store(Request $request) {
        $detail = detailModel::create($request->all());
        return response()->json($detail, 201);
    }

    public function show(detailModel $detail) {
        return detailModel::find($detail);
    }

    public function update(Request $request, detailModel $detail) {
        $detail->update($request->all());
        return detailModel::find($detail);
    }

    public function destroy(detailModel $user) {
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
