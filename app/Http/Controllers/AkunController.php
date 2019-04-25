<?php

namespace App\Http\Controllers;

use App\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('bauth');
    }

    public function index()
    {
        //

        $akun = Akun::all();
        return view ('master.akun.index',compact('akun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $url = "akun_insert";
         return View('master.akun.form',compact('url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = DB::table('master_akun')->insert([
                  'nama_akun' => $request->nama_akun,
                  'keterangan' => $request->keterangan
            ]);

        if($insert){
            return redirect('/list_akun');
        }else{
            return "gagal";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $url = "akun_update";
        $akun = Akun::where('id_akun',$id)->first();
        return view ('master.akun.form',compact('akun','url','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
      

        $update = Akun::where('id_akun',$request->id_akun)->update(['nama_akun' => $request->nama_akun,
                  'keterangan' => $request->keterangan]);

         if($update){
            return redirect('/list_akun');
        }else{
            return "gagal";
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Akun::destroy($id);

        Session::flash('flash_message', 'Akun deleted!');

        return redirect('/list_akun');
    }
}
