<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Form Tambah Data User</h1>
    <a href="{{ route('/user') }}">Kembali</a>

    <form method = "POST" action="{{ route('/user/tambah_simpan') }}">
        {{ csrf_field() }}
        <label>Username</label>
        <input type="text" name="username" placeholder="Masukkan Username">
        <br>
        <label>Nama</label>
        <input type="text" name= "nama" placeholder="Masukkan Nama">
        <br>
        <label>Password</label>
        <input type="password" name = "password" placeholder = "Masukkan Password">
        <br>
        <label>Level ID</label>
        <input type="number" name = "level_id">
        <br>
        <input type="submit" name = "btn btn-success" value = "simpan">
    </form>
</body>

</html>
