<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Program;
use Illuminate\Support\Facades\DB;
use Session;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $kegiatan = Kegiatan::all();
		$kegiatan_list = Kegiatan::join('master_program','master_program.id_program','=','master_kegiatan.id_program')->get();
        return view ('master.kegiatan.index',compact('kegiatan','kegiatan_list'));
		
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$program = Program::all();
        $url = "kegiatan_insert";
        return View('master.kegiatan.form',compact('url','program'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = Kegiatan::insert([
                  'id_program' => $request->id_program,
				  'nama_kegiatan' => $request->nama_kegiatan,
                  'keterangan_kegiatan' => $request->keterangan,
            ]);

        if($insert){
            return redirect('/list_kegiatan');
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
        $url = "kegiatan_update";
        $kegiatan = Kegiatan::where('id_kegiatan',$id)->first();
		$program = Program::all();
        return view ('master.kegiatan.edit',compact('kegiatan','url','program'));
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

        $update = Kegiatan::where('id_kegiatan',$request->id_kegiatan)->update(['nama_kegiatan' => $request->nama_kegiatan,
                  'id_program' => $request->id_program,'keterangan_kegiatan' => $request->keterangan]);

         if($update){
            return redirect('/list_kegiatan');
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
        
        Kegiatan::destroy($id);

        Session::flash('flash_message', 'Kegiatan deleted!');

        return redirect('/list_kegiatan');
    }
}
