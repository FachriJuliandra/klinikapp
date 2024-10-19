<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poli = \App\Models\Poli::latest()->paginate(10);
        $data['poli'] = $poli;
        return view('poli_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poli_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama'        => 'required',
            'biaya'       => 'required|numeric',  
        ]);
        $poli = new \App\Models\Poli();
        $poli->nama = $requestData['nama'];
        $poli->biaya = $requestData['biaya'];
        $poli->save();
        return redirect('/poli')->with('pesan', 'Data sudah disimpan');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poli $poli)
    {
        $data['poli'] = $poli;
        return view('poli_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poli $poli)
    {
        $requestData = $request->validate([
            'nama'        => 'required',
            'biaya'       => 'required|numeric',  
        ]);
        $poli->nama = $requestData['nama'];
        $poli->biaya = $requestData['biaya'];
        $poli->save();
        return redirect('/poli')->with('pesan', 'Data sudah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poli $poli)
    {
        $poli = \App\Models\Poli::findOrFail($poli->id);
        $poli->delete();
        return back()->with('pesan', 'Data sudah dihapus');
    }
}