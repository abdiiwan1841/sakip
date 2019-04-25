<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserDetail;
use Session;
use Auth;
use App\Provinsi; 
use App\Kabupaten; 
use App\Kecamatan; 
use App\DokumenMaster;
use App\FileUpload;

class ProfileController extends Controller
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

        $res = User::where('id',Auth::user()->id)->first();
        $detail = UserDetail::where('id',Auth::user()->id)->first();
        $provinsi = Provinsi::all();
        $kabupaten = Kabupaten::all();
        $kecamatan = Kecamatan::all();
        $dokumen = DokumenMaster::all();
        $fileupload = FileUpload::where('id',Auth::user()->id)->get();

        $countphoto =  FileUpload::where('id',Auth::user()->id)->where('id_lampiran',6)->count();
        $photo = FileUpload::where('id',Auth::user()->id)->where('id_lampiran',6)->first();
        
        return  View('profil.index',compact('res','detail','provinsi','kabupaten','kecamatan','dokumen','fileupload','photo','countphoto'));
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
       $keydetail = UserDetail::where('id',$id)->count();

       $update = User::where('id',$id)->update(['name' => $request->nama_lengkap,
                                       'email' => $request->email]);

       if($keydetail <= 0){
           UserDetail::insert(['nama_lengkap_perseorangan' => $request->nama_lengkap,
                               'email_perseorangan' => $request->email,
                               'alamat_lengkap_perseorangan' => $request->alamat_lengkap,
                               'no_hp_perseorangan' => $request->no_hp,
                               'nik_perseorangan' => $request->nik,
                               'tempat_lahir_perseorangan' => $request->tempat_lahir,
                               'tanggal_lahir_perseorangan' => date('Y-m-d',strtotime($request->tanggal_lahir)),
                               'npwp_perseorangan' => $request->npwp,
                               'kode_provinsi_perseorangan' => 1,
                               'provinsi_perseorangan'=> 'tes',
                               'kode_kabupaten_perseorangan' => 1,
                               'kabupaten_perseorangan' => 'tes',
                               'kode_kecamatan_perseorangan' => 1,
                               'kecamatan_perseorangan' => 'tes',
                               'kode_kelurahan_perseorangan' => 1,
                               'kelurahan_perseorangan' => 'tes',
                               'alamat_lengkap_perseorangan' => $request->alamat_lengkap,
                               'kode_pos_perseorangan' => $request->kode_pos,
                               'status_pernikahan' => $request->status_pernikahan,
                               'nama_ibu_kandung' => $request->ibu_kandung,
                               'nama_pasangan' => $request->nama_pasangan,
                               'tempat_lahir_pasangan' => $request->tempat_lahir_pasangan,
                               'tanggal_lahir_pasangan' => date('Y-m-d',strtotime($request->tanggal_lahir_pasangan)),
                               'nomor_ktp_pasangan' => $request->nik_pasangan,
                               'no_hp' => $request->no_hp_pasangan,
                               'alamat_pasangan' => $request->alamat_pasangan,
                               'id' => $id]);
       }else{
           UserDetail::where('id',$id)->update(['nama_lengkap_perseorangan' => $request->nama_lengkap,
                               'email_perseorangan' => $request->email,
                               'alamat_lengkap_perseorangan' => $request->alamat_lengkap,
                               'no_hp_perseorangan' => $request->no_hp,
                               'nik_perseorangan' => $request->nik,
                               'tempat_lahir_perseorangan' => $request->tempat_lahir,
                               'tanggal_lahir_perseorangan' => date('Y-m-d',strtotime($request->tanggal_lahir)),
                               'npwp_perseorangan' => $request->npwp,
                               'kode_provinsi_perseorangan' => 1,
                               'provinsi_perseorangan'=> 'tes',
                               'kode_kabupaten_perseorangan' => 1,
                               'kabupaten_perseorangan' => 'tes',
                               'kode_kecamatan_perseorangan' => 1,
                               'kecamatan_perseorangan' => 'tes',
                               'kode_kelurahan_perseorangan' => 1,
                               'kelurahan_perseorangan' => 'tes',
                               'alamat_lengkap_perseorangan' => $request->alamat_lengkap,
                               'kode_pos_perseorangan' => $request->kode_pos,
                               'status_pernikahan' => $request->status_pernikahan,
                               'nama_ibu_kandung' => $request->ibu_kandung,
                               'nama_pasangan' => $request->nama_pasangan,
                               'tempat_lahir_pasangan' => $request->tempat_lahir_pasangan,
                               'tanggal_lahir_pasangan' => date('Y-m-d',strtotime($request->tanggal_lahir_pasangan)),
                               'nomor_ktp_pasangan' => $request->nik_pasangan,
                               'no_hp' => $request->no_hp_pasangan,
                               'alamat_pasangan' => $request->alamat_pasangan,
                               ]);
       }

       if($update){
            Session::flash('success','Berhasil Mengubah Data');
            return redirect('profil');
       }else{
            Session::flash('failed','Gagal Mengubah Data');
            return redirect('profil');
       }
    }


     public function update_company(Request $request, $id)
    {
        //
       $keydetail = UserDetail::where('id',$id)->count();

       $omset = str_replace('.','',$request->omset_perusahaan_setahun);

        if($keydetail <= 0){

           $update =   UserDetail::insert(['nama_perusahaan' => $request->nama_perusahaan,
                                  'tahun_berdiri_perusahaan' => $request->tahun_berdiri,
                                  'bidang_usaha_perusahaan' => $request->bidang_usaha,
                                  'omset_perusahaan_setahun' => $omset,
                                  'jumlah_karyawan' => $request->jumlah_karyawan,
                                  'siup' => $request->siup,
                                  'tdp' => $request->tdp,
                                  'alamat_lengkap_perusahaan' => $request->alamat_lengkap_perusahaan,
                                  'kode_provinsi_perusahaan' => 1,
                                  'provinsi_perusahaan' => $request->provinsi_perusahaan,
                                  'kode_kabupaten_perusahaan' => 1,
                                  'kabupaten_perusahaan' => $request->kabupaten_perusahaan,
                                  'kode_kecamatan_perusahaan' => 1,
                                  'kecamatan_perusahaan' => $request->kecamatan_perusahaan,
                                  'no_telp_perusahaan' => $request->nomor_telp,
                                  'no_fax_perusahaan' => $request->nomor_fax,
                                  'npwp_perusahaan' => $request->npwp_perusahaan,
                                  'email_perusahaan' => $request->email_perusahaan,
                                  'kode_pos_perusahaan' => $request->kode_pos_perusahaan,
                                  'id' => $id]);
        }else{

           $update =   UserDetail::where('id',$id)->update(['nama_perusahaan' => $request->nama_perusahaan,
                                  'tahun_berdiri_perusahaan' => $request->tahun_berdiri,
                                  'bidang_usaha_perusahaan' => $request->bidang_usaha,
                                  'omset_perusahaan_setahun' => $omset,
                                  'jumlah_karyawan' => $request->jumlah_karyawan,
                                  'siup' => $request->siup,
                                  'tdp' => $request->tdp,
                                  'alamat_lengkap_perusahaan' => $request->alamat_lengkap_perusahaan,
                                  'kode_provinsi_perusahaan' => 1,
                                  'provinsi_perusahaan' => $request->provinsi_perusahaan,
                                  'kode_kabupaten_perusahaan' => 1,
                                  'kabupaten_perusahaan' => $request->kabupaten_perusahaan,
                                  'kode_kecamatan_perusahaan' => 1,
                                  'kecamatan_perusahaan' => $request->kecamatan_perusahaan,
                                  'no_telp_perusahaan' => $request->nomor_telp,
                                  'no_fax_perusahaan' => $request->nomor_fax,
                                  'npwp_perusahaan' => $request->npwp_perusahaan,
                                  'kode_pos_perusahaan' => $request->kode_pos_perusahaan,
                                  'email_perusahaan' => $request->email_perusahaan,]);
        }


       if($update){
            Session::flash('success','Berhasil Mengubah Data');
            return redirect('profil');
       }else{
            Session::flash('failed','Gagal Mengubah Data');
            return redirect('profil');
       }


    }


    public function update_dokumen(Request $request, $id)
    {
        # code...
       $dokumen = DokumenMaster::all();
       $destination = public_path()."\uploads\\registrasi-pengajuan\\";
     

          $filename = "doc".$request->id_lampiran.date('s');
          $nm_image = $request->file('file'.$request->id_lampiran)->getClientOriginalName();
          $ext = pathinfo($nm_image,PATHINFO_EXTENSION);
          $request->file('file'.$request->id_lampiran)->move($destination, $filename.'.'.$ext);
          $orifile = $filename.'.'.$ext;

          $key = FileUpload::where('id_lampiran',$request->id_lampiran)->count();

          if($key <= 0){
             FileUpload::insert(['id_lampiran' => $request->id_lampiran,
                              'nama_file' => $orifile,
                              'nama_dokumen' => $request->nama_lampiran,
                              'id' => $id]);
          }else{
              FileUpload::where('id_lampiran',$request->id_lampiran)->update(['nama_file' => $orifile,'nama_dokumen' => $request->nama_lampiran,'id' => $id]);
          }


       Session::flash('success','Berhasil Mengubah Data');
       return redirect('profil');
       
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
}
