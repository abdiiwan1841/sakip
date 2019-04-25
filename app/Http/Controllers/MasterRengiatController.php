<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterRengiat;
use Illuminate\Support\Facades\DB;
use Session;

class MasterRengiatController extends Controller
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

        $program = MasterRengiat::all();
        return view ('master.rengiat.index',compact('program'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $url = "rengiat_insert";
         return View('master.rengiat.form',compact('url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = DB::table('master_rencana_program_rengiat')->insert([
                  'rencana_program_rengiat' => $request->rencana_program_rengiat,
                  'status' => $request->status,
                  'keterangan' => $request->keterangan
                  
                  
            ]);

        if($insert){
            return redirect('/list_rengiat');
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
        $url = "rengiat_update";
        $program = MasterRengiat::where('id_rencana_program_rengiat',$id)->first();
        return view ('master.rengiat.form',compact('program','url'));
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

        $update = MasterRengiat::where('id_rencana_program_rengiat',$request->id_rencana_program_rengiat)->update(['rencana_program_rengiat' => $request->rencana_program_rengiat,
            'status' => $request->status,'keterangan' => $request->keterangan]);

         if($update){
            return redirect('/list_rengiat');
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
        MasterRengiat::destroy($id);

        Session::flash('flash_message', 'Master Rengiat deleted!');

        return redirect('/list_rengiat');
    }
}
