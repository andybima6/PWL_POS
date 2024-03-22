{{-- Tugas 3 --}}
@extends('layouts.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Level')
@section('content_header_title', 'Level')
@section('content_header_subtitle', 'Edit')

{{-- Content Body :main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit level</h3>
            </div>
            <div class="card-body">
                <a href="{{ url('/level') }}" class="btn btn-secondary mb-3">Kembali</a>
                <form method="POST" action="{{ route('/level/edit_simpan', $data->level_id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kodeLevel">Kode</label>
                        <input type="text" class="form-control" id="kodeLevel" name="kodeLevel" value="{{ $data->level_code }}">
                    </div>
                    <div class="form-group">
                        <label for="namaLevel">Nama</label>
                        <input type="text" class="form-control" id="namaLevel" name="namaLevel" value="{{ $data->level_code_nama }}">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
