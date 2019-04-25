<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programkerja;
use App\Programkerjadetail;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class ProgramkerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        $id=Auth::user()->id_satker;


        if (Auth::user()->id_jenis_user==1) {
            $programkerja = DB::table('master_programkerja')
            ->join('master_kegiatan','master_kegiatan.id_kegiatan','=','master_programkerja.id_kegiatan')
            ->join('master_program','master_program.id_program','=','master_programkerja.id_program')
            ->join('master_akun','master_akun.id_akun','=','master_programkerja.id_akun')

            ->join('jenis_satker','jenis_satker.id_jenis_satker','=','master_programkerja.id_satker')

            ->get();


            $programnotif = DB::table('master_programkerjadetail')
            ->where('master_programkerjadetail.status','=',1)
            ->get();


        }else{
            $programkerja = DB::table('master_programkerja')
            ->join('master_kegiatan','master_kegiatan.id_kegiatan','=','master_programkerja.id_kegiatan')
            ->join('master_program','master_program.id_program','=','master_programkerja.id_program')
            ->join('master_akun','master_akun.id_akun','=','master_programkerja.id_akun')
            ->where('master_programkerja.id_satker','=',$id)
            ->get();
        }

        return view('master.programkerja.index', compact('programkerja','programnotif'));
    }

    public function viewlap()
    {
        //
        $id=Auth::user()->id_satker;

        if (Auth::user()->id_jenis_user==1) {
            $programkerja = DB::table('master_programkerja')
            ->join('master_kegiatan','master_kegiatan.id_kegiatan','=','master_programkerja.id_kegiatan')
            ->join('master_program','master_program.id_program','=','master_programkerja.id_program')
            ->join('master_akun','master_akun.id_akun','=','master_programkerja.id_akun')
            ->join('jenis_satker','jenis_satker.id_jenis_satker','=','master_programkerja.id_satker')
            ->get();
            $programnotif = DB::table('master_programkerjadetail')
            ->where('master_programkerjadetail.status','=',1)
            ->get();


        }else{
            $programkerja = DB::table('master_programkerja')
            ->join('master_kegiatan','master_kegiatan.id_kegiatan','=','master_programkerja.id_kegiatan')
            ->join('master_program','master_program.id_program','=','master_programkerja.id_program')
            ->join('master_akun','master_akun.id_akun','=','master_programkerja.id_akun')
            ->where('master_programkerja.id_satker','=',$id)
            ->get();
        }

        return view('master.programkerja.view', compact('programkerja','programnotif'));
    }
       public function getkegiatan($id_program=''){

        $kegiatan = DB::table('master_kegiatan')->where('id_program',$id_program)->get();
        return view('master.programkerja.kegiatan',compact('kegiatan'));
    }



    public function indexdetail($id)
    {
        //
       $programkerjadetail = DB::table('master_programkerjadetail')

       ->where('id_programkerja', $id)
       ->get();


       $programkerja = DB::table('master_programkerja')
       ->join('master_kegiatan','master_kegiatan.id_kegiatan','=','master_programkerja.id_kegiatan')
       ->join('master_program','master_program.id_program','=','master_programkerja.id_program')
       ->join('master_akun','master_akun.id_akun','=','master_programkerja.id_akun')
       ->join('jenis_satker','jenis_satker.id_jenis_satker','=','master_programkerja.id_satker')
       ->where('id_programkerja', $id)
       ->get();


       $adendum =DB::table('mater_programkerjaadendum')->get();
       return view('master.programkerjadetail.index', compact('programkerja','programkerjadetail','id','adendum'));
   }

   

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $url = "programkerja_insert";
        $program = DB::table('master_program')->get();
        $akun = DB::table('master_akun')->get();
        $kegiatan = DB::table('master_kegiatan')->get();

        return View('master.programkerja.form', compact('url','program','akun','kegiatan'));
    }

    public function createdetail($id)
    {
        //
        $url = "programkerjadetail_insert";
        $program = DB::table('master_programkerjadetail') ->join('master_programkerja','master_programkerja.id_programkerja','=','master_programkerjadetail.id_programkerja')->get();


        return View('master.programkerjadetail.form', compact('url','program','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = Auth::user()->id_satker;

        $insert = DB::table('master_programkerja')->insertGetId([
            'tahun' => $request->tahun,
            'tanggal' => $request->tanggal,
            'id_satker' => $id,
            'id_akun' => $request->akun,
            'id_program' => $request->program,
            'id_kegiatan' => $request->kegiatan,

        ],'id_programkerja');


        if ($insert) {

            $insert3= DB::table('upload_file_progja')->insert([
                'id_master_upload'      => 1,
                'id_sub_master_upload'  => 1,
                'id_progja'             => $insert
            ]);

            $insert3= DB::table('upload_file_progja')->insert([
                'id_master_upload'      => 1,
                'id_sub_master_upload'  => 2,
                'id_progja'             => $insert
            ]);

            $insert3= DB::table('upload_file_progja')->insert([
                'id_master_upload'      => 2,
                'id_sub_master_upload'  => 5,
                'id_progja'             => $insert
            ]);

            $insert3= DB::table('upload_file_progja')->insert([
                'id_master_upload'      => 2,
                'id_sub_master_upload'  => 6,
                'id_progja'             => $insert
            ]);

            $insert3= DB::table('upload_file_progja')->insert([
                'id_master_upload'      => 2,
                'id_sub_master_upload'  => 7,
                'id_progja'             => $insert
            ]);

            $insert3= DB::table('upload_file_progja')->insert([
                'id_master_upload'      => 2,
                'id_sub_master_upload'  => 8,
                'id_progja'             => $insert
            ]);

            $insert3= DB::table('upload_file_progja')->insert([
                'id_master_upload'      => 2,
                'id_sub_master_upload'  => 9,
                'id_progja'             => $insert
            ]);

            $insert3= DB::table('upload_file_progja')->insert([
                'id_master_upload'      => 3,
                'id_sub_master_upload'  => 10,
                'id_progja'             => $insert
            ]);

            $insert3= DB::table('upload_file_progja')->insert([
                'id_master_upload'      => 3,
                'id_sub_master_upload'  => 11,
                'id_progja'             => $insert
            ]);

            $insert3= DB::table('upload_file_progja')->insert([
                'id_master_upload'      => 3,
                'id_sub_master_upload'  => 12,
                'id_progja'             => $insert
            ]);

            $insert3= DB::table('upload_file_progja')->insert([
                'id_master_upload'      => 3,
                'id_sub_master_upload'  => 13,
                'id_progja'             => $insert
            ]);

            $insert3= DB::table('upload_file_progja')->insert([
                'id_master_upload'      => 3,
                'id_sub_master_upload'  => 14,
                'id_progja'             => $insert
            ]);

            return redirect('/list_programkerja');
        } else {
            return "gagal";
        }
    }
    public function storedetail(Request $request)
    {

        $hariini=date('y-m-d');
        $insert = DB::table('master_programkerjadetail')->insertGetId([
            'kegiatan' => $request->kegiatan,
            'pagu' => $request->pagu,
            'id_programkerja'=> $request->idprogram,
            'status' => 0,
            'status_update' => 0,
            'update'=>$hariini,
            'no_ktr' => $request->no_ktr,
            'jumlah' => intval(preg_replace('/,.*|[^0-9]/', '',$request->jumlah)),
            'minpro' => intval(preg_replace('/,.*|[^0-9]/', '',$request->minpro)),
            'pelaksana' => $request->pelaksana,
            'tds_ktr' => $request->tds_ktr,
            'kemajuan_admin' => $request->kemajuan_admin,
            'kemajuan_fisik' => $request->kemajuan_fisik,
            'keterangan' => $request->keterangan,

        ],'id_detailprogramkerja');
  $iduser=Auth::user()->id_satker;
         $update2=DB::table('notif')->insert([
     'id_pengirim' => $iduser,
     'status'=> 0,
     'id_penerima'=> 1,
     'id_keterangan'=>24,
     'keterangan'=>'POKJA BARU',
     'pesan'=>'Tambah Pokja',
     'id_pokja'=>$insert,
 ]);

        if ($insert) {
            return redirect('/detailprogramkerja_add/'.$request->idprogram);
        } else {
            return "gagal";
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $url = "programkerja_update";
         $programkerja = DB::table('master_programkerja')->where('id_programkerja', $id)->first();

        $program = DB::table('master_program')->get();
        $akun = DB::table('master_akun')->get();
        $kegiatan = DB::table('master_kegiatan')->get();
       
        return view('master.programkerja.form', compact('programkerja', 'url','akun','program','kegiatan'));
    }

    public function editdetail($id)
    {
        //
        $url = "programkerjadetail_update";

        $program = DB::table('master_programkerjadetail')->where('id_detailprogramkerja', $id)->first();
        return view('master.programkerjadetail.form', compact('program', 'url','id'));
    }


    public function editdetailadendum($id)
    {
        //
        $url = "programkerjaadendum_update";

        $program = DB::table('master_programkerjadetail')->where('id_detailprogramkerja', $id)->first();
        return view('master.programkerjadetail.editadendum', compact('program', 'url','id'));
    }
    public function editeditadendum($id , $iddetail)
    {
        //
        $url = "adendum_update";
        $pro = DB::table('master_programkerjadetail')->where('id_detailprogramkerja', $iddetail)->get();
        $program = DB::table('mater_programkerjaadendum')->where('id_adendum', $id)->first();
        return view('master.programkerjadetail.editeditadendum', compact('program', 'url','id','iddetail','pro'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
      $id=$request->id_programkerja;
      $update = DB::table('master_programkerja')->where('id_programkerja', $id)->update([
        'tanggal' => $request->tanggal,
        'id_akun' => $request->akun,
        'id_program' => $request->program,
        'id_kegiatan' => $request->kegiatan,

    ]);
      if ($update) {
        return redirect('/list_programkerja');
    } else {
        return "gagal";
    }

}



public function updatedetail(Request $request)
{
        //
  $id=$request->id_detailprogramkerja;
  $ida=$request->id_program;
  $hariini=date('y-m-d');
  $update = DB::table('master_programkerjadetail')->where('id_detailprogramkerja', $id)->update([
     'kegiatan' => $request->kegiatan,
     'pagu' => $request->pagu,
     'status' => 1,
     'status_update' => 0,
     'update'=> $hariini,
     'no_ktr' => $request->no_ktr,
     'jumlah' => intval(preg_replace('/,.*|[^0-9]/', '',$request->jumlah)),
            'minpro' => intval(preg_replace('/,.*|[^0-9]/', '',$request->minpro)),
     'pelaksana' => $request->pelaksana,
     'tds_ktr' => $request->tds_ktr,
     'kemajuan_admin' => $request->kemajuan_admin,
     'kemajuan_fisik' => $request->kemajuan_fisik,
     'keterangan' => $request->keterangan,
 ]);

  $iduser=Auth::user()->id_satker;

  $update2=DB::table('notif')->insert([
     'id_pengirim' => $iduser,
     'status'=> 0,
     'id_penerima'=> 1,
     'id_keterangan'=>24,
     'keterangan'=>'Update POKJA',
     'pesan'=>'Update POKJA',
     'id_pokja'=>$id,
 ]);





  try{
   $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Update Progres Program Kerja'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array('kamillutfi505@gmail.com' => 'Pushidrosal Admin'))
             ->setBody('<h2>Progren Rencana Kegiatan</h2><br><b>', 'text/html');
             $result = $mailer->send($message);


         }catch(\Swift_TransportException $e){
           $response = $e->getMessage() ;
           echo $response;
       }



       if ($update) {
        return redirect('/detailprogramkerja_add/'.$ida);
    } else {
        return "gagal";
    }

}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
        //
     */


    public function updatedetailadendum(Request $request)
    {

      $hariini=date('y-m-d');
      $id=$request->id_detailprogramkerja;
      $ida=$request->id_program;
      $update = DB::table('master_programkerjadetail')->where('id_detailprogramkerja', $id)->update([
        'status' => 1,
        'status_update' => 2,
        'update' => $hariini,


    ]);

      $update2=DB::table('mater_programkerjaadendum')->insert([

         'id_detailprogramkerja'=> $request->id_detailprogramkerja,
         'kemajuan_fisik' => $request->kemajuan_fisik,
         'kemajuan_admin' => $request->kemajuan_admin,
         'no_ktr' => $request->no_ktr,

     ]);


      $iduser=Auth::user()->id_satker;

      $update2=DB::table('notif')->insert([
         'id_pengirim' => $iduser,
         'status'=> 0,

         'id_penerima'=> 1,
         'id_keterangan'=>24,
         'keterangan'=>'ADENDUM',
         'pesan'=>'Tambah Adendum',

         'id_pokja'=>$id,
     ]);





      try{
       $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Update Progres Program Kerja'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array('kamillutfi505@gmail.com' => 'Pushidrosal Admin'))
             ->setBody('<h2>Progren Rencana Kegiatan</h2><br><b>', 'text/html');
             $result = $mailer->send($message);


         }catch(\Swift_TransportException $e){
           $response = $e->getMessage() ;
           echo $response;
       }



       if ($update) {
        return redirect('/detailprogramkerja_add/'.$ida);
    } else {
        return "gagal";
    }


}


public function adendum_update(Request $request)
{

  $hariini=date('y-m-d');
  $idprog=$request->idprog;
  $id=$request->id_detailprogramkerja;
  $ida=$request->id_program;
  $update = DB::table('master_programkerjadetail')->where('id_detailprogramkerja', $id)->update([
    'status' => 1,

    'update' => $hariini


]);

  $update2=DB::table('mater_programkerjaadendum')->where('id_adendum', $ida)->update([


     'kemajuan_fisik' => $request->kemajuan_fisik,
     'kemajuan_admin' => $request->kemajuan_admin

 ]);


  $iduser=Auth::user()->id_satker;

  $update3=DB::table('notif')->insert([
     'id_pengirim' => $iduser,
     'status'=> 0,

     'id_penerima'=> 1,
     'id_keterangan'=>24,
     'keterangan'=>'Adendum Update',
     'pesan'=>'Update Adendum',

     'id_pokja'=>$id,
 ]);





  try{
   $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Update Progres Program Kerja'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array('kamillutfi505@gmail.com' => 'Pushidrosal Admin'))
             ->setBody('<h2>Progren Rencana Kegiatan</h2><br><b>', 'text/html');
             $result = $mailer->send($message);


         }catch(\Swift_TransportException $e){
           $response = $e->getMessage() ;
           echo $response;
       }



       if ($update) {
        return redirect('/detailprogramkerja_add/'.$idprog);
    } else {
        return "gagal";
    }


}



public function editnotif($id)
{


  $select=DB::table('master_programkerjadetail')->where('id_detailprogramkerja', $id)->get();
  foreach ($select as $value) {
      $idprog=$value->id_programkerja;
  }

    $update = DB::table('master_programkerjadetail')->where('id_detailprogramkerja', $id)->update([

     'status' => 0,

 ]);
    $update2 = DB::table('notif')->where('id_pokja', $id)->update([

     'status' => 1,

 ]);

       if ($update2) {
        return redirect('/detailprogramkerja_add/'.$idprog);
    } else {
        return "gagal";
    }


}

public function destroy($id)
{

    $delete2= DB::table('master_programkerjadetail')->where('id_programkerja',$id)->delete();
    $delete= DB::table('master_programkerja')->where('id_programkerja',$id)->delete();


    DB::table('upload_file_progja')->where('id_progja',$id)->delete();

    Session::flash('flash_message', 'Programkerja deleted!');

    return redirect('/list_programkerja');
}



public function destroydetail($ids,$id)
{
        //
   $delete = DB::table('master_programkerjadetail')->where('id_detailprogramkerja', $ids)->delete();

   if ($delete) {
    return redirect('/detailprogramkerja_add/'.$id);
} else {
    return "gagal";
}
}
public function destroyadendum($ids,$id)
{
        //
   $delete = DB::table('mater_programkerjaadendum')->where('id_adendum', $ids)->delete();

   if ($delete) {
    return redirect('/detailprogramkerja_add/'.$id);
} else {
    return "gagal";
}
}



public function cetaklaporan()
{
        //
    $programkerja = DB::table('master_programkerja')
    ->join('master_kegiatan','master_kegiatan.id_kegiatan','=','master_programkerja.id_kegiatan')
    ->join('master_program','master_program.id_program','=','master_programkerja.id_program')
    ->join('master_akun','master_akun.id_akun','=','master_programkerja.id_akun')

    ->get();


    return view('master.programkerja.laporancetak', compact('programkerja','programnotif'));
}

}
