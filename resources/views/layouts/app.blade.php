@extends('adminlte::page')
{{-- Extend and customize the browser title --}}
@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle')
        | @yield('subtitle')
    @endif
@stop

{{-- Extend and customize the page content header --}}
@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">
            @yield('content_header_title')
            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop

{{-- Rename section content to content_body --}}
@section('content')
    @yield('content_body')
@stop

{{-- Create a common footer --}}
@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.0') }}
    </div>
    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.company_name', 'My company') }}
        </a>
    </strong>
@stop

{{-- Add common Javascript/Jquery code --}}
@push('js')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
@endpush

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
    <style type="text/css">
        /* {{-- You can add AdminLTE customizations here --}} */
        /*
        .content-wrapper {
            background-color: #f8f9fa; /* Warna latar belakang konten */

        .content-header {
            background-color: #ffffff; /* Warna latar belakang header konten */
            color: #fff; /* Warna teks header konten */
        }
        .card-header {
            background-color: #2ab54b; /* Warna latar belakang header card */
            color: #fff; /* Warna teks header card */
            border-bottom: none; /* Hapus garis bawah header card */
        }
        .card-title {
            font-weight: 600;
        }
        */
    </style>
@endpush

@stack('scripts')
