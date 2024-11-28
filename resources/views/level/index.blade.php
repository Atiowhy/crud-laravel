@extends('layout.app')
@section('content')
    <div class="card">
        <h1 class="card-header">
            {{ $title ?? '' }}
        </h1>
        <div class="card-body">
            <div class="btn-cta d-flex justify-content-end mb-3">
                <a href="{{ route('level.create') }}" class="btn btn-primary">Tambah Level</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Nama Level</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($DataLevel as $key => $val)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $val->level_name }}</td>
                                <td>
                                    <a href="{{ route('level.edit', $val->id) }}" class="btn btn-icon btn-secondary me-2">
                                        <i class="tf-icons bx bx-pencil bx-22px"></i>
                                    </a>
                                    <form action="{{ route('level.destroy', $val->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-icon btn-danger"><i
                                                class="tf-icons bx bx-trash bx-22px"></i></button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
