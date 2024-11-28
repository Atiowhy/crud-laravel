@extends('layout.app')
@section('content')
    <div class="card">
        <h1 class="card-header">
            {{ $title ?? '' }}
        </h1>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('customer.update', $DataCustomer->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Customer</label>
                        <input type="text" class="form-control" name="customer_name"
                            value="{{ $DataCustomer->customer_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Telepon</label>
                        <input type="text" class="form-control" name="phone" value="{{ $DataCustomer->phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Address</label>
                        <textarea name="address" class="form-control" id="" cols="30" rows="10">
                            {{ $DataCustomer->address }}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
