@extends('layout.app')
@section('content')
    <div class="card">
        <h1 class="card-header">
            {{ $title ?? '' }}
        </h1>
        <div class="card-body">
            <div class="btn-cta d-flex justify-content-end mb-3">
                <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $val)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->email }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $val->id) }}" class="btn btn-icon btn-secondary me-2">
                                        <i class="tf-icons bx bx-pencil bx-22px"></i>
                                    </a>
                                    <a href="{{ route('delete', $val->id) }}" class="btn btn-icon btn-danger">
                                        <i class="tf-icons bx bx-trash bx-22px"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection