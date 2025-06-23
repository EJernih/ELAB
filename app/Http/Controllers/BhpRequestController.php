<?php

namespace App\Http\Controllers;

use App\Models\BhpRequest;
use App\Models\Lab;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BhpRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bhpRequests = BhpRequest::with('user', 'lab')->get();
        return view('request.index', compact('bhpRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $labs = Lab::all();
        return view('request.create', compact('users', 'labs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'semester' =>'required',
            'academic_year' =>'required',
            'request_date' =>'required|date',
            'id_lab' =>'required|exists:labs,id_lab',
        ]);

        //konfersi format tanggal
        $request_date = \Carbon\Carbon::parse($request->request_date)->format('Y-m-d');

        $bhpRequest = BhpRequest::create([
            'semester' => $request->semester,
            'academic_year' => $request->academic_year,
           'request_date' => $request_date,
            'id_user' => Auth::user()->id_user,
            'id_lab' => $request->id_lab,
        ]);
        return redirect('/bhpRequests')->with('message', 'Request created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(BhpRequest $bhpRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BhpRequest $bhpRequest)
    {
        $bhpRequest = BhpRequest::with('user', 'lab')->findOrFail($bhpRequest->id_request);
        $labs = Lab::all();
        return view('request.edit', compact('labs','bhpRequest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BhpRequest $bhpRequest)
    {
        $request->validate([
            'semester' =>'required',
            'academic_year' =>'required',
            'request_date' =>'required|date',
            'id_lab' =>'required|exists:labs,id_lab',
        ]);

        $input = $request->all();

        $bhpRequest->update($input);
        return redirect('/bhpRequests')->with('message', 'Request updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BhpRequest $bhpRequest)
    {
        $bhpRequest->delete();
        return redirect('/bhpRequests')->with('message', 'Request deleted successfully');
    }
}
