<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;
use DB;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();

        return view('pelanggan.index',['pelanggans' => $pelanggan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pelanggan = Pelanggan::all();
        return view('pelanggan.create',['pelanggans' => $pelanggan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $pelanggans = new Pelanggan();
    
        $pelanggans->nama=$request->get('nama');
        $pelanggans->alamat=$request->get('alamat');
        $pelanggans->no_tlp=$request->get('notlp');
        $pelanggans->save();

        return redirect('pelanggan')->with('status', 'Data pelanggan berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pelanggans = Pelanggan::whereId($id)->firstOrFail();
        return view('pelanggan.edit',['pelanggans' => $pelanggans]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pelanggans = Pelanggan::whereId($id)->firstOrFail();

        $pelanggans->nama=$request->get('nama');
        $pelanggans->alamat=$request->get('alamat');
        $pelanggans->no_tlp=$request->get('notlp');
        $pelanggans->save();

        $pelanggans->save();
        return redirect('pelanggan')->with('status', 'Data pelanggan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pelanggans = Pelanggan::whereId($id)->firstOrFail();
        $pelanggans->delete();
        return redirect('pelanggan')->with('status','Data pelanggan berhasil dihapus!'); 
    }
}
