@extends('layout.app')
@section('content')
    <div class="card">
        <h1 class="card-header">
            {{ $title ?? '' }}
        </h1>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('trans_order.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">No Transaksi</label>
                                <input type="text" value="{{ $order_code }}" class="form-control" name="order_code"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Laundry</label>
                                <input type="date" class="form-control" name="order_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Customer</label>
                                <select name="id_customer" class="form-control" id="">
                                    <option value="">--Pilih Customer--</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" name="order_end_date">
                            </div>
                        </div>
                    </div>
                    <div class="btn-cta mt-3 d-flex justify-content-end">
                        <button class="btn btn-primary add-row">Tambah Transaksi</button>
                    </div>
                    <div class="table-responsive mt-3 mb-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Paket</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="tbody-parent">

                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
