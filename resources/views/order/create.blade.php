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
                            <div class="mb-3">
                                <label for="" class="form-label">Paket</label>
                                <select name="" id="id_paket" class="form-control">
                                    <option value="">--Pilih Paket--</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" id="price">
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
                            <div class="mb-3">
                                <label for="" class="form-label">Qty (kg)</label>
                                <input type="number" class="qty form-control" name="qty">
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
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="tbody-parent">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" align="right">Total</td>
                                    <td>
                                        <input type="number" name="total_price" class="total-harga form-control" readonly>
                                        <input type="hidden" name="order_status" value="0" readonly>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
