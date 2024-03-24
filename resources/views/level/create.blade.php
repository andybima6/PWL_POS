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


            <form method = "POST" action="/level/create_simpan">
                {{ csrf_field() }}
                <div class = "card-body">
                    <div class = "form-group">
                        <label for="kodeLevel">Kode Level</label>
                        <input type="text" class="form-control @error('level_code') is-invalid @enderror" name="kodelevel"
                        placeholder="kodelevel">
                    @error('level_code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class = "form-group">
                        <label for="namaLevel">Nama Level</label>
                        <input type="text" class="form-control @error('level_code_nama') is-invalid @enderror" name="namaLevel"
                        placeholder="namaLevel">
                    @error('level_code_nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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
