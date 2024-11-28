@extends('layout.app')
@section('content')
    <div class="card">
        <h1 class="card-header">
            {{ $title ?? '' }}
        </h1>
        <div class="card-body">
            <div class="btn-cta d-flex justify-content-end mb-3">
                <a href="{{ route('service.create') }}" class="btn btn-primary">Tambah Paket Laundry</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($services as $key => $val)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $val->service_name }}</td>
                                <td>{{ $val->price }}</td>
                                <td>{{ $val->description }}</td>
                                <td>
                                    <a href="{{ route('service.edit', $val->id) }}" class="btn btn-icon btn-secondary me-2">
                                        <i class="tf-icons bx bx-pencil bx-22px"></i>
                                    </a>
                                    <form action="{{ route('service.destroy', $val->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-icon btn-danger"><i
                                                class="tf-icons bx bx-trash bx-22px"></i></button>
                                    </form>
                                    {{-- <a href="{{ route('delete', $val->id) }}" class="btn btn-icon btn-danger">
                                        <i class="tf-icons bx bx-trash bx-22px"></i>
                                    </a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
