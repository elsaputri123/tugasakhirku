<?php

namespace App\Http\Controllers;

use App\Notakirimbarang;
use App\Barang;
use Illuminate\Http\Request;
use DB;

class NotakirimbarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $notakirim = Notakirimbarang::all();

        return view('notakirim.index',['notakirim' => $notakirim]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notakirimbarang  $notakirimbarang
     * @return \Illuminate\Http\Response
     */
    public function show(Notakirimbarang $notakirimbarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notakirimbarang  $notakirimbarang
     * @return \Illuminate\Http\Response
     */
    public function edit(Notakirimbarang $notakirimbarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notakirimbarang  $notakirimbarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notakirimbarang $notakirimbarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notakirimbarang  $notakirimbarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notakirimbarang $notakirimbarang)
    {
        //
    }
}
