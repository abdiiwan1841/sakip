<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class LaporanUploadSatkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }


    public function index()
    {
      $no   = 1;
      $cek = DB::table('users')->where('id',Auth::User()->id)->first();
      $id_satker = $cek->id_satker;
      $data = DB::table('master_programkerja')
      ->join('master_program','master_programkerja.id_program','=','master_program.id_program')
      ->join('master_kegiatan','master_programkerja.id_kegiatan','=','master_kegiatan.id_kegiatan')
      ->where('id_satker',$id_satker)
      ->get();
      return view('satker.laporan_upload_satker.index',compact('data','no'));
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
      return view('satker.laporan_upload_satker.upload',compact('no1','no2','no3','satuttk','duattk','tigattk','id'));
    }

    public function store_upload(Request $request)
    {
      //die(dd($request->upload));
      $this->validate($request,[
            'upload'=> 'required|mimes:png,jpeg,jpg,pdf,docx,doc|max:10000',
      ]);
      $file = str_random(5).'_'.Auth::User()->id.'_'.$request->file('upload')->getClientOriginalName();
      $destinationPath = public_path() . "\uploads\satker\\";
      $request->file('upload')->move($destinationPath, $file);

      //die(dd($request->id_file));
      $update = DB::table('upload_file_progja')->where('id_file',$request->id_file)->update([
                  'nama_file'             => $file,
                ]);
      return redirect()->back();
    }
}
