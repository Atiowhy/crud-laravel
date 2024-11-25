<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index()
    {
        return "Halo kami sedang belajar laravel";
    }

    public function edit($id)
    {
        return "ini adalah edit dengan nama params: " . $id;
    }

    public function delete($id)
    {
        return "ini adalah delete dengan nama params: " . $id;
    }
}
