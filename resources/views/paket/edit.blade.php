@extends('layout.app')
@section('content')
    <div class="card">
        <h1 class="card-header">
            {{ $title ?? '' }}
        </h1>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('service.update', $DataPaket->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control" name="service_name"
                            value="{{ $DataPaket->service_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Harga</label>
                        <input type="text" class="form-control" name="price" value="{{ $DataPaket->price }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10">
                          {{ $DataPaket->description }}
                        </textarea>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection