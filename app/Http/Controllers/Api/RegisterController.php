<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // Jobsheet 9 Prak 1
    // invoke adalah digunakan untuk menetapkan validasi pada data yang diterima melalui $request. Jika validasi gagal,
    // Validator::make() akan mengembalikan objek validator yang berisi pesan kesalahan validasi. Jika validasi berhasil,
    // maka tidak ada yang dilakukan oleh __invoke() selain menjalankan validasi
    public function __invoke(Request $request) {
        //set validation
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required|min:5|confirmed',
            'level_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        //if validations fails
        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create user
        $user = UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
            'image' => $request->image->hashName(),
        ]);

        //return response JSON user is created
        if($user) {
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
