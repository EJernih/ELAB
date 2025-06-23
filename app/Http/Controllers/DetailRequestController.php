<?php

namespace App\Http\Controllers;

use App\Models\Bhp;
use App\Models\BhpRequest;
use Illuminate\Http\Request;
use App\Models\DetailRequest;

class DetailRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailRequests = DetailRequest::with('bhpRequest', 'bhp')->get();
        return view('detail_req.index', compact('detailRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bhpRequests = BhpRequest::all();
        $bhps = Bhp::all();
        return view('detail_req.create', compact('bhpRequests', 'bhps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_request' =>'required',
            'id_bhp' =>'required',
            'quantity_requested' =>'required',
            'referensi' =>'required',
        ]);
        $input = $request->all();
        DetailRequest::create($input);
        return redirect('/detailRequests')->with('message', 'Detail Request created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailRequest $detailRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailRequest $detailRequest)
    {
        $bhpRequests = BhpRequest::with('user')->get();
        $bhps = Bhp::with('unit')->get();
        return view('detail_req.edit', compact('detailRequest', 'bhpRequests', 'bhps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailRequest $detailRequest)
    {
        $request->validate([
            'id_request' =>'required',
            'id_bhp' =>'required',
            'quantity_requested' =>'required',
            'referensi' =>'required',
        ]);
        $input = $request->all();
        $detailRequest->update($input);
        return redirect('/detailRequests')->with('message', 'Detail Request updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailRequest $detailRequest)
    {
        $detailRequest->delete();
        return redirect('/detailRequests')->with('message', 'Detail Request deleted successfully.');
    }
}
