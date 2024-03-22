@extends('layouts.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Level')
@section('content_header_title', 'Level')
@section('content_header_subtitle', 'Create')

{{-- Content Body :main page content --}}
@section('content')
    <div class = "conteiner">
        <a href = {{"/level"}}>Kembali</a>
        <div class = "card card-primary">
            <div class = "card-header">
                <h3 class = "card-title">Buat level Baru</h3>
            </div>


            <form method = "POST" action="{{ route('/level/create_simpan') }}">
                {{ csrf_field() }}
                <div class = "card-body">
                    <div class = "form-group">
                        <label for="kodeLevel">Kode Level</label>
                        <input type="text" class = "form-control" id = "kodeLevel" name = "kodeLevel" placehold>
                    </div>
                    <div class = "form-group">
                        <label for="namaLevel">Nama Level</label>
                        <input type="text" class = "form-control" id = "namaLevel" name = "namaLevel" placehold>
                    </div>
                </div>

                <div class = "card-footer">
                    {{-- <button href = {{ "/create" }} type="submit" class="btn btn-warning">Warning</button> --}}
                    <button type = "submit" class = "btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection
