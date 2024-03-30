@extends('layouts.app')
{{--
@section('subtitle', 'User')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'User')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Input User</h3>
        </div>
        <form method="POST" action="/user/create_simpan">
            @csrf
            <div class="card-body">
                <div class = "form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                        placeholder="username">
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class = "form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        placeholder="password">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class = "form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        placeholder="nama">
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class = "form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                    </div>
                    <input type="text" class="form-control @error('level_id') is-invalid @enderror" name="level_id"
                        placeholder="level_id">
                    @error('level_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection --}}
