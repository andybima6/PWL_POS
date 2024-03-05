<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // 1)
        // $user = UserModel::all();
        // return view('user',['data' => $user]);
        // 2)
        // $data = [
        //     'username' => 'Customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('123456'),
        //     'level_id' => 3
        // ];
        // UserModel::insert($data);
        // $user = UserModel::all();
        // return view('user', ['data' => $user]);
        // 3)
        // $data = [
        //     'user_id' => 4,
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username', 'customer-1')->update($data);

        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        $data = [
            // 'level_id' => 2,
            // 'username' => 'Manager_dua',
            // 'nama' => 'Manager 2',
            // 'password' => Hash::make('12345')

            'level_id' => 3,
            'username' => 'Manager_tiga',
            'nama' => 'Manager 3',
            'password' => Hash::make('12345')
        ];
        UserModel::create($data);

        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
