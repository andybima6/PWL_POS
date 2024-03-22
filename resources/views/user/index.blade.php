@extends('layouts.app')
{{-- Customize layout sections  --}}
@section('subtitle', 'User')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'User')
{{-- Content bodu:main page content  --}}
@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Input User</h3>
    </div>
    <div class="card-body">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">@</span>
        </div>
        <input type="text" class="form-control" placeholder="Username">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-key"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Password">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Nama">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-address-card"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Level">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <!-- /input-group -->
    </div>
    <!-- /.card-body -->
  </div>
@endsection
