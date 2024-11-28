<?php

namespace App\Http\Controllers;

use Monolog\Level;
use App\Models\Levels;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Level";
        $DataLevel = Levels::get();
        return view('level.index', compact('title', 'DataLevel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Data Level";
        return view('level.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Levels::create($request->all());
        Alert::success('Yeayyy', 'Data Berhasil Ditambahkan');
        return redirect()->to('level');
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
        $title = "Edit Data Level";
        $DataLevel = Levels::findOrFail($id);
        return view('level.edit', compact('title', 'DataLevel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $level = Levels::findOrFail($id);
        $level->level_name = $request->level_name;
        $level->save();
        Alert::success('Yeayyy', 'Data Berhasil Ditambahkan');
        return redirect()->to('level');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Levels::findOrFail($id)->delete();
        Alert::success('Yeayyy', 'Data Berhasil Dihapus');
        return redirect()->to('level');
    }
}
