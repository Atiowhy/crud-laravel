@extends('layout.app')
@section('content')
    <div class="card">
        <h1 class="card-header">
            {{ $title ?? '' }}
        </h1>
        <div class="card-body">
            <div class="btn-cta d-flex justify-content-end mb-3">
                <a href="{{ route('trans_order.create') }}" class="btn btn-primary">Tambah Customer</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>No Transaksi</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $val)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $val->customer->customer_name }}</td>
                                <td>{{ $val->order_code }}</td>
                                <td>{{ $val->order_date }}</td>
                                <td>{{ $val->order_end_date }}</td>
                                <td>{{ $val->order_status }}</td>
                                <td>
                                    <a href="{{ route('trans_order.show', $val->id) }}"
                                        class="btn btn-icon btn-secondary me-2">
                                        <i class="tf-icons bx bx-show bx-22px"></i>
                                    </a>
                                    <form action="{{ route('trans_order.destroy', $val->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-icon btn-danger">
                                            <i class="tf-icons bx bx-trash bx-22px"></i>
                                        </button>
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
