{{-- @extends('layouts.app') --}}
{{-- Customize layout sections --}}
{{-- @section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create') --}}

{{-- Content Body :main page content --}}
{{-- @section('content')
    <div class = "conteiner">
        <a href = {{"/kategori"}}>Kembali</a>
        <div class = "card card-primary">
            <div class = "card-header">
                <h3 class = "card-title">Buat Kategori Baru</h3>
            </div>


            <form method = "POST" action="{{ route('/kategori/create_simpan') }}">
                {{ csrf_field() }}
                <div class = "card-body">
                    <div class = "form-group">
                        <label for="kodeKategori">Kode Kategori</label>
                        <input type="text" class = "form-control" id = "kodeKategori" name = "kodeKategori" placehold>
                    </div>
                    <div class = "form-group">
                        <label for="namaKategori">Nama kategori</label>
                        <input type="text" class = "form-control" id = "namaKategori" name = "namaKategori" placehold>
                    </div>
                </div>

                <div class = "card-footer"> --}}
                    {{-- <button href = {{ "/create" }} type="submit" class="btn btn-warning">Warning</button> --}}
                    {{-- <button type = "submit" class = "btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection --}}

@extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')

@section('content')
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <a href="{{ url('/kategori') }}">Kembali</a>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat Kategori Baru</h3>
            </div>

            <form method="POST" action="/kategori/create_simpan">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeKategori">Kode Kategori</label>
                        {{-- <input type="text" class="form-control" id="kodeKategori" name="kodeKategori" placeholder="Masukkan Kode Kategori"> --}}
                        <input type="text" class="@error('kategori_kode') is-invalid @enderror" name="kodeKategori" placeholder="Masukkan Kode Kategori">
                        @error('kategori_kode')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="namaKategori" name="namaKategori" placeholder="Masukkan Nama Kategori">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>


@endsection
