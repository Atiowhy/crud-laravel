<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function actionRegister(Request $request)
    {
        // create users
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        return redirect()->to('/');
    }
}


// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\User; // Pastikan model User di-import
// use Illuminate\Support\Facades\Hash; // Untuk hashing password
// use Illuminate\Support\Facades\Validator; // Untuk validasi

// class RegisterController extends Controller
// {
//     public function index()
//     {
//         return view('auth.register');
//     }

//     public function actionRegister(Request $request)
//     {
//         // Validasi input
//         $validator = Validator::make($request->all(), [
//             'name' => 'required|string|max:255',
//             'email' => 'required|string|email|max:255|unique:users',
//             'password' => 'required|string|min:8|confirmed', // Pastikan ada field password_confirmation di form
//         ]);

//         if ($validator->fails()) {
//             return redirect()->back()
//                              ->withErrors($validator)
//                              ->withInput();
//         }

//         // Membuat pengguna baru
//         User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => Hash::make($request->password), // Hash password sebelum disimpan
//         ]);

//         // Autentikasi pengguna (opsional)
//         // auth()->login($user);

//         // Mengalihkan pengguna ke halaman yang diinginkan
//         return redirect()->route('home')->with('success', 'Registrasi berhasil! Silakan login.');
//     }
// }
