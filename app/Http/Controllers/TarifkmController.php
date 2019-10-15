<?php

namespace App\Http\Controllers;

use App\Tarifkm;
use Illuminate\Http\Request;
use DB;

class TarifkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarif = Tarifkm::all();

        return view('tarif.index',['tarif' => $tarif]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('tarif.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarifs = new Tarifkm();
    
        $tarifs->tujuan=$request->get('tujuan');
        $tarifs->harga=$request->get('harga');
        $tarifs->save();

        return redirect('tarif')->with('status', 'Data tarif berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarifkm  $tarifkm
     * @return \Illuminate\Http\Response
     */
    public function show(Tarifkm $tarifkm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tarifkm  $tarifkm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarifs = Tarifkm::whereId($id)->firstOrFail();
        return view('tarif.edit',['tarifs' => $tarifs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarifkm  $tarifkm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tarifs = Tarifkm::whereId($id)->firstOrFail();

        $tarifs->tujuan=$request->get('tujuan');
        $tarifs->harga=$request->get('harga');

        $tarifs->save();
        return redirect('tarif')->with('status', 'Data tarif berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarifkm  $tarifkm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarifs = Tarifkm::whereId($id)->firstOrFail();
        $tarifs->delete();
        return redirect('tarif')->with('status','Data tarif berhasil dihapus!');
    }
}
