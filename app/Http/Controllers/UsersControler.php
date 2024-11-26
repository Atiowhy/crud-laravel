<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UsersControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data User';
        $users = User::get(); //query untuk mengambil data di table users
        return view('user.index', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah User";
        return view('user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create($request->all()); //query untuk membuat atau insert data baru
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        Alert::success('Yeayyy', 'Data Berhasil Ditambahkan');
        return redirect()->to('user');
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
        $title = "Edit User";
        $DataUser = User::findorFail($id);
        return view('user.edit', compact('title', 'DataUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id); //ambil user berdasarkan id
        // update menggunakan password
        if ($request->password) {
            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            // update tanpa menggunakan password
        } else {
            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $user->password, // ambil password lama agar ketika diinput tanpa password tidak error
            ]);
        }
        Alert::success('Yeayyy', 'Data Berhasil Diubah');
        return redirect()->to('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findorFail($id)->delete();
        return redirect()->to('user');
    }

    public function delete($id)
    {
        User::findorFail($id)->delete();
        Alert::success('Yeayyy', 'Data Berhasil Dihapus');
        return redirect()->to('user');
    }
}
