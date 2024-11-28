<?php

namespace App\Http\Controllers;

use App\Models\Type_of_service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Paket Laundry';
        $services = Type_of_service::get(); //query untuk mengambil data di table users
        return view('paket.index', compact('services', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Paket";
        return view('paket.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Type_of_service::create($request->all()); //query untuk membuat atau insert data baru
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        Alert::success('Yeayyy', 'Data Berhasil Ditambahkan');
        return redirect()->to('service');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Paket Laundry";
        $DataPaket = Type_of_service::findorFail($id);
        return view('paket.edit', compact('title', 'DataPaket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Type_of_service::find($id); //ambil user berdasarkan id
        // update menggunakan password

        $service->service_name = $request->service_name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->save();
        Alert::success('Yeayyy', 'Data Berhasil Diubah');
        return redirect()->to('service');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Type_of_service::findorFail($id)->delete();
        return redirect()->to('service');
    }

    public function delete($id)
    {
        Type_of_service::findorFail($id)->delete();
        Alert::success('Yeayyy', 'Data Berhasil Dihapus');
        return redirect()->to('service');
    }
}
