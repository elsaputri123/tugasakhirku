<?php

namespace App\Http\Controllers;

use App\Rute;
use Illuminate\Http\Request;
use App\Kecamatan;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data["data"] = Rute::with("kecamatan")->get();

        return view("rute.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["kecamatan"] = Kecamatan::select("id", "nama")->get();

        return view("rute.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request,[
            'nama'  => 'max:10','alpha',
            'koordinat_x' => 'required|numeric',
            'koordinat_y' => 'required|numeric',
            'kecamatan' => 'required|numeric',
        ],
        [
                'nama.alpha' => 'Nama Harus Huruf',
                'koordinat_y.required' => 'Longitude harus diisi',
                'koordinat_y.numeric' => 'Longitude harus angka',
                'koordinat_x.required' => 'Latitude harus diisi',
                'koordinat_x.numeric' => 'Latitude harus angka',
                'kecamatan.required' => 'Kecamatan harus diisi',
                'kecamatan.numeric' => 'Kecamatan harus angka',
            ]
        );

        try {

            $rute = new Rute();
            $rute->kecamatan_id = $request->kecamatan;
            $rute->nama         = $request->nama;
            $rute->koordinat_x  = $request->koordinat_x;
            $rute->koordinat_y  = $request->koordinat_y;
            $rute->status       = 1;
            $rute->save();

        } catch (Exception $e) {
           $msg = [
                'error' => 'Gagal Simpan Rute Pengiriman',
            ];
            
            return redirect()->back()->with($msg);
        }

        $msg = [
                'success' => 'Rute Pengiriman Berhasil Disimpan',
            ];

        return redirect("rute")->with($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rute  $rute
     * @return \Illuminate\Http\Response
     */
    public function show(Rute $rute)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rute  $rute
     * @return \Illuminate\Http\Response
     */
    public function edit(Rute $rute)
    {
        $data["kecamatan"] = Kecamatan::select("id", "nama")->get();
        $data["edit"] = Rute::where("id", $rute->id)->get()->first();

        return view("rute.create", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rute  $rute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama'  => 'max:10','alpha',
            'koordinat_x' => 'required|numeric',
            'koordinat_y' => 'required|numeric',
            'kecamatan' => 'required|numeric',
        ],
        [
                'nama.alpha' => 'Nama Harus Huruf',
                'koordinat_y.required' => 'Longitude harus diisi',
                'koordinat_y.numeric' => 'Longitude harus angka',
                'koordinat_x.required' => 'Latitude harus diisi',
                'koordinat_x.numeric' => 'Latitude harus angka',
                'kecamatan.required' => 'Kecamatan harus diisi',
                'kecamatan.numeric' => 'Kecamatan harus angka',
            ]
        );

        try {

            $rute               = Rute::find($id)->firstOrFail();
            $rute->kecamatan_id = $request->kecamatan;
            $rute->nama         = $request->nama;
            $rute->koordinat_x  = $request->koordinat_x;
            $rute->koordinat_y  = $request->koordinat_y;
            $rute->save();

        } catch (Exception $e) {
           $msg = [
                'error' => 'Gagal Edit Rute Pengiriman',
            ];
            
            return redirect()->back()->with($msg);
        }

        $msg = [
                'success' => 'Rute Pengiriman Berhasil Diedit',
            ];

        return redirect("rute")->with($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rute  $rute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rute $rute)
    {
        //
    }
}
