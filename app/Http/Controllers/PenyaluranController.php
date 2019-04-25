<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyaluran;
use Illuminate\Support\Facades\DB;
use Session;

class PenyaluranController extends Controller
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

        $penyaluran = Penyaluran::all();
        return view ('master.penyaluran.index',compact('penyaluran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $url = "penyaluran_insert";
         return View('master.penyaluran.form',compact('url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = DB::table('master_penyaluran_anggaran')->insert([
                  'penyaluran_anggaran' => $request->penyaluran_anggaran,
                  'keterangan' => $request->keterangan
                  
                  
            ]);

        if($insert){
            return redirect('/list_penyaluran');
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
        $url = "penyaluran_update";
        $penyaluran = Penyaluran::where('id_master_penyaluran_anggaran',$id)->first();
        return view ('master.penyaluran.form',compact('penyaluran','url'));
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

        $update = Penyaluran::where('id_master_penyaluran_anggaran',$request->id_penyaluran)->update(['penyaluran_anggaran' => $request->penyaluran_anggaran,
                  'keterangan' => $request->keterangan]);

         if($update){
            return redirect('/list_penyaluran');
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
        Penyaluran::destroy($id);

        Session::flash('flash_message', 'Penyaluran Anggaran deleted!');

        return redirect('/list_penyaluran');
    }
}
