@extends('kalkulator.index')
@section('content')
    <form action="{{route('store-bagi')}}" method="post">
        @csrf
        <label for="">Angka 1</label>
        <input type="text" name="angka1" placeholder="masukkan angka 1 : " value="">
        <br>
        /
        <br>
        <label for="">Angka 2</label>
        <input type="text" name="angka2" placeholder="masukkan angka 2 : ">
        <br>
        <br>
        <button>Proses</button>
    </form>

    <h3>Hasilnya adalah : {{$jumlah}} </h3>
@endsection
