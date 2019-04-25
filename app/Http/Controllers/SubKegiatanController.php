<?php

namespace App\Http\Controllers;

use App\Sub_kegiatan;
use Illuminate\Http\Request;
use App\Kegiatan;
use App\Program;
use Illuminate\Support\Facades\DB;
use Session;

class SubKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $sub_kegiatan = Sub_kegiatan::all();
		$sub_kegiatan_list = Sub_kegiatan::join('master_kegiatan','master_kegiatan.id_kegiatan','=','sub_kegiatan.id_kegiatan')->get();
        return view ('master.sub_kegiatan.index',compact('sub_kegiatan','sub_kegiatan_list'));
		
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$kegiatan = Kegiatan::all();
        $url = "sub_kegiatan_insert";
        return View('master.sub_kegiatan.form',compact('url','kegiatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = Sub_kegiatan::insert([
                  'id_kegiatan' => $request->id_kegiatan,
				  'nama_sub_kegiatan' => $request->nama_sub_kegiatan,
                  'keterangan' => $request->keterangan,
            ]);

        if($insert){
            return redirect('/list_subkegiatan');
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
        $url = "sub_kegiatan_update";
        $sub_kegiatan = Sub_kegiatan::where('id_sub_kegiatan',$id)->first();
        $kegiatan = Kegiatan::all();
        return view ('master.sub_kegiatan.edit',compact('kegiatan','url','sub_kegiatan'));
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

        $update = Sub_kegiatan::where('id_sub_kegiatan',$request->id_sub_kegiatan)->update(['nama_sub_kegiatan' => $request->nama_sub_kegiatan,
                  'id_kegiatan' => $request->id_kegiatan,'keterangan' => $request->keterangan]);

         if($update){
            return redirect('/list_subkegiatan');
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
        Sub_kegiatan::destroy($id);

        Session::flash('flash_message', 'Kegiatan deleted!');

        return redirect('/list_subkegiatan');
    }
}
