<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Jabatan;
use App\User;
use Illuminate\Http\Request;
use DB;
use Auth;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();

        return view('karyawan.index',['karyawans' => $karyawan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        return view('karyawan.create',['jabatans' => $jabatan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $karyawans = new Karyawan();
        $users = new User();
        
        
        $nama = $request->get('nama');
        $jabatan = $request->get('jabatan');
        $alamat = $request->get('alamat');
        $notlp = $request->get('notlp');
        $tmptlahir = $request->get('tmptlahir');
        $tgllahir = $request->get('tgllahir');
        $username = $request->get('username');
        $email = $request->get('email');
        $password = $request->get('password');

        $users->username=$username;
        $users->password=bcrypt($password);
        $users->email=$email;
        $users->status=1;
        $users->save();

        $file       = $request->file('foto');
        $filex      = $file->getClientOriginalName();
        $ext        = $file->getClientOriginalExtension();
        $fileName   = rand(100000,1001238912).".".$ext;

        $request->file('foto')->move("images/karyawan/", $fileName);


        $karyawans->nama=$nama;
        $karyawans->alamat=$alamat;
        $karyawans->no_tlp=$notlp;
        $karyawans->tmpt_lahir=$tmptlahir;
        $karyawans->tgl_lahir=$tgllahir;
        $karyawans->jabatan_id=$jabatan;
        $karyawans->foto=$fileName;
        $karyawans->user_id=$users->id;
        $karyawans->save();

        return redirect('karyawan')->with('status', 'Data karyawan berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawans = Karyawan::whereId($id)->firstOrFail();
        $jabatans = Jabatan::all();

        return view('karyawan.edit',['karyawans' => $karyawans, 'jabatans' => $jabatans]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $users = DB::table('users')
            ->join('karyawans', 'karyawans.user_id', '=', 'users.id')
            ->where('karyawans.id', $id)
            ->update([
                'username' => $request->get('username'),
                'email' => $request->get('email'),
            ]);

        $karyawan = Karyawan::whereId($id)->firstOrFail();  
        if (empty($request->file('foto'))){

            $karyawans = DB::table('karyawans')
            ->join('users', 'users.id', '=', 'karyawans.user_id')
            ->where('karyawans.id', $id)
            ->update([
                'foto' => $karyawan->foto,
                'nama' => $request->get('nama'),
                'jabatan_id' => $request->get('jabatan'),
                'alamat' => $request->get('alamat'),
                'no_tlp' => $request->get('notlp'),
                'tmpt_lahir' => $request->get('tmptlahir'),
                'tgl_lahir' => $request->get('tgllahir')
            ]);
        }
        else{
            unlink("images/karyawan/".$karyawan->foto); //menghapus file lama
            $file       = $request->file('foto');
            $filex      = $file->getClientOriginalName();
            $ext        = $file->getClientOriginalExtension();
            $fileName   = rand(100000,1001238912).".".$ext;

            $request->file('foto')->move("images/karyawan/", $fileName);

            $karyawans = DB::table('karyawans')
            ->join('users', 'users.id', '=', 'karyawans.user_id')
            ->where('karyawans.id', $id)
            ->update([
                'foto' => $fileName,
                'nama' => $request->get('nama'),
                'jabatan_id' => $request->get('jabatan'),
                'alamat' => $request->get('alamat'),
                'no_tlp' => $request->get('notlp'),
                'tmpt_lahir' => $request->get('tmptlahir'),
                'tgl_lahir' => $request->get('tgllahir')
            ]);
        }

        
        
        return redirect('karyawan')->with('status', 'Data karyawan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawans = Karyawan::whereId($id)->firstOrFail();
        
        $karyawans->delete();


        $users= DB::select(DB::raw("DELETE FROM users where id=$karyawans->user_id"));

        return redirect('karyawan')->with('status','Data karyawan berhasil dihapus!');  
    }
}
