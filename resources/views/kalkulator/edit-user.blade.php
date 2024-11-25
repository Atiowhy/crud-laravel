@extends('kalkulator.index')
@section('content')
    <h1>{{ $title ?? ''}}</h1>

    <form action="{{route('user.update', $DataUser->id)}}" method="post">
    @csrf
    @method('put')
    <label for="">Nama</label>
    <input type="text" name="name" value="{{$DataUser->name ?? ''}}" placeholder="masukkan nama anda">
    <br>
    <label for="">Email</label>
    <input type="email" name="email" value="{{$DataUser->email ?? ''}}" placeholder="masukkan email anda">
    <br>
    <label for="">Password</label>
    <input type="password" name="password" placeholder="masukkan password anda">
    <br>
    <button>simpan</button>
    </form>
@endsection
