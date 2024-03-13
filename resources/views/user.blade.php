<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Data Level Pengguna</h1>
    <a href="{{ route('/user/tambah') }}">Tambah User</a>
    <table border="1" cellpadding = "2" cellspacing="0">
        <tr>
            {{-- <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th> --}}

            {{-- <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Jumlah Pengguna</th> --}}

            {{-- <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th> --}}

            {{-- praktikum 2.6 --}}
            {{-- <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th>
            <th>Aksi</th> --}}

             {{-- praktikum 2.7 --}}
             <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th>
            <th>Kode Level</th>
            <th>Nama Level</th>
            <th>Aksi</th>
        </tr>

            {{-- <td>{{ $data->user_id }}</td>
            <td>{{ $data->username }}</td>
            <td>{{ $data->nama }}</td>zz
            <td>{{ $data->level_id }}</td> --}}

            {{-- <td>{{ $data->user_id }}</td>
            <td>{{ $data->username }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data}}</td> --}}

            {{-- <td>{{ $data->user_id }}</td>
            <td>{{ $data->username }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->level_id }}</td> --}}

            {{-- praktikum 2.6 --}}
            {{-- @foreach ($data as $d)
            <tr>
            <td>{{ $d->user_id }}</td>
            <td>{{ $d->username }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->level_id }}</td>
            <td><a href={{ route('/user/ubah', $d->user_id) }}>Ubah</a> | <a
                    href={{ route('/user/hapus', $d->user_id) }}>Hapus</a></td> --}}
        {{-- </tr>
            @endforeach --}}
            {{-- Praktikum 2.7 --}}
            @foreach ($data as $d)
            <tr>
            <td>{{ $d->user_id }}</td>
            <td>{{ $d->username }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->level_id }}</td>
            <td>{{ $d->level->level_kode }}</td>
            <td>{{ $d->level->level_nama }}</td>
            <td><a href={{ route('/user/ubah', $d->user_id) }}>Ubah</a> | <a
                    href={{ route('/user/hapus', $d->user_id) }}>Hapus</a></td>
        </tr>
            @endforeach
    </table>
</body>

</html>
