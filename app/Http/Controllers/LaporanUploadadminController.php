<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LaporanUploadadminController extends Controller
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
       $no =1;
       $data = DB::table('master_programkerja')
       ->leftjoin('jenis_satker','master_programkerja.id_satker','=','jenis_satker.id_jenis_satker')
       ->join('master_program','master_programkerja.id_program','=','master_program.id_program')
       ->join('master_kegiatan','master_programkerja.id_kegiatan','=','master_kegiatan.id_kegiatan')
       ->get();
       return view('report_formulir_berita.index',compact('data','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
    public function upload($id)
    {
      $no1=1;
      $no2=1;
      $no3=1;
      $satuttk = DB::table('upload_file_progja')
      ->leftjoin('master_sub_upload_program_kerja','upload_file_progja.id_sub_master_upload','master_sub_upload_program_kerja.id' )
      ->where('id_master_upload',1)
      ->where('id_progja',$id)
      ->orderBy('id_sub_master_upload','ASC')
      ->get();
      $duattk = DB::table('upload_file_progja')
      ->leftjoin('master_sub_upload_program_kerja','upload_file_progja.id_sub_master_upload','master_sub_upload_program_kerja.id' )
      ->where('id_master_upload',2)
      ->where('id_progja',$id)
      ->orderBy('id_sub_master_upload','ASC')
      ->get();
      $tigattk = DB::table('upload_file_progja')
      ->leftjoin('master_sub_upload_program_kerja','upload_file_progja.id_sub_master_upload','master_sub_upload_program_kerja.id' )
      ->where('id_master_upload',3)
      ->where('id_progja',$id)
      ->orderBy('id_sub_master_upload','ASC')
      ->get();
      return view('report_formulir_berita..upload',compact('no1','no2','no3','satuttk','duattk','tigattk','id'));
    }
    
}
