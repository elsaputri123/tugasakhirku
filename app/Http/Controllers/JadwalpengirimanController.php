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
        $data["jadwal"] = Jadwalpengiriman::with("karyawans", "kendaraans")->get();
        $data['hari'] = array('1' => 'Senin',
                       '2' => 'Selasa',
                        '3' => 'Rabu',
                        '4' => 'Kamis',
                        '5' => 'Jumat',
                        '6' => 'Sabtu');

        //dd($data);
        return view('jadwalpengiriman.index', $data);
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
         $data['hari'] = array('1' => 'Senin',
                       '2' => 'Selasa',
                        '3' => 'Rabu',
                        '4' => 'Kamis',
                        '5' => 'Jumat',
                        '6' => 'Sabtu');
         
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
                'error' => 'Gagal Simpan Jadwal Pengiriman',
            ];
            
            return redirect()->back()->with($msg);
        }

        $msg = [
                'success' => 'Jadwal Pengiriman Berhasil Disimpan',
            ];

        return redirect("jadwalpengiriman")->with($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jadwalpengiriman  $jadwalpengiriman
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwalpengiriman $jadwalpengiriman)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jadwalpengiriman  $jadwalpengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwalpengiriman $jadwalpengiriman)
    {   
        $domy = Karyawan::with(["jabatans" => function($q)
        {
            $q->where('jabatans.nama', '=', 'sopir');
        }])->get();

        $data['karyawan'] = $domy->where('jabatans', '!=', null);
        $data["edit"] = Karyawan::where("id", $jadwalpengiriman->id)->get()->first();

        $data['kendaraan'] = Kendaraan::all();
        $data['hari'] = array('1' => 'Senin',
                       '2' => 'Selasa',
                        '3' => 'Rabu',
                        '4' => 'Kamis',
                        '5' => 'Jumat',
                        '6' => 'Sabtu');

        return view('jadwalpengiriman.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jadwalpengiriman  $jadwalpengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $jadwal = Jadwalpengiriman::find($id)->firstOrFail();
            $jadwal->hari = $request->hari;
            $jadwal->karyawan_id_kurir = $request->id_karyawan;
            $jadwal->kendaraan_id = $request->kendaraan;
            $jadwal->save();

        } catch (Exception $e) {
           $msg = [
                'error' => 'Gagal Update Jadwal Pengiriman',
            ];
            
            return redirect()->back()->with($msg);
        }

        $msg = [
                'success' => 'Jadwal Pengiriman Berhasil Di Update',
            ];
            
        return redirect("jadwalpengiriman")->with($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jadwalpengiriman  $jadwalpengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwalpengiriman $jadwalpengiriman)
    {
        Jadwalpengiriman::where("id", $jadwalpengiriman->id)->delete();

        $msg = [
                'success' => 'Delete Jadwal Pengiriman Sukses',
            ];

        return redirect()->back()->with($msg);
    }
}
