{{-- Tugas 3 --}}
@extends('layouts.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Edit')

{{-- Content Body :main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Kategori</h3>
            </div>
            <div class="card-body">
                <a href="{{ url('/kategori') }}" class="btn btn-secondary mb-3">Kembali</a>
                <form method="POST" action="{{ route('/kategori/edit_simpan', $data->kategori_id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kodeKategori">Kode</label>
                        <input type="text" class="form-control" id="kodeKategori" name="kodeKategori" value="{{ $data->kategori_kode }}">
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama</label>
                        <input type="text" class="form-control" id="namaKategori" name="namaKategori" value="{{ $data->kategori_nama }}">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
