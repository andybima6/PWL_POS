@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($level)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover tablesm">
                    <tr>
                        <th>ID</th>
                        <td>{{ $level->level_id }}</td>
                    </tr>
                    <tr>
                        <th>Level</th>
                        <td>{{ $level->level_code }}</td>
                    </tr>
                    <tr>
                        <th>levelname</th>
                        <td>{{ $level->level_code_nama }}</td>
                    </tr>
                </table>
            @endempty
            <a href="{{ url('levels') }}" class="btn btn-sm btn-default mt2">Kembali</a>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush
