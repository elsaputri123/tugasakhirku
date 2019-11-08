<?php

namespace App\Http\Controllers;

use App\Notakirim;
use App\Notakirimbarang;
use App\Barang;
use App\Pelanggan;
use App\Kecamatan;
use App\Kelurahan;
use App\Tarifkm;
use Illuminate\Http\Request;
use DB;
use Auth;

class NotakirimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notakirim = Notakirim::all();

        return view('notakirim.index',['notakirim' => $notakirim]);
    }

    public function detail($id)
    {
        
        $notakirim = Notakirim::join('karyawans as k','notakirims.karyawan_id','=','k.id')
            ->where('notakirims.id','=',$id)
            ->select('notakirims.*','k.nama as karyawan')
            ->firstOrFail();

        $detailnota=DB::select(DB::raw("SELECT j.nama as jenis, b.nama as barang, nkb.jumlah as jumlah, b.satuan as satuan, nkb.berat as berat, nkb.dimensi as dimensi, nkb.totdimensi as totdimensi FROM notakirims as n inner join notakirimbarangs as nkb on n.id=nkb.notakirim_id inner join barangs as b on nkb.barang_id=b.id inner join jenis as j on b.jenis_id=j.id where n.id='$id'"));
        
        $totberat = collect(\DB::select("SELECT SUM(nkb.totdimensi) as subtotberat FROM notakirims as n inner join notakirimbarangs as nkb on n.id=nkb.notakirim_id inner join barangs as b on nkb.barang_id=b.id inner join jenis as j on b.jenis_id=j.id where n.id=$id"))->first();
        
        return view('notakirim.detail',['notakirims' => $notakirim, 'detailnota' => $detailnota, 'totberat' => $totberat, 'detailalamat' => $detailalamat]);
    }


    public function print($id)
    {
        $notakirim = Notakirim::join('karyawans as k','notakirims.karyawan_id','=','k.id')
            ->where('notakirims.id','=',$id)
            ->select('notakirims.*','k.nama as karyawan')
            ->firstOrFail();

        $printnota = DB::select(DB::raw("SELECT n.no_resi as noresi, n.tanggal as tanggal, n.jenispembayaran as jenispembayaran, n.namapenerima as namapenerima, n.alamatpenerima as alamatpenerima, n.tlppenerima as tlppenerima, j.nama as jenis, b.nama as barang, nkb.jumlah as jumlah, b.satuan as satuan, b.berat as berat, nkb.dimensi as dimensi, nkb.totdimensi as totdimensi FROM notakirims as n inner join notakirimbarangs as nkb on n.id=nkb.notakirim_id inner join barangs as b on nkb.barang_id=b.id inner join jenis as j on b.jenis_id=j.id where n.id=$id"));

        $detailnota=DB::select(DB::raw("SELECT j.nama as jenis, b.nama as barang, nkb.jumlah as jumlah, b.satuan as satuan, b.berat as berat, nkb.dimensi as dimensi, nkb.totdimensi as totdimensi FROM notakirims as n inner join notakirimbarangs as nkb on n.id=nkb.notakirim_id inner join barangs as b on nkb.barang_id=b.id inner join jenis as j on b.jenis_id=j.id where n.id=$id"));

        $totberat = collect(\DB::select("SELECT SUM(nkb.totdimensi) as subtotberat FROM notakirims as n inner join notakirimbarangs as nkb on n.id=nkb.notakirim_id inner join barangs as b on nkb.barang_id=b.id inner join jenis as j on b.jenis_id=j.id where n.id=$id"))->first();

      
        return view('notakirim.print',['notakirims' => $notakirim, 'printnota' => $printnota, 'detailnota' => $detailnota, 'totberat' => $totberat]);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notakirim = Notakirim::all();
        $barang = Barang::all();
        $kecamatan = Kecamatan::all();
        $tarifkm = Tarifkm::all();
        $notakirimbarang = Notakirimbarang::all();
        

        $tujuans = DB::table('tarifkms')->select('id','tujuan','harga')->get();
        $pelanggans = DB::table('pelanggans')->get();

        $maxId = Notakirim::max('id');
        $auto_resi = 'KAEP'.str_pad($maxId+1, 2, "0", STR_PAD_LEFT);

        return view('notakirim.create',['notakirim' => $notakirim, 'barang' => $barang,'resi'=>$auto_resi,'tujuans' => $tujuans, 'pelanggnas' => $pelanggans, 'kecamatan' => $kecamatan, 'tarifkm' => $tarifkm, 'notakirimbarang' => $notakirimbarang]);
    }
    public function tampilkelurahan(Request $request)
    {
        $kecamatan_id= $request->get('kecamatan_id');

        $kelurahan = DB::select(DB::raw("SELECT * FROM kelurahans where kecamatan_id='$kecamatan_id'"));

        $tmpkelurahan="";

        foreach ($kelurahan as $key => $k) 
        {
            $tmpkelurahan.= '<option value="'. $k->id .'">'. $k->nama . ' - '. $k->kode_pos .'</option>';
        }

        return $tmpkelurahan;
    }

    public function tampilkecamatan(Request $request)
    {
        $tarifkm_id= $request->get('tarifkm_id');

        $kecamatan = DB::select(DB::raw("SELECT * FROM kecamatans where tarifkm_id='$tarifkm_id'"));

        $tmpkecamatan="";

        foreach ($kecamatan as $key => $kc) 
        {
            $tmpkecamatan.= '<option value="'. $kc->id .'">'. $kc->nama . ' </option>';
        }

        return $tmpkecamatan;
    }

    public function pengirim($id)
    {
        $pengirim = Pelanggan::whereId($id)->firstOrFail();
        return response()->json($pengirim);
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
        $tgl = date('Y-m-d');
        $no_resi = $request->get('noresi');
        $id_pengirim = $request->get('pengirim');
        $penerima = $request->get('penerima');
        $alamat = $request->get('alamat');
        $notlp = $request->get('notlp');
        $id_tarifkm = $request->get('tujuan');
        $kelurahan = $request->get('kelurahan');
        $pembayaran = $request->get('rd');
        $grandtotal = str_replace(",", "", $request->get('grandtotal'));
        $barang = $request->get('barang');
        $qty = $request->get('jumlah');
        $subtotberat = $request->get('subtotberat');

        $id_barang_fix = array();//array buat nampung seluruh id barang yg baru dan lama)

        //=====cek barang baru atau lama=================//
        $satuan = $request->get('satuan');
        $berat = $request->get('berat');
        for ($i=0; $i < count($barang); $i++) { 
            # code...
            $temp = explode(" - ",$barang[$i]);
            $check_ada = DB::table("barangs as b")->where('id','=',$temp[0])
                    ->first();
            if(!$check_ada)//kalo data yg diinputkan adalah barang baru
            {
                $barangInsert = new Barang();
                $barangInsert->nama = $barang[$i];
                $barangInsert->satuan = $satuan[$i];
                
                $barangInsert->jenis_id = '1';//SEMENTARA
                $barangInsert->save();

                $id_insert = $barangInsert->id;
                array_push($id_barang_fix, $id_insert);
            }
            else // kalo barang baru
            {
                array_push($id_barang_fix, $temp[0]);
            }
        }
        //===============================================//

        //==NGAMBIL ID KARYAWAN==//
        $user_id = Auth::user()->id;//ini buat ngambil id user yg login sekarang
        $karyawan = DB::table('users as u')->join('karyawans as k','u.id','=','k.user_id')
        ->where('u.id','=',$user_id)
        ->select('k.id')
        ->first();//ini buat ngambil id karyawan dari user yg login
        //=======================//

        // return dd($user_id);

        $nk = new Notakirim();
      
        $nk->karyawan_id = $karyawan->id; //fixed :)
        $nk->pelanggan_id = $id_pengirim;
        $nk->namapenerima = $penerima;
        $nk->alamatpenerima = $alamat;
        $nk->tlppenerima = $notlp;
        $nk->tarifkm_id = $id_tarifkm;
        $nk->kelurahan_id = $kelurahan;
        $nk->no_resi = $no_resi;
        $nk->jenispembayaran = $pembayaran;
     
        $nk->tanggal = $tgl;
        $nk->status = 1;
        $nk->biaya_kirim = $grandtotal;
        $nk->save();
        $last_id = $nk->id;

        for ($i=0; $i < count($id_barang_fix); $i++) { 

            $p=0;
            $l=0;
            $t=0;
            $dimensi="0x0x0";
            
            $p = $request->get('panjang');
            $l = $request->get('lebar');
            $t = $request->get('tinggi');

            if ($p[$i]!=0 && $l[$i]!=0 && $t[$i]!=0)
            {

                $dimensi = $p[$i]."x".$l[$i]."x".$t[$i];
            }

            # code...

            $nkb = new Notakirimbarang();
            $nkb->notakirim_id = $last_id;
            $nkb->barang_id = $id_barang_fix[$i];
            $nkb->jumlah = $qty[$i];
            if ($dimensi != "0x0x0") {
                $nkb->dimensi = $dimensi;
            }            
            $nkb->totdimensi = $subtotberat[$i];
            $nkb->berat = $berat[$i];
            
            $nkb->save();
        }

        return redirect('notakirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notakirim  $notakirim
     * @return \Illuminate\Http\Response
     */
    public function show(Notakirim $notakirim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notakirim  $notakirim
     * @return \Illuminate\Http\Response
     */
    public function edit(Notakirim $notakirim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notakirim  $notakirim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notakirim $notakirim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notakirim  $notakirim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notakirim $notakirim)
    {
        //
    }
}
