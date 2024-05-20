<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Image Rename</title>
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
    h1, h2,h3, label {
        color: white;
    }
</style>

<body>
    <div class="container mt-3">
        <h1>Andy Nugraha Putra</h1>
        <h2>File Upload Result</h2>
        <hr>

        <div class="mb-3">
            <h3>Nama File: {{ $filename }}</h3>
            <img src="{{ $filepath }}" alt="Uploaded Image" class="img-fluid">
        </div>

        <a href="{{ url('/file-upload') }}" class="btn btn-primary">Upload File Lain</a>
    </div>
</body>

</html>
