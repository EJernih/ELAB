<?php

namespace App\Http\Controllers;

use App\Models\Bhp;
use App\Models\Unit;
use Illuminate\Http\Request;

class BhpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bhps = Bhp::with('unit')->get(); // eager loading untuk memuat halaman unit, menampilkan nama unit
        return view('bhp.index', compact('bhps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();
        return view('bhp.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_bhp' =>'required',
            'description' =>'required',
            'minimum_stock' =>'required',
            'id_unit' =>'required',
        ]);
        $input = $request->all();

        Bhp::create($input);
        return redirect('/bhps')->with('message', 'BHP Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bhp $bhp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bhp $bhp)
    {
        $bhps = Bhp::all();
        $units = Unit::all();
        return view('bhp.edit', compact('bhp', 'units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bhp $bhp)
    {
        $request->validate([
            'name_bhp' =>'required',
            'description' =>'required',
            'minimum_stock' =>'required',
            'id_unit' =>'required',
        ]);
        $input = $request->all();

        $bhp->update($input);
        return redirect('/bhps')->with('message', 'BHP Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bhp $bhp)
    {
        $bhp->delete();
        return redirect('/bhps')->with('message', 'BHP Berhasil Dihapus');
    }
}
