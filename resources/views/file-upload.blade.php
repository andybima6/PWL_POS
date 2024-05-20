<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>file upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    body,
    html {
        margin: 0;
        padding: 0;
        height: 100%;
        background: url('image/cat.jpg');
        background-size: cover;
    }
    h1,h2,label{
        color: white;
    }
</style>

<body>
    <div class="container mt-3">
        <h1>Andy Nugraha Putra</h1>
        <h2>File upload</h2>
        <hr>

        <form action="{{ url('/file-upload') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="berkas" class = "form-label">Gambar Profile</label>
                <input type="file" class="form-control" id="berkas" name="berkas">

                @error('berkas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary my-2">Upload</button>
        </form>
    </div>
</body>


</html>
