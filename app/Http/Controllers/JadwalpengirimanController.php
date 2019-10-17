<?php

namespace App\Http\Controllers;

use App\Jadwalpengiriman;
use App\Karyawan;
use App\Kendaraan;
use Illuminate\Http\Request;

class JadwalpengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwalpengiriman = Jadwalpengiriman::all();
        
        return view('jadwalpengiriman.index',['jadwalpengiriman' => $jadwalpengiriman]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $domy = Karyawan::with(["jabatans" => function($q)
         {
            $q->where('jabatans.nama', '=', 'sopir');
         }])->get();

         $data['karyawan'] = $domy->where('jabatans', '!=', null);

         $data['kendaraan'] = Kendaraan::all();
         $data['hari'] = array('1' => 'senin',
                       '2' => 'selasa',
                        '3' => 'rabu',
                        '4' => 'kamis',
                        '5' => 'jumat',
                        '6' => 'sabtu');

         return view('jadwalpengiriman.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $jadwal = new Jadwalpengiriman();
            $jadwal->hari = $request->hari;
            $jadwal->karyawan_id_kurir = $request->id_karyawan;
            $jadwal->kendaraan_id = $request->kendaraan;
            $jadwal->save();

        } catch (Exception $e) {
           $msg = [
                'error' => 'Error: Order Guru Gagal',
            ];
            
            return redirect()->back()->with($msg);
        }

        $msg = [
                'success' => 'Order Guru Sukses',
            ];

        return redirect()->back()->with($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jadwalpengiriman  $jadwalpengiriman
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwalpengiriman $jadwalpengiriman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jadwalpengiriman  $jadwalpengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwalpengiriman $jadwalpengiriman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jadwalpengiriman  $jadwalpengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwalpengiriman $jadwalpengiriman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jadwalpengiriman  $jadwalpengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwalpengiriman $jadwalpengiriman)
    {
        //
    }
}
