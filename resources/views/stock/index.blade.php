@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Manage stock</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('/stock/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label for="" class="col-1 control-label col-form-label">Filter: </label>
                        <div class="col-3">
                            <select name="stok_id" id="stok_id" class="form-control" required>
                                <option value="">- Semua -</option>
                                @foreach ($stock as $item)
                                    <option value="{{ $item->user_id }}">{{ $item->user_id }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">stock Pengguna</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_stock">
                <thead>
                    <tr>
                        <th>Stok ID</th>
                        <th>Barang ID</th>
                        <th>User ID</th>
                        <th>Tanggal stock </th>
                        <th>stock Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            var datastok = $('#table_stock').DataTable({
                serverSide: true, // serverSide: true, jika ingin menggunakan server side processing
                ajax: {
                    "url": "{{ url('stock/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.stok_id = $('#stok_id').val();
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "barang_id",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "user_id",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "stok_tanggal",
                        className: "",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "stok_jumlah",
                        className: "",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "aksi",
                        className: "",
                        orderable: false,
                        searchable: false
                    }
                ]

            });
            $('#stok_id').on('change', function() {
            dataUser.ajax.reload();
        });
    });

    </script>
@endpush
