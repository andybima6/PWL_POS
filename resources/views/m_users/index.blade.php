@extends('layouts.app')

@section('subtitle', 'user')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'user')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage user</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-lg-12 margin-tb">
                        <div class="float-left">
                        </div>
                            <a class="btn btn-success" href='{{ route('m_users.create') }}'> Input User</a>

                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-bordered">
                    <tr>
                        <th width="20px" class="text-center">User id</th>
                        <th width="150px" class="text-center">Level id</th>
                        <th width="200px" class="text-center">username</th>
                        <th width="200px" class="text-center">nama</th>
                        <th width="150px" class="text-center">password</th>
                        <th width="150px" class="text-center">Action</th>
                    </tr>
                    @foreach ($useri as $m_user)
                        <tr>
                            <td>{{ $m_user->user_id }}</td>
                            <td>{{ $m_user->level_id }}</td>
                            <td>{{ $m_user->username }}</td>
                            <td>{{ $m_user->nama }}</td>
                            <td>{{ $m_user->password }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-info btn-sm mr-1" href="{{ route('m_users.show',$m_user->user_id) }}">Show</a>
                                    <a class="btn btn-primary btn-sm mr-1" href="{{ route('m_users.edit',$m_user->user_id) }}">Edit</a>
                                    <form action="{{ route('m_users.destroy',$m_user->user_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
