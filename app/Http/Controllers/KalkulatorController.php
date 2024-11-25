<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function index()
    {
        return view('kalkulator.index');
    }
    public function tambah()
    {
        $title = 'form tambah';
        $tambah = 0;
        return view('kalkulator.tambah', compact('title', 'tambah'));
    }

    public function storeTambah(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $tambah = $angka1 + $angka2;
        $title = "hasil dari " . $angka1 . " + " . $angka2 . " = " . $tambah;
        return view('kalkulator.tambah', compact('tambah', 'title'));
    }

    public function kurang()
    {
        $title = 'form kurang';
        $jumlah = 0;
        return view('kalkulator.kurang', compact('title', 'jumlah'));
    }

    public function storeKurang(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $jumlah = $angka1 - $angka2;
        $title = "hasil dari " . $angka1 . " - " . $angka2 . " = " . $jumlah;
        return view('kalkulator.kurang', compact('jumlah', 'title'));
    }

    public function kali()
    {
        $title = 'form kali';
        $jumlah = 0;
        return view('kalkulator.kali', compact('title', 'jumlah'));
    }

    public function storeKali(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $jumlah = $angka1 * $angka2;
        $title = "hasil dari " . $angka1 . " * " . $angka2 . " = " . $jumlah;
        return view('kalkulator.kali', compact('jumlah', 'title'));
    }

    public function bagi()
    {
        $title = 'form bagi';
        $jumlah = 0;
        return view('kalkulator.bagi', compact('title', 'jumlah'));
    }

    public function storeBagi(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $jumlah = $angka1 / $angka2;
        $title = "hasil dari " . $angka1 . " / " . $angka2 . "=" . $jumlah;
        return view('kalkulator.bagi', compact('title', 'jumlah'));
    }
}
