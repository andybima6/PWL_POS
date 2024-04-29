<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return UserModel::all();
    }

    public function store(Request $request) {
        $level = UserModel::create($request->all());
        return response()->json($level, 201);
    }

    public function show(UserModel $level) {
        return UserModel::find($level);
    }

    public function update(Request $request, UserModel $level) {
        $level->update($request->all());
        return UserModel::find($level);
    }

    public function destroy(UserModel $user) {
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
