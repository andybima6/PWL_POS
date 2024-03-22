@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Level')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Level')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Level</div>
            <div class="card-body">
                {{-- Tugas 1 --}}
                <a href = {{ "/level/create" }} type="submit" class="btn btn-outline-success"  style="margin-bottom: 10px; margin-right: 12px;">Tambahkan data</a>
                {!! $dataTable->table() !!}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
