<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Jenis;
use Illuminate\Http\Request;
use DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();

        return view('barang.index',['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $jenis = Jenis::all();
        return view('barang.create',['jenis' => $jenis]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barangs = new Barang();

        $jenis = $request->get('jenis');
        $nama = $request->get('nama');
        $berat = $request->get('berat');
        $satuan = $request->get('satuan');
    
        $barangs->jenis_id=$jenis;
        $barangs->nama=$nama;
        $barangs->berat=$berat;
        $barangs->satuan=$satuan;
        $barangs->save();

        return redirect('barang')->with('status', 'Data barang berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangs = Barang::whereId($id)->firstOrFail();
        $jenis = Jenis::all();

        return view('barang.edit',['barangs' => $barangs, 'jenis' => $jenis]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barangs = Barang::whereId($id)->firstOrFail();

        $barangs->jenis_id=$request->get('jenis');
        $barangs->nama=$request->get('nama');
        $barangs->berat=$request->get('berat');
        $barangs->satuan=$request->get('satuan');

        $barangs->save();

        return redirect('barang')->with('status', 'Data barang berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangs = Barang::whereId($id)->firstOrFail();
        $barangs->delete();

        return redirect('barang')->with('status','Data barang berhasil dihapus!');  

    }
}