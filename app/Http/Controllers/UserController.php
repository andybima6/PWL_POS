<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use App\DataTables\userDataTable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\CreateSimpanPostRequest;


class UserController extends Controller
{
    // Praktikum 3 Jobsheet 7
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];

        $page = (object)[
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user';
        $level = LevelModel::all();
        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
        // return $dataTable->render('user.index');
    }
    // Ambil data user dalam bentuk json untuk datatables

    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
            ->with('level');

        // fILTER USER DATA BERDASARKAN ID
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) {
                $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/user/' . $user->user_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm"
    onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function create()
    {

        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah user baru'
        ];

        $level = LevelModel::all(); // ambil data level untuk ditampilkan di form
        $activeMenu = 'user'; // set menu yang sedang aktif
        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function create_simpan(Request $request)
    {
        $request->validate([
            // username harus diisi. berupa string, minimal 3 karakter, dan bernilai unik di tabel m_user kolom username
            'username' => 'required|string|min:3|unique:m_users,username',
            'nama' => 'required|string|max:100',     // nama harus diisi, berupa string, dan maksimal 100 karakter
            'password' => 'required|min:5',          // password harus diisi dan minimal 5 karakter
            'level_id' => 'required|integer',        // level_id harus diisi dan berupa angka
        ]);

        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password), // password dienkripsi sebelum disimpan
            'level_id' => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }
    public function show(string $id)
    {
        $user = UserModel::with('level')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Detail User'
        ];

        // ambil data level untuk ditampilkan di form
        $activeMenu = 'user'; // set menu yang sedang aktif
        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }
    public function edit(string $id)
    {
        $user = UserModel::with('level')->find($id);
        $level = LevelModel::all();
        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit User'
        ];

        // ambil data level untuk ditampilkan di form
        $activeMenu = 'user'; // set menu yang sedang aktif
        return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'level' => $level, 'activeMenu' => $activeMenu]);
    }
    public function Update(Request $request, string $id)
    {
        $request->validate([
            // username harus diisi. berupa string, minimal 3 karakter, dan bernilai unik di tabel m_user kolom username
            'username' => 'required|string|min:3|unique:m_users,username,' . $id . ',user_id',
            'nama' => 'required|string|max:100',     // nama harus diisi, berupa string, dan maksimal 100 karakter
            'password' => 'nullable|min:5',          // password harus diisi dan minimal 5 karakter
            'level_id' => 'required|integer',        // level_id harus diisi dan berupa angka
        ]);

        UserModel::find($id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password, // password dienkripsi sebelum disimpan
            'level_id' => $request->level_id
        ]);
        return redirect('/user')->with('success', 'Data User Berhasil Diubah');
    }
    public function delete(String $id)
    {
        $check = UserModel::find($id);
        if (!$check) {
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }

        try {
            UserModel::destroy($id);
            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
    // public function create_simpan(Request $request): RedirectResponse
    // {
    //     $validated = $request->validate([
    //         'username' => ['bail', 'required', 'max:3'],
    //         'nama' => ['bail', 'required', 'min:12'],
    //         'password' => ['bail', 'required', 'min:12'],
    //         'level_id' => ['bail', 'required', 'min:12']
    //     ]);

    //     return redirect('/user')->with('success', 'Data kategori berhasil diubah');
    // }
    // public function create_simpan(CreateSimpanPostRequest $request): RedirectResponse
    // {
    //     $validated = $request->validated();

    //     $validated = $request->safe()->only(['username', 'nama','password','level_id']);
    //     $validated = $request->safe()->except(['username', 'nama','password','level_id']);

    //     return redirect('/user');
    // }

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

    // $data = [
    // 'level_id' => 2,
    // 'username' => 'Manager_dua',
    // 'nama' => 'Manager 2',
    // 'password' => Hash::make('12345')

    //     'level_id' => 3,
    //     'username' => 'Manager_tiga',
    //     'nama' => 'Manager 3',
    //     'password' => Hash::make('12345')
    // ];
    // UserModel::create($data);

    // $user = UserModel::all();
    // return view('user', ['data' => $user]);

    // $user = UserModel::find(1);
    // return view('user', ['data' => $user]);

    // $user = UserModel::where('level_id',1)->first();
    // return view('user', ['data' => $user]);

    // $user = UserModel::firstwhere('level_id',1);
    // return view('user', ['data' => $user]);

    // $user = UserModel::findor(1, function () {
    //     abort(404);
    // });
    // return view('user', ['data' => $user]);

    // $user = UserModel::findOr(1,['username','nama'], function () {
    //     abort(404);
    // });
    // return view('user', ['data' => $user]);

    // $user = UserModel::findOr(20,['username','nama'], function () {
    //     abort(404);
    // });
    // return view('user', ['data' => $user]);

    // $user = UserModel::findOrFail(1);
    // return view('user', ['data' => $user]);

    //     $user = UserModel::where('username', 'manager9')->firstOrFail();
    //     return view('user', ['data' => $user]);
    // }
    // $user = UserModel::where('level_id',2)->count();
    // // dd($user);
    // return view('user',['data' =>$user]);

    // $max = UserModel::where('active',1)->max('price');

    // $user = UserModel::firstOrCreate(
    //     [
    //         'username' => 'manager',
    //         'nama' => 'Manager',
    //     ]
    // );
    // return view('user', ['data' => $user]);

    // $user = UserModel::firstOrCreate(
    //     [
    //         'username' => 'manager22',
    //         'nama' => 'Manager Dua Dua',
    //         'password' => Hash::make('12345'),
    //         'level_id' => 2
    //     ]
    // );
    // return view('user', ['data' => $user]);

    // $user = UserModel::firstOrNew(
    //     [
    //         'username' => 'manager',
    //         'nama' => 'Manager',
    //     ]
    // );
    // return view('user', ['data' => $user]);

    // $user = UserModel::firstOrCreate(
    //     [
    //         'username' => 'manager33',
    //         'nama' => 'Manager Tiga Tiga',
    //         'password' => Hash::make('12345'),
    //         'level_id' => 2
    //     ]
    // );
    // $user->save();
    // return view('user', ['data' => $user]);

    // $user = UserModel::create(
    //     [
    //         'username' => 'manager55',
    //         'nama' => 'Manager55',
    //         'password' => Hash::make('12345'),
    //         'level_id' => 2
    //     ]
    // );
    // $user->username = 'manager56';

    // $user->isDirty();//true
    // $user->isDirty('username');//true
    // $user->isDirty('nama');//false
    // $user->isDirty(['nama', 'username']);//true

    // $user->isClean();//false
    // $user->isClean('username');//flase
    // $user->isClean('nama');//true
    // $user->isClean(['nama', 'username']);//false

    //     $user->save();

    //     $user->isDirty();//false
    //     $user->isClean();//true
    //     dd($user->isDirty());

    // $user = UserModel::create(
    //     [
    //         'username' => 'manager11',
    //         'nama' => 'Manager11',
    //         'password' => Hash::make('12345'),
    //         'level_id' => 2
    //     ]
    // );
    // $user->username = 'manager12';

    // $user->wasChanged();//true
    // $user->wasChanged('username');//true
    // $user->wasChanged(['username', 'level_id']);//true
    // $user->wasChanged('nama');//false
    // dd($user->wasChanged(['nama', 'username']));//true

    // Praktium 2.6
    //     $user = UserModel::all();
    //     return view('user', ['data' => $user]);
    // }
    // public function tambah()
    // {
    //     return view('user_tambah');
    // }
    // public function tambah_simpan(Request $request)
    // {
    //     UserModel::create([
    //         'username' => $request->username,
    //         'nama' => $request->nama,
    //         'password' => Hash::make($request->password),
    //         'level_id' => $request->level_id
    //     ]);
    //     return redirect('/user');
    // }

    // public function ubah($id)
    // {
    //     $user = UserModel::find($id);
    //     return view('user_ubah', ['data' => $user]);
    // }
    // public function ubah_simpan($id, Request $request)
    // {
    //     $user = UserModel::find($id);

    //     $user->username = $request->username;
    //     $user->nama = $request->nama;
    //     $user->level_id = $request->level_id;

    //     $user->save();
    //     return redirect('/user');
    // }
    // public function hapus($id){
    //     $user = UserModel::find($id);
    //     $user->delete();

    //     return redirect('/user');
    // }

    // Praktikum 2.7
    // $user = UserModel::with('level')->get();
    // return view('user',['data' => $user]);

}
