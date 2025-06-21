<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Prodi;
use Illuminate\Http\Request;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labs = Lab::with('prodi')->get(); // eager loading untuk memuat halaman prodi, menampilkan nama prodi
        return view('lab.index', compact('labs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = Prodi::all();
        return view('lab.create', compact('prodis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_lab' =>'required',
            'id_prodi' =>'required',
        ]);
        $input = $request->all();

        Lab::create($input);
        return redirect('/labs')->with('message', 'Laboratorium Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lab $lab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lab $lab)
    {
        $prodis = Prodi::all();
        $labs = Lab::all();
        return view('lab.edit', compact('lab', 'prodis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lab $lab)
    {
        $request->validate([
            'name_lab' =>'required',
            'id_prodi' =>'required',
        ]);
        $input = $request->all();

        $lab->update($input);
        return redirect('/labs')->with('message', 'Laboratorium Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lab $lab)
    {
        $lab->delete();
        return redirect('/labs')->with('message', 'Laboratorium Berhasil Dihapus');
    }
}
