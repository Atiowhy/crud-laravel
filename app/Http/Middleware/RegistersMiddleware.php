<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class RegistersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // name itu pake required tipe datanya string lenght nya 255'
        // email pake required tipe datanya string lenght nya 255 dikasi unique dari model users
        // password pake required tipe datanya string lenght nya 8

        // bikin validasi
        $validator = Validator::make($request->all(), [
            "name" => 'required|string|max:255',
            "email" => 'required|string|email|max:255|unique:users',
            "password" => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        return $next($request);
    }
}
