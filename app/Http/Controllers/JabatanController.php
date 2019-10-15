<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;
use DB;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::all();

        return view('jabatan.index',['jabatan' => $jabatan]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jabatans = new Jabatan();
    
        $jabatans->nama=$request->get('nama');
        $jabatans->save();

        return redirect('jabatan')->with('status', 'Data jabatan berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jabatans = Jabatan::whereId($id)->firstOrFail();
        return view('jabatan.edit',['jabatans' => $jabatans]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jabatans = Jabatan::whereId($id)->firstOrFail();

        $jabatans->nama =$request->get('nama');

        $jabatans->save();
        return redirect('jabatan')->with('status', 'Data jabatan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatans = Jabatan::whereId($id)->firstOrFail();
        $jabatans->delete();
        return redirect('jabatan')->with('status','Data jabatan berhasil dihapus!');   
    }
}
