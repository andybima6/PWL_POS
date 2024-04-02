@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($stock)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover tablesm">
                    <tr>
                        <th>Stok ID</th>
                        <td>{{ $stock->stok_id }}</td>
                    </tr>

                    <tr>
                        <th>Barang ID</th>
                        <td>{{ $stock->barang_id }}</td>
                    </tr>
                    <tr>
                        <th>user ID</th>
                        <td>{{ $stock->user_id }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Stock</th>
                        <td>{{ $stock->stok_tanggal }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Stock</th>
                        <td>{{ $stock->stok_Jumlah }}</td>
                    </tr>
                    <tr>
                        <th>created at</th>
                        <td>{{ $stock->created_at }}</td>
                    </tr>
                    <tr>
                        <th>updated at</th>
                        <td>{{ $stock->updated_at }}</td>
                    </tr>
                </table>
            @endempty
            <a href="{{ url('stock') }}" class="btn btn-sm btn-default mt2">Kembali</a>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush
