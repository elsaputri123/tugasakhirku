<?php

namespace App\Http\Controllers;

use App\Manifest;
use App\Kendaraan;
use App\Karyawan;
use App\Notakirim;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Notiftracking;
use Validator;

class ManifestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manifest = Manifest::all();
        $notakirim = Notakirim::all();

        $detail = DB::select(DB::raw("SELECT m.id as id, m.status as status, m.created_at, m.updated_at,m.tanggal as tglmanifest, m.no_manifest as nomanifest, k.nama as sopir, n.tglbrgkt as tglbrgkt, n.tgltiba as tgltiba FROM notakirims as n inner join manifests as m on m.id=n.manifest_id inner join karyawans as k on k.id=m.karyawan_id_sopir group by m.id, m.tanggal, k.nama,m.no_manifest, n.tglbrgkt, n.tgltiba, m.status,  m.created_at, m.updated_at"));

        // $detail = Manifest::all();


        return view('manifest.index',['manifests' => $manifest, 'detail' => $detail]);
    }

    public function detail($id)
    {

        $dt = DB::select(DB::raw("SELECT m.id, j.nama as jenis,n.status as status, n.no_resi as noresi, n.namapenerima as dari, n.alamatpenerima as tujuan, b.nama as namabarang, nkb.jumlah as jumlah, b.satuan as satuan, nkb.berat as berat, nkb.totdimensi as totdimensi, SUM(nkb.totdimensi*t.harga) as subtotbiaya FROM notakirims as n inner join notakirimbarangs as nkb on n.id=nkb.notakirim_id inner join barangs as b on nkb.barang_id=b.id inner join jenis as j on b.jenis_id=j.id inner join tarifkms as t on n.tarifkm_id=t.id inner join manifests as m on n.manifest_id=m.id where m.id='$id' GROUP BY b.id, n.no_resi, j.nama, n.namapenerima, n.alamatpenerima, b.nama, nkb.jumlah, b.satuan, nkb.berat, nkb.totdimensi, m.id, n.status ORDER BY n.no_resi"));

        $jumlahbaris = DB::select(DB::raw("SELECT n.no_resi, count(b.id ) as jmlhbarisresi from notakirimbarangs nkb inner join barangs b on nkb.barang_id = b.id inner join notakirims n on n.id = nkb.notakirim_id inner join manifests m on m.id = n.manifest_id  WHERE n.manifest_id = '$id' GROUP by n.no_resi"));

        $detailatas = DB::select(DB::raw("SELECT m.id, m.no_manifest as nomanifest, m.updated_at, m.created_at, m.tanggal as tanggal, k.nama as pembuat, kn.nama as sopir, n.tglbrgkt as tglbrgkt, n.tgltiba as tgltiba FROM notakirims as n inner join manifests as m on n.manifest_id=m.id inner join karyawans as k on n.karyawan_id=k.id inner join karyawans as kn on m.karyawan_id_sopir=kn.id where m.id='$id' limit 1"));

        $hitungan1 = DB::select(DB::raw("SELECT sum(nkb.jumlah) as kuantitas, sum(nkb.totdimensi) as totalberat FROM notakirims as n inner join notakirimbarangs as nkb on n.id=nkb.notakirim_id where n.manifest_id='$id'"));

        $hitungan2 = DB::select(DB::raw("SELECT count(no_resi) as jmlh, sum(biaya_kirim) as biaya FROM notakirims where manifest_id='$id'"));

                
        return view('manifest.detail',['dt' => $dt, 'jumlahbaris' => $jumlahbaris, 'detailatas' => $detailatas, 'hitungan1' => $hitungan1, 'hitungan2' => $hitungan2]);


    }

    public function print($id)
    {
        $printatas = DB::select(DB::raw("SELECT m.id, m.no_manifest as nomanifest, m.tanggal as tanggal, k.nama as pembuat, kn.nama as sopir, knp.nama as penerima, n.tglbrgkt as tglbrgkt, n.tgltiba as tgltiba FROM notakirims as n inner join manifests as m on n.manifest_id=m.id inner join karyawans as k on n.karyawan_id=k.id inner join karyawans as kn on m.karyawan_id_sopir=kn.id inner join karyawans as knp on m.karyawan_id_penerima=knp.id where m.id=1 limit 1"));

         $tabel = DB::select(DB::raw("SELECT m.id, j.nama as jenis, n.no_resi as noresi, n.namapenerima as dari, n.alamatpenerima as tujuan, b.nama as namabarang, nkb.jumlah as jumlah, b.satuan as satuan, nkb.berat as berat, nkb.totdimensi as totdimensi, SUM(nkb.totdimensi*t.harga) as subtotbiaya FROM notakirims as n inner join notakirimbarangs as nkb on n.id=nkb.notakirim_id inner join barangs as b on nkb.barang_id=b.id inner join jenis as j on b.jenis_id=j.id inner join tarifkms as t on n.tarifkm_id=t.id inner join manifests as m on n.manifest_id=m.id where m.id='$id' GROUP BY b.id, n.no_resi, j.nama, n.namapenerima, n.alamatpenerima, b.nama, nkb.jumlah, b.satuan, nkb.berat, nkb.totdimensi, m.id ORDER BY n.no_resi"));


        $perhitungan1 = DB::select(DB::raw("SELECT sum(nkb.jumlah) as kuantitas, sum(nkb.totdimensi) as totalberat FROM notakirims as n inner join notakirimbarangs as nkb on n.id=nkb.notakirim_id where n.manifest_id='$id'"));

        $perhitungan2 = DB::select(DB::raw("SELECT count(no_resi) as jmlh, sum(biaya_kirim) as biaya FROM notakirims where manifest_id='$id'"));

        $hitungbaris = DB::select(DB::raw("SELECT n.no_resi, count(b.id ) as jmlhbarisresi from notakirimbarangs nkb inner join barangs b on nkb.barang_id = b.id inner join notakirims n on n.id = nkb.notakirim_id inner join manifests m on m.id = n.manifest_id  WHERE n.manifest_id = '$id' GROUP by n.no_resi"));


        return view('manifest.print',['printatas' => $printatas, 'tabel' => $tabel, 'perhitungan1' => $perhitungan1, 'perhitungan2' => $perhitungan2, 'hitungbaris' => $hitungbaris]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manifest = Manifest::all();
        $kendaraan = Kendaraan::all();

        $maxId = Manifest::max('id');
        $auto_resi = 'MKAEP'.str_pad($maxId+1, 2, "0", STR_PAD_LEFT);
        
        $sopir = Karyawan::join('jabatans as j','karyawans.jabatan_id','=','j.id')
        ->select('karyawans.nama as nama', 'karyawans.id as id')
        ->where('j.nama', '=', 'sopir')
        ->get();

        $notakirim = Notakirim::all();

        $detailtabel=DB::select(DB::raw("SELECT n.id as id_resi,n.no_resi as noresi, p.nama as dari, n.namapenerima as tujuan, SUM(nkb.jumlah) as subcol, SUM(nkb.jumlah*nkb.berat) as subberat, SUM(n.biaya_kirim) as alltotharga, n.jenispembayaran as jenispembayaran FROM notakirims as n inner join notakirimbarangs as nkb on n.id=nkb.notakirim_id inner join barangs as b on nkb.barang_id=b.id inner join pelanggans as p on p.id=n.pelanggan_id WHERE n.id NOT IN(SELECT n1.id FROM notakirims n1 INNER JOIN manifests m ON n1.manifest_id = m.id) GROUP BY n.id,n.no_resi, p.nama, n.namapenerima, n.jenispembayaran"));


        return view('manifest.create',['manifest' => $manifest, 'kendaraans' => $kendaraan,'nomanifest'=>$auto_resi, 'sopir' => $sopir, 'detailtabel' => $detailtabel, 'notakirim' => $notakirim]);
    }

    public function nopolisi($id)
    {
        $nopolisi = Kendaraan::whereId($id)->firstOrFail();
        return response()->json($nopolisi);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $manifests = new Manifest();
       
        $nomanifest = $request->get('nomanifest');
        $sopir = $request->get('sopir');
        $nopolisi = $request->get('nopolisi');
        $tgl = date('Y-m-d');
        $id = $request->get('id_resi');
        $getnoresi = $request->get('no_resi');
        
        //==NGAMBIL ID KARYAWAN==//
        $user_id = Auth::user()->id;//ini buat ngambil id user yg login sekarang
        $karyawan = DB::table('users as u')->join('karyawans as k','u.id','=','k.user_id')
        ->where('u.id','=',$user_id)
        ->select('k.id')
        ->first();//ini buat ngambil id karyawan dari user yg login
        //=======================//

        
        $manifests->no_manifest = $nomanifest;
        $manifests->karyawan_id_sopir = $sopir;  
        $manifests->kendaraan_id = $nopolisi;
        $manifests->tanggal = $tgl;
        $manifests->karyawan_id = $karyawan->id;
        $manifests->status = 0;
        $manifests->save();
        $last_id = $manifests->id;

        for ($i=0; $i < count($getnoresi); $i++) {

            $subs = explode(" ", $getnoresi[$i]);

            $noresi=DB::select(DB::raw("UPDATE notakirims set manifest_id = '$last_id' where id='$subs[0]'")); 
        }


        return redirect('manifest')->with('status', 'Data manifest berhasil ditambah!');
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Manifest  $manifest
     * @return \Illuminate\Http\Response
     */
    public function show(Manifest $manifest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manifest  $manifest
     * @return \Illuminate\Http\Response
     */
    public function edit(Manifest $manifest)
    {
        //
        $manifests = Manifest::whereId($id)->firstOrFail();
        $notakirims = Notakirim::all();

        return view('manifest.edit',['notakirims' => $notakirims, 'manifests' => 'manifests']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manifest  $manifest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manifest $manifest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manifest  $manifest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manifest $manifest)
    {
        //
    }

    public function kirim($id)
    {
        $histori = Manifest::where("id", $id)->first();
        //dd($histori->status);
        try {
            DB::beginTransaction();

            $update = array('status' => "1");
            Manifest::where("id", $id)->update($update);

            // updaete nota kirims
            $status = array('status' => "2");
            Notakirim::where("manifest_id", $id)->update($status);

            // get tracking
            $track = Notakirim::select("id", "no_resi", "manifest_id", "status")->where("manifest_id", $id)->get();
            //dd($track);
            // insert into detail history
            foreach ($track as $key => $value) {
                $tracking               = new Notiftracking();
                $tracking->id_nota      = $value->id;
                $tracking->status       = 2;
                $tracking->save();
            }
            
            DB::commit();

        } catch (Exception $e) {
            $data = [
                'error'   => 'Manifests Belum Dikirim'
            ];

            return redirect()->back()->with($data);
        }

        $data = [
                'success' => 'Sukses Simpan Update Pengiriman'
            ];

        return redirect()->back()->with($data);
    }

    public function sampai($id)
    {
        $histori = Manifest::where("id", $id)->first();
        //dd($histori->status);
        try {
            DB::beginTransaction();

            $update = array('status' => "2");
            Manifest::where("id", $id)->update($update);

            $status = array('status' => "3");
            Notakirim::where("manifest_id", $id)->update($status);
            // insert into tracking 

            $track = Notakirim::select("id", "no_resi", "manifest_id", "status")->where("manifest_id", $id)->get();
            
            // insert into detail history
            foreach ($track as $key => $value) {
                $tracking               = new Notiftracking();
                $tracking->id_nota      = $value->id;
                $tracking->status       = 3;
                $tracking->save();
            }

            DB::commit();

        } catch (Exception $e) {
            $data = [
                'error'   => 'Manifests Sampai Kantor Cabang'
            ];

            return redirect()->back()->with($data);
        }

        $data = [
                'success' => 'Sukses Simpan Update Pengiriman'
            ];

        return redirect()->back()->with($data);
    }
}
