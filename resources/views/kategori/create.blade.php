@extends('layouts.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')

{{-- Content Body :main page content --}}
@section('content')
    <div class = "conteiner">
        <div class = "card card-primary">
            <div class = "card-header">
                <h3 class = "card-title">Buat Kategori Baru</h3>
            </div>

            <form action="../kategori" method = "POST">
                <div class = "card-body">
                    <div class = "form-group">
                        <label for="kodeKategori">Kode Kategori</label>
                        <input type="text" class = "form-control" id = "kodeKategori" name = "kodeKategori" placehold>
                    </div>
                    <div class = "form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="text" class = "form-control" id = "kodeKategori" name = "kodeKategori" placehold>
                    </div>
                </div>

                <div class = "card-footer">
                    <button type = "submit" class = "btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection
