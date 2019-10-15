<?php

namespace App\Http\Controllers;

use App\Kendaraan;
use Illuminate\Http\Request;
use DB;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraan = Kendaraan::all();

        return view('kendaraan.index',['kendaraan' => $kendaraan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('kendaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kendaraans = new Kendaraan();
    
        $kendaraans->nama=$request->get('nama');
        $kendaraans->no_polisi=$request->get('nopolisi');
        $kendaraans->kapasitas=$request->get('kapasitas');
        $kendaraans->save();

        return redirect('kendaraan')->with('status', 'Data kendaraan berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kendaraans = Kendaraan::whereId($id)->firstOrFail();
        return view('kendaraan.edit',['kendaraans' => $kendaraans]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kendaraans = Kendaraan::whereId($id)->firstOrFail();

        $kendaraans->nama=$request->get('nama');
        $kendaraans->no_polisi=$request->get('nopolisi');
        $kendaraans->kapasitas=$request->get('kapasitas');

        $kendaraans->save();
        return redirect('kendaraan')->with('status', 'Data kendaraan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kendaraans = Kendaraan::whereId($id)->firstOrFail();
        $kendaraans->delete();
        return redirect('kendaraan')->with('status','Data kendaraan berhasil dihapus!'); 
    }
}
