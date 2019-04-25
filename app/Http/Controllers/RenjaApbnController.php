<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Program;
use App\Uraian_biaya_administrasi;
use App\Uraian_kegiatan_rincian_biaya;
use Illuminate\Support\Facades\DB;
use Session;
use Yajra\DataTables\Facades\DataTables;
use App\User;
use Auth;

class RenjaApbnController extends Controller
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
        $apbn = DB::select(" SELECT * from renbin where sumber_anggaran = 'APBN' AND id_user_pengirim = ".Auth::user()->id." order by id_renbin desc ");
        $pnbp = DB::select(" SELECT * from renbin where sumber_anggaran = 'PNBP' AND id_user_pengirim = ".Auth::user()->id." order by id_renbin desc");
        $noa = 1;
        $nob = 1;
        return view('renja.index', compact('apbn','pnbp','noa','nob'));
    }

    public function create()
    {

      $program = DB::select(" SELECT * from master_program ");
      $kegiatans = DB::select(" SELECT * from master_kegiatan ");
      $subkegiatan = DB::select(" SELECT * from sub_kegiatan ");
      $shopping_list = DB::select(" SELECT * from shopping_list where status= 1 ");

      $kegiatan = DB::select(" SELECT * from master_rencana where keterangan = 'kegiatan' ");

        //$url = "pnbp_insert";
      $getid = DB :: select("select id_renbin from renbin order by id_renbin desc limit 1");
      if(!empty($getid)){
        foreach($getid as $list){
            $id = $list->id_renbin;
            $id_renbin = $id+1;
        }
    }
    else{
        $id_renbin = 1;
    }
    $kode = $id_renbin."".date('d')."".date('m')."".date('Y');


    return view('renja.tambahrenaku1', compact('program','kegiatan','kode','shopping_list','subkegiatan','kegiatans'));
}

public function subkegiatan($id_kegiatan)
{
    $subkegiatan = DB::table('sub_kegiatan')->where('id_kegiatan',$id_kegiatan)->get();
       


    return view('renja.subkegiatan', compact('subkegiatan'));
}


 public function getkegiatan($id_program=''){

        $kegiatan = DB::table('master_kegiatan')->where('id_program',$id_program)->get();
        return view('renja.kegiatan',compact('kegiatan'));
    }

public function paskarenaku1($id_renbin)
{
   $notif = DB::select("delete from notif where id_keterangan ='".$id_renbin."' and keterangan='RENJA'");

        //view renaku
   $renbin = DB::select(" SELECT * from renbin where id_renbin = '".$id_renbin."' ");

   $master_jawaban_renbin = DB::select(" SELECT count(id_jawaban), id_program FROM sakip.master_jawaban_renbin where id_renbin = '".$id_renbin."' GROUP BY id_program");

   $tahap = 2;

        //view pra renaku
   $programs = DB::select(" SELECT * from master_program ");

   $kegiatans = DB::select(" SELECT * from master_rencana where keterangan = 'kegiatan' ");

   return view('renja.hasilpascarenaku1', compact('programs','kegiatans','renbin','master_jawaban_renbin','id_renbin','tahap'));
}
public function paskarenaku2($id_renbin)
{
    $notif = DB::select("delete from notif where id_keterangan ='".$id_renbin."' and keterangan='RENJA' ");
        //view renaku
    $renbin = DB::select(" SELECT * from renbin where id_renbin = '".$id_renbin."' ");

    $master_jawaban_renbin = DB::select(" SELECT count(id_jawaban), id_program FROM sakip.master_jawaban_renbin where id_renbin = '".$id_renbin."' GROUP BY id_program order by id_program asc");

    $tahap = 2;

        //view pra renaku
    $programs = DB::select(" SELECT * from master_program ");

    $kegiatans = DB::select(" SELECT * from master_rencana where keterangan = 'kegiatan' ");

    return view('renja.hasilpascarenaku2', compact('programs','kegiatans','renbin','master_jawaban_renbin','id_renbin','tahap'));
}

public function prarenaku2()
{
        //$rencana = DB::select(" SELECT id_rencana_program_rengiat,rencana_program_rengiat,status from master_rencana_program_rengiat where status = '2'");

        //$url = "pnbp_insert";
    return view('renja.prarenaku2');
}


public function tambahrencana(Request $request)
{
    $id_pengirim = Auth::user()->id;
    $countiprod = count($request->id_program);   
    $countidrenbin = count($request->id_shop);  

    $insert = DB::select("insert into renbin (tanggal,tahun_anggaran,kode_rencana_kebutuhan,sumber_anggaran,id_user_pengirim) 
        values ('".$request->tanggal."','".$request->tahun_perencanaan."','".$request->kode."','".$request->sumber_anggaran."','".$id_pengirim."')");


    $cekidrencana = DB::select("SELECT * from renbin where tanggal = '".$request->tanggal."' and tahun_anggaran = '".$request->tahun_perencanaan."' and sumber_anggaran ='".$request->sumber_anggaran."' and kode_rencana_kebutuhan = '".$request->kode."' ");
    foreach ($cekidrencana as $value) {
        $id_renbin = $value->id_renbin;
    }

    $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima) 
        values ('".$id_pengirim."','".$id_renbin."','RENJA','pengajuan rencana kebutuhan','0','1')");



    $jumlah_anggaran = 0;
    for ($i=0 ; $i < $countiprod ; $i++)
    {
        $jumlah_anggaran += $request->rencana_anggaran[$i];



        $masuk = DB::select("insert into master_jawaban_renbin (detail_kegiatan,volume,anggaran,keterangan,id_renbin,id_program,id_kegiatan,id_sub) 
            values ('".$request->detail_kegiatan[$i]."','".$request->volume[$i]."','".$request->rencana_anggaran[$i]."','".$request->keterangan[$i]."','".$id_renbin."','".$request->id_program[$i]."','".$request->id_kegiatan[$i]."','".$request->id_sub[$i]."')");
    }

    $update = DB::select("update renbin set jumlah_anggaran='".$jumlah_anggaran."' where id_renbin ='".$id_renbin."'");

     for ($x=0 ; $x < $countidrenbin ; $x++)
    {
        $delete=DB::table('shopping_list')->where('id',$request->id_shop[$x])->delete();
    }


    $kode  = $request->kode;
    $getemail = DB::select("SELECT * from users where id_jenis_user = '1' limit 1 ");
    foreach ($getemail as $value) {
        $email = $value->email;
    }


    try{
       $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Pengajuan Baru'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Penngajuan Rencana Kebutuhan baru</h2><br><b>No Urut Renbut : '.$kode.'</b><p>Diterima pengajuan rencana kebutuhan baru silahkan lihat aplikasi untuk mengkonfirmasi.</p>', 'text/html');
             $result = $mailer->send($message);


         }catch(\Swift_TransportException $e){
           $response = $e->getMessage() ;
           echo $response;
       }


       return redirect('/renja_apbn');
   }

   public function editrencana1(Request $request)
   {
    $id_pengirim = Auth::user()->id;
    $countiprod = count($request->id_program);   

        //shopping list
    $kosong = DB::select("select * from master_jawaban_renbin where id_renbin = '".$request->id_renbin."' and status='0'");
    foreach ($kosong as $kosong) {
        $id_j  = $kosong->id_jawaban;
        $detail_kegiatansp = $kosong->detail_kegiatan;
        $volumesp = $kosong->volume;
        $anggaransp = $kosong->anggaran;
        $keterangansp = $kosong->keterangan;
        $id_renbinsp = $kosong->id_renbin;
        $id_programsp = $kosong->id_program;
        $id_kegiatansp = $kosong->id_kegiatan;
        $id_subsp = $kosong->id_sub;

        $masuksp = DB::select("insert into shopping_list (detail_kegiatan,volume,anggaran,keterangan,id_renbin,id_program,id_kegiatan,id_sub) 
            values ('".$detail_kegiatansp."','".$volumesp."','".$anggaransp."','".$keterangansp."','".$id_renbinsp."','".$id_programsp."','".$id_kegiatansp."','".$id_subsp."')");

        $kosong = DB::select("delete from master_jawaban_renbin where id_jawaban = '".$id_j."'");

    }




    $jumlah_anggaran = 0;
    for ($i=0 ; $i < $countiprod ; $i++)
    {
                // $jumlah_anggaran += $request->rencana_anggaran[$i];

               //master jawaban renbin
        $masuk = DB::select("insert into master_jawaban_renbin (detail_kegiatan,volume,anggaran,keterangan,id_renbin,id_program,id_kegiatan,id_sub) 
            values ('".$request->detail_kegiatan[$i]."','".$request->volume[$i]."','".$request->rencana_anggaran[$i]."','".$request->keterangan[$i]."','".$request->id_renbin."','".$request->id_program[$i]."','".$request->id_kegiatan[$i]."','".$request->id_sub[$i]."')");
    }

    $angg = DB::select("select * from master_jawaban_renbin where id_renbin = '".$request->id_renbin."'");
    foreach ($angg as $key) {
        $jumlah_anggaran += $key->anggaran;
    }

    $update = DB::select("update renbin set jumlah_anggaran='".$jumlah_anggaran."' , status='2',keterangan = '' where id_renbin ='".$request->id_renbin."'");

    $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima) 
        values ('".$id_pengirim."','".$request->id_renbin."','RENJA','pembenaran pengajuan rencana kebutuhan','0','1')");

    $cekidrencana = DB::select("SELECT * from renbin where id_renbin='".$request->id_renbin."' ");
    foreach ($cekidrencana as $value) {
        $kode  = $value->kode_rencana_kebutuhan;
    }


    $getemail = DB::select("SELECT * from users where id_jenis_user = '1' limit 1 ");
    foreach ($getemail as $value) {
        $email = $value->email;
    }


    try{
       $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Pembenaran Pengajuan'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Pembenaran Pengajuan Rencana Kebutuhan</h2><br><b>No Urut Renbut : '.$kode.'</b><p>Diterima pembenaran pengajuan rencana kebutuhan silahkan lihat aplikasi untuk mengkonfirmasi.</p>', 'text/html');
             $result = $mailer->send($message);


         }catch(\Swift_TransportException $e){
           $response = $e->getMessage() ;
           echo $response;
       }



       return redirect('/renja_apbn');
   }

    //yg lama
   public function editrencana2(Request $request)
   {
    $id_pengirim = Auth::user()->id;
    $countiprod = count($request->id_program);   

    $jumlah_anggaran = 0;
    for ($i=0 ; $i < $countiprod ; $i++)
    {
        $jumlah_anggaran += $request->rencana_anggaran[$i];

        $delete = DB::select("delete from master_jawaban_renbin where id_renbin = '".$request->id_renbin."'");

        $masuk = DB::select("insert into master_jawaban_renbin (detail_kegiatan,volume,anggaran,keterangan,id_renbin,id_program,id_kegiatan,id_sub) 
            values ('".$request->detail_kegiatan[$i]."','".$request->volume[$i]."','".$request->rencana_anggaran[$i]."','".$request->keterangan[$i]."','".$request->id_renbin."','".$request->id_program[$i]."','".$request->id_kegiatan[$i]."','".$request->id_sub[$i]."')");
    }

    $update = DB::select("update renbin set jumlah_anggaran='".$jumlah_anggaran."' , status='4',keterangan = '' where id_renbin ='".$request->id_renbin."'");

    $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima) 
        values ('".$id_pengirim."','".$request->id_renbin."','RENJA','pembenaran akhir pengajuan rencana kebutuhan','0','1')");

    $cekidrencana = DB::select("SELECT * from renbin where id_renbin='".$request->id_renbin."' ");
    foreach ($cekidrencana as $value) {
        $kode  = $value->kode_rencana_kebutuhan;
    }


    $getemail = DB::select("SELECT * from users where id_jenis_user = '1' limit 1 ");
    foreach ($getemail as $value) {
        $email = $value->email;
    }


    try{
       $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Pengajuan Baru'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Pembenaran akhir Pengajuan Rencana Kebutuhan </h2><br><b>No Urut Renbut : '.$kode.'</b><p>Diterima pembenaran akhir pengajuan rencana kebutuhan silahkan lihat aplikasi untuk mengkonfirmasi.</p>', 'text/html');
             $result = $mailer->send($message);


         }catch(\Swift_TransportException $e){
           $response = $e->getMessage() ;
           echo $response;
       }


       return redirect('/renja_apbn');
   }


    //yg baru
   public function renbutkirim($id_renbin)
   {
    $id_pengirim = Auth::user()->id;

    $update = DB::select("update renbin set status='4',keterangan = '' where id_renbin ='".$id_renbin."'");

    $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima) 
        values ('".$id_pengirim."','".$id_renbin."','RENJA','pembenaran akhir pengajuan rencana kebutuhan','0','1')");

    $cekidrencana = DB::select("SELECT * from renbin where id_renbin='".$id_renbin."' ");
    foreach ($cekidrencana as $value) {
        $kode  = $value->kode_rencana_kebutuhan;
    }


    $getemail = DB::select("SELECT * from users where id_jenis_user = '1' limit 1 ");
    foreach ($getemail as $value) {
        $email = $value->email;
    }


    try{
       $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Pengajuan Baru'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Pembenaran akhir Pengajuan Rencana Kebutuhan </h2><br><b>No Urut Renbut : '.$kode.'</b><p>Diterima pembenaran akhir pengajuan rencana kebutuhan silahkan lihat aplikasi untuk mengkonfirmasi.</p>', 'text/html');
             $result = $mailer->send($message);


         }catch(\Swift_TransportException $e){
           $response = $e->getMessage() ;
           echo $response;
       }


       return redirect('/renja_apbn');
   }


   public function lihatrenja($id_renbin)
   {
    $notif = DB::select("update notif set status='1' where id_keterangan ='".$id_renbin."' and keterangan = 'RENJA'");
    $renbin = DB::select(" SELECT * from renbin where id_renbin = '".$id_renbin."' ");

    $master_jawaban_renbin = DB::select(" SELECT count(id_jawaban), id_program FROM sakip.master_jawaban_renbin where id_renbin = '".$id_renbin."' GROUP BY id_program");

    return view('renja.viewrenaku1', compact('renbin','master_jawaban_renbin','id_renbin'));
}




    //kak - bagan renbut(renja)
public function apbn_form2($id)
{

    $rencana = DB::select(" SELECT id_program,nama_program from master_program");
    $kegiatan = DB::select("select id_kegiatan,nama_kegiatan from master_kegiatan");

    $url = "save_detailrenbut_form2";
    return view('renja.detailrenbut_form2', compact('url', 'id','rencana','kegiatan'));
}

public function store_form2(Request $request)
{

    $id_pengirim = Auth::user()->id;
    $date = date('Y-m-d H:i:s');

    $insert_kerangka_acuan_kegiatan = DB::table('kerangka_acuan_kegiatan')->insertGetId([
        'kementrian_negara_lembaga' => $request->kementerian,
        'id_program' => $request->id_program,
        'hasil' => $request->hasil,
        'id_kegiatan' => $request->id_kegiatan,
        'indikator_kinerja_kegiatan' => $request->indikator_kinerja,
        'jenis_keluaran' => $request->jenis_keluaran,
        'volume_keluaran' => $request->volume_keluaran,
        'satuan_ukur_keluaran' => $request->satuan_ukur_keluaran,
        'dasar_hukum' => $request->dasar_hukum,
        'gambaran_umum' => $request->gambaran_umum,
        'penerimaan_manfaat' => $request->penerimaan_manfaat,
        'metode_pelaksanaan' => $request->metode_pelaksanaan,
        'waktu_pelaksanaan' => $request->tahapan_waktu,
        'status' => 2,

        'waktu_pencapaian_keluaran' => $request->waktu_pencapaian,
        'biaya_yang_diperlukan' => intval(preg_replace('/,.*|[^0-9]/', '',$request->biaya_diperlukan)),
        'id_user' => Auth::user()->id
    ], 'id_kerangka_acuan_kegiatan');

    $insert_jawaban_renbut = DB::table('master_jawaban_renbin')->where('id_jawaban', $request->id)->update([
        'id_kerangka_acuan_kegiatan' => $insert_kerangka_acuan_kegiatan
    ]);

    $number = count($_POST["uraian_kegiatan"]);
    if ($number > 0) {
        for ($i = 0; $i < $number; $i++) {
            $insert = DB::table('waktu_pelaksanaan')->insert([
                'id_waktu_pelaksanaan' => $insert_kerangka_acuan_kegiatan,
                'uraian_kegiatan' => $request->uraian_kegiatan[$i],
                'jadwal_waktu' => $request->jadwal_waktu[$i],
                'status' => 2,
            ]);
        }
    }

    $idr= DB::select("select * from master_jawaban_renbin where id_jawaban = '".$request->id."' ");
    foreach ($idr as $idr) {
        $idrenbin = $idr->id_renbin;
    }

    return redirect('/detailrenbut_form3/' . $request->id .'');

}

public function apbn_form3($id)
{

     $kerangka=DB::table('master_jawaban_renbin')->join('kerangka_acuan_kegiatan','kerangka_acuan_kegiatan.id_kerangka_acuan_kegiatan','=','master_jawaban_renbin.id_kerangka_acuan_kegiatan')->where('id_jawaban',$id)->first();
   
     
    $program = DB::select(" SELECT id_program,nama_program from master_program ");
    $kegiatan = DB::select("select id_kegiatan,nama_kegiatan from master_kegiatan");
    $url = "save_detailrenbut_form3";
    $biaya_administrasi = Uraian_biaya_administrasi::where("id_uraian_lengkap", $id)->first();

    return view('renja.detailrenbut_form3', compact('url', 'biaya_administrasi', 'id','program','kegiatan','kerangka'));

}

public function store_form3(Request $request)
{
        
    $id_pengirim = Auth::user()->id;
    $date = date('Y-m-d H:i:s');

    $insert_uraian_kegaitan = DB::table('uraian_kegiatan_rincian_biaya')->insertGetId([
        'kementrian_negara_lembaga' => $request->kementerian,
        'program' => $request->id_program,
        'kegiatan' => $request->id_kegiatan,
        'keluaran' => $request->keluaran,
        'detil_kegiatan' => $request->detil_kegiatan,
        'volume' => $request->volume,
        'satuan_ukur' => $request->satuan_ukur,
        'alokasi_dana' => $request->alokasi_dana,
        'total_biaya_fisik' => $request->total_biaya_fisik,
        'total_biaya_administrasi' => $request->total_biaya_administrasi,
        'Total_keseluruhan' => $request->Total_keseluruhan,
        'id_rincian_anggaran_biaya' => $request->id,
        'status' => 2,
        'id_user' => Auth::user()->id
    ], 'id_uraian_kegiatan_rincian_biaya');

    $jawaban_renbin = DB::table('master_jawaban_renbin')->where('id_jawaban', $request->id)->update([
        'id_uraian_kegiatan_rincian_biaya' => $insert_uraian_kegaitan
    ]);

    $number = count($_POST["uraian_pekerjaan"]);
    if ($number > 0) {
        for ($i = 0; $i < $number; $i++) {
            $insert = DB::table('rincian_anggaran_biaya')->insert([
                'id_rincian_anggaran_biaya' => $insert_uraian_kegaitan,
                'uraian_pekerjaan' => $request->uraian_pekerjaan[$i],
                'jumlah' => $request->jumlah[$i],
                'satuan' => $request->satuan[$i],
                'harga_satuan' => $request->harga_satuan[$i],
                'harga_jasa' => $request->harga_jasa[$i],
                'harga_material' => $request->harga_material[$i],
                'harga_jumlah' => $request->jumlah_total[$i],
                'status' => 2,
            ]);
        }
    }


    $idr= DB::select("select * from master_jawaban_renbin where id_jawaban = '".$request->id."' ");
    foreach ($idr as $idrn) {
        $idrenbin = $idrn->id_renbin;
    }
   
    return redirect('/detailrenbut_form4/' . $request->id . '');

}

public function apbn_form4($id)
{
    $kerangka=DB::table('master_jawaban_renbin')->join('kerangka_acuan_kegiatan','kerangka_acuan_kegiatan.id_kerangka_acuan_kegiatan','=','master_jawaban_renbin.id_kerangka_acuan_kegiatan')->where('id_jawaban',$id)->first();
    $program = DB::select(" SELECT id_program,nama_program from master_program");
    $uraian = DB::table('uraian_kegiatan_rincian_biaya')->get();
    $kegiatan = DB::select("select id_kegiatan,nama_kegiatan from master_kegiatan");
    $url = "save_detailrenbut_form4";
    $biaya_fisik = Uraian_kegiatan_rincian_biaya::where("id_rincian_anggaran_biaya", $id)->first();
//        die(dd($biaya_fisik));
    return view('renja.detailrenbut_form4', compact('url', 'id', 'biaya_fisik','program','kegiatan','kerangka','uraian'));

}

public function store_form4(Request $request)
{
        //die(dd($request));
    $id_pengirim = Auth::user()->id;
    $date = date('Y-m-d H:i:s');

    $insert_uraian_biaya_administrasi = DB::table('uraian_biaya_administrasi')->insertGetId([
        'Unit_organisasi_satker' => $request->unit,
        'alokasi_dana' => intval(preg_replace('/,.*|[^0-9]/', '',$request->alokasi_dana)),
        'Kegiatan' => $request->id_kegiatan,
        'waktu_pelaksanaan' => $request->waktu_pelaksanaan,
        'jenis_pengadaan' => $request->jenis_pengadaan,
        'satuan_ukur' => $request->satuan_ukur,
        'id_uraian_lengkap' => $request->id,
        'kebutuhan_biaya_pengadaan' => $request->kebutuhan_biaya_pengadaan,
        'pagu_anggaran' => $request->pagu_anggaran,
        'biaya_administrasi' => $request->biaya_administrasi,
        'biaya_fisik' => $request->biaya_fisik,
        'status' => 2,
        'id_user' => Auth::user()->id
    ], 'id_uraian_biaya_administrasi');

    $jawaban_renbin = DB::table('master_jawaban_renbin')->where('id_jawaban', $request->id)->update([
        'id_uraian_biaya_administrasi' => $insert_uraian_biaya_administrasi
    ]);
    $number = count($_POST["uraian_keluar"]);
    if ($number > 0) {
        for ($i = 0; $i < $number; $i++) {
            $insert = DB::table('uraian_lengkap_biaya_administrasi')->insert([
                'id_uraian_lengkap' => $insert_uraian_biaya_administrasi,
                'uraian_pekerjaan' => $request->uraian_keluar[$i],
                'jumlah_satuan' => $request->jumlah_keluar[$i],
                'harga_satuan' => $request->harga_satuan_keluar[$i],
                'satuan' => $request->satuan_keluar[$i],
                'status' => 2,
                'jumlah' => $request->jumlah_total_keluar[$i],
            ]);
        }
    }


    $idr= DB::select("select * from master_jawaban_renbin where id_jawaban = '".$request->id."' ");
    foreach ($idr as $idr) {
        $idrenbin = $idr->id_renbin;
    }
    return redirect('/detailrenbut_form5/' . $request->id . '');

}

public function apbn_form5($id)
{

    $kerangka=DB::table('master_jawaban_renbin')->join('kerangka_acuan_kegiatan','kerangka_acuan_kegiatan.id_kerangka_acuan_kegiatan','=','master_jawaban_renbin.id_kerangka_acuan_kegiatan')->where('id_jawaban',$id)->first();
    $program = DB::select(" SELECT id_program,nama_program from master_program");
    $kegiatan = DB::select("select id_kegiatan,nama_kegiatan from master_kegiatan");
    $url = "save_detailrenbut_form5";
    return view('renja.detailrenbut_form5', compact('url', 'id','program','kegiatan','kerangka'));
}

public function store_form5(Request $request)
{
    $id_pengirim = Auth::user()->id;
    $date = date('Y-m-d H:i:s');

    $insert_syarat_teknis = DB::table('syarat_teknis_spesifikasi')->insertGetId([
        'kementrian_negara' => $request->kementerian,
        'unit_organisasi_satker' => $request->unit_organisasi,
        'kegiatan' => $request->kegiatan,
        'keluaran' => $request->keluaran,
        'datil_kegiatan' => $request->detil_kegiatan,
        'volume' => $request->volume,
        'satuan_ukur' => $request->satuan_ukur,
        'alokasi_dana' => intval(preg_replace('/,.*|[^0-9]/', '',$request->alokasi_dana)),
        'id_table_spesifikasi' => $request->id,
        'status' => 2,
        'id_user' => Auth::user()->id
    ], 'id_syarat_teknis');

    $jawaban_renbin = DB::table('master_jawaban_renbin')->where('id_jawaban', $request->id)->update([
        'id_syarat_teknis' => $insert_syarat_teknis
    ]);
    $number = count($_POST["uraian_pekerjaan"]);
    if ($number > 0) {
        for ($i = 0; $i < $number; $i++) {
            $insert = DB::table('table_spesifikasi')->insert([
                'id_table_spesifikasi' => $insert_syarat_teknis,
                'uraian_pekerjaan' => $request->uraian_pekerjaan[$i],
                'spesifikasi' => $request->spesifikasi[$i],
                'status' => 2,
            ]);
        }
    }


    $idr= DB::select("select * from master_jawaban_renbin where id_jawaban = '".$request->id."' ");
    foreach ($idr as $idr) {
        $idrenbin = $idr->id_renbin;
    }
    return redirect('/detailrenbut_form6/' . $request->id . '');
}

public function apbn_form6($id)
{
    $data = DB::select("select * from sakip.master_jawaban_renbin a,sakip.kerangka_acuan_kegiatan b where a.id_kerangka_acuan_kegiatan = b.id_kerangka_acuan_kegiatan and a.id_jawaban = '" . $id . "' ");
    $program = DB::select(" SELECT id_program,nama_program from master_program");
    $kegiatan = DB::select("select id_kegiatan,nama_kegiatan from master_kegiatan");

    $url = "save_detailrenbut_form6";
    return view('renja.detailrenbut_form6', compact('url', 'id','data','program','kegiatan'));
}

public function store_form6(Request $request)
{
    $id_pengirim = Auth::user()->id;
    $date = date('Y-m-d H:i:s');

    $file = $request->file('gambar')->getClientOriginalName();
    $destinationPath = public_path() . "\uploads\\form_gambar\\";
    $request->file('gambar')->move($destinationPath, $file);

    $insert_gambar_denah = DB::table('gambar_denah')->insertGetId([
        'upload_gambar' => $file,
        'kementrian_negara' => $request->kementerian,
        'unit_organisasi_satker' => $request->unit_organisasi,
        'kegiatan' => $request->kegiatan,
        'keluaran' => $request->keluaran,
        'detil_kegiatan' => $request->detil_kegiatan,
        'volume' => $request->volume,
        'satuan_ukur' => $request->satuan_ukur,
        'alokasi_dana' => $request->alokasi_dana,
        'status' => 2,
        'id_user' => Auth::user()->id
    ], 'id_gambar_denah');

    $jawaban_renbin = DB::table('master_jawaban_renbin')->where('id_jawaban', $request->id)->update([
        'id_gambar_denah' => $insert_gambar_denah
    ]);

    $idr= DB::select("select * from master_jawaban_renbin where id_jawaban = '".$request->id."' ");
    foreach ($idr as $idr) {
        $idrenbin = $idr->id_renbin;
    }
    return redirect('/detailrenbut_form7/' . $request->id . '');
}

public function apbn_form7($id)
{
    $url = "save_detailrenbut_form7";
    return view('renja.detailrenbut_form7', compact('url', 'id'));
}

public function store_form7(Request $request)
{
    $id_pengirim = Auth::user()->id;
    $date = date('Y-m-d H:i:s');

    $file = $request->file('gambar')->getClientOriginalName();
    $destinationPath = public_path() . "\uploads\\form_gambar\\";
    $request->file('gambar')->move($destinationPath, $file);


    $insert_bagan_organisasi = DB::table('bagan_organisasi')->insertGetId([
        'upload_bagan_organisasi' => $file,
        'status' => 2,
        'id_user' => Auth::user()->id
    ], 'id_bagan_organisasi');

    $jawaban_renbin = DB::table('master_jawaban_renbin')->where('id_jawaban', $request->id)->update([
        'id_bagan_organisasi' => $insert_bagan_organisasi
    ]);

    $idr= DB::select("select * from master_jawaban_renbin where id_jawaban = '".$request->id."' ");
    foreach ($idr as $idr) {
        $idrenbin = $idr->id_renbin;
    }
    return redirect('/pascarenaku2/' . $idrenbin . '');
}































    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    public function list_ceklist_Apbn($id)
//    {
//        $datalist = DB::select(" SELECT * FROM rencana_kegiatan where id_perencanaan_kegiatan = '" . $id . "'");
//        $rencana = DB::select(" SELECT id_rencana_program_rengiat,rencana_program_rengiat from master_rencana_program_rengiat");
//        $url = Kegiatan::all();
//        return view('rengiat.apbn.listceklistapbn', compact('datalist', 'rencana', 'url'));
//    }
//
//
//    public function apbn_form1($id)
//    {
//        $datalist = DB::select(" SELECT * FROM rencana_kegiatan where id_perencanaan_kegiatan = '" . $id . "'");
//        $url = "save_apbn_form1";
//        return view('rengiat.apbn.apbn_form1', compact('datalist', 'url', 'id'));
//
//    }
//
//    public function store_form1($id)
//    {
//        $save = DB::insert("");
//
//    }
//
//    public function apbn_form2($id)
//    {
//        $url = "save_apbn_form2";
//        return view('rengiat.apbn.apbn_form2', compact('url', 'id'));
//
//    }
//
//    public function store_form2(Request $request)
//    {
//        //die(dd($request));
//
//        $insert_kerangka_acuan_kegiatan = DB::table('kerangka_acuan_kegiatan')->insertGetId([
//            'kementrian_negara_lembaga' => $request->keluaran,
//            'program' => $request->program,
//            'kegiatan' => $request->kegiatan,
//            'indikator_kinerja_kegiatan' => $request->indikator_kinerja,
//            'jenis_keluaran' => $request->jenis_keluaran,
//            'volume_keluaran' => $request->volume_keluaran,
//            'dasar_hukum' => $request->dasar_hukum,
//            'gambaran_umum' => $request->gambaran_umum,
//            'penerimaan_manfaat' => $request->penerimaan_manfaat,
//            'hasil' => $request->hasil,
//            'metode_pelaksanaan' => $request->metode_pelaksanaan,
//            'status' => 2,
//            'waktu_pencapaian_keluaran' => $request->waktu_pencapaian,
//            'biaya_yang_diperlukan' => $request->biaya_diperlukan,
//            'tahap_pelaksanaan' => $request->tahapan_waktu,
//            'id_user' => Auth::user()->id
//        ], 'id_kerangka_acuan_kegiatan');
//
//        $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
//            'id_kerangka_acuan_kegiatan' => $insert_kerangka_acuan_kegiatan
//        ]);
//        $number = count($_POST["uraian_kegiatan"]);
//        if ($number > 0) {
//            for ($i = 0; $i < $number; $i++) {
//                $insert = DB::table('waktu_pelaksanaan')->insert([
//                    'id_waktu_pelaksanaan' => $insert_kerangka_acuan_kegiatan,
//                    'uraian_kegiatan' => $request->uraian_kegiatan[$i],
//                    'jadwal_waktu' => $request->jadwal_waktu[$i],
//                    'status' => 2,
//                ]);
//            }
//        }
//
//        return redirect('/list_ceklist/' . $request->id . '');
//        //return view('rengiat.apbn.apbn_form2');
//
//    }
//
//    public function apbn_form3($id)
//    {
//        $url = "save_apbn_form3";
//        $biaya_administrasi = Uraian_biaya_administrasi::where("id_uraian_lengkap", $id)->first();
////        die(dd($biaya_administrasi));
//        return view('rengiat.apbn.apbn_form3', compact('url', 'id', 'biaya_administrasi'));
//
//    }
//
//    public function store_form3(Request $request)
//    {
//        //die(dd($request));
//
//        $insert_uraian_kegaitan = DB::table('uraian_kegiatan_rincian_biaya')->insertGetId([
//            'kementrian_negara_lembaga' => $request->keluaran,
//            'unit_organisasi_satker' => $request->unit_eselon,
//            'kegiatan' => $request->kegiatan,
//            'keluaran' => $request->kegiatan,
//            'detil_kegiatan' => $request->detil_kegiatan,
//            'volume' => $request->volume,
//            'satuan_ukur' => $request->satuan_ukur,
//            'alokasi_dana' => $request->alokasi_dana,
//            'total_biaya_fisik' => $request->total_biaya_fisik,
//            'total_biaya_administrasi' => $request->total_biaya_administrasi,
//            'Total_keseluruhan' => $request->Total_keseluruhan,
//            'id_rincian_anggaran_biaya' => $request->id,
//            'status' => 2,
//            'id_user' => Auth::user()->id
//        ], 'id_uraian_kegiatan_rincian_biaya');
//
//        $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
//            'id_uraian_kegiatan_rincian_biaya' => $insert_uraian_kegaitan
//        ]);
//        $number = count($_POST["uraian_pekerjaan"]);
//        if ($number > 0) {
//            for ($i = 0; $i < $number; $i++) {
//                $insert = DB::table('rincian_anggaran_biaya')->insert([
//                    'id_rincian_anggaran_biaya' => $insert_uraian_kegaitan,
//                    'uraian_pekerjaan' => $request->uraian_pekerjaan[$i],
//                    'jumlah' => $request->jumlah[$i],
//                    'satuan' => $request->satuan[$i],
//                    'harga_satuan' => $request->harga_satuan[$i],
//                    'harga_jasa' => $request->harga_jasa[$i],
//                    'harga_material' => $request->harga_material[$i],
//                    'harga_jumlah' => $request->jumlah_total[$i],
//                    'status' => 2,
//                ]);
//            }
//        }
//
//        return redirect('/list_ceklist/' . $request->id . '');
//        //return view('rengiat.apbn.apbn_form2');
//
//    }
//
//    public function apbn_form4($id)
//    {
//        $url = "save_apbn_form4";
//        $biaya_fisik = Uraian_kegiatan_rincian_biaya::where("id_rincian_anggaran_biaya", $id)->first();
////        die(dd($biaya_fisik));
//        return view('rengiat.apbn.apbn_form4', compact('url', 'id', 'biaya_fisik'));
//
//    }
//
//    public function store_form4(Request $request)
//    {
//        //die(dd($request));
//
//        $insert_uraian_biaya_administrasi = DB::table('uraian_biaya_administrasi')->insertGetId([
//            'Unit_organisasi_satker' => $request->unit,
//            'alokasi_dana' => $request->alokasi_dana,
//            'Kegiatan' => $request->kegiatan,
//            'waktu_pelaksanaan' => $request->waktu_pelaksanaan,
//            'jenis_pengadaan' => $request->jenis_pengadaan,
//            'satuan_ukur' => $request->satuan_ukur,
//            'id_uraian_lengkap' => $request->id,
//            'kebutuhan_biaya_pengadaan' => $request->kebutuhan_biaya_pengadaan,
//            'pagu_anggaran' => $request->pagu_anggaran,
//            'biaya_administrasi' => $request->biaya_administrasi,
//            'biaya_fisik' => $request->biaya_fisik,
//            'status' => 2,
//            'id_user' => Auth::user()->id
//        ], 'id_uraian_biaya_administrasi');
//
//        $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
//            'id_uraian_biaya_administrasi' => $insert_uraian_biaya_administrasi
//        ]);
//        $number = count($_POST["uraian_keluar"]);
//        if ($number > 0) {
//            for ($i = 0; $i < $number; $i++) {
//                $insert = DB::table('uraian_lengkap_biaya_administrasi')->insert([
//                    'id_uraian_lengkap' => $insert_uraian_biaya_administrasi,
//                    'uraian_pekerjaan' => $request->uraian_keluar[$i],
//                    'jumlah_satuan' => $request->jumlah_keluar[$i],
//                    'harga_satuan' => $request->harga_satuan_keluar[$i],
//                    'satuan' => $request->satuan_keluar[$i],
//                    'status' => 2,
//                    'jumlah' => $request->jumlah_total_keluar[$i],
//                ]);
//            }
//        }
//
//        return redirect('/list_ceklist_Apbn/' . $request->id . '');
//        //return view('rengiat.apbn.apbn_form2');
//
//    }
//
//    public function apbn_form5($id)
//    {
//        $url = "save_apbn_form5";
//        return view('rengiat.apbn.apbn_form5', compact('url', 'id'));
//    }
//
//    public function store_form5(Request $request)
//    {
//
//        $insert_syarat_teknis = DB::table('syarat_teknis_spesifikasi')->insertGetId([
//            'kementrian_negara' => $request->kementerian,
//            'unit_organisasi_satker' => $request->unit_organisasi,
//            'kegiatan' => $request->kegiatan,
//            'keluaran' => $request->keluaran,
//            'datil_kegiatan' => $request->detil_kegiatan,
//            'volume' => $request->volume,
//            'satuan_ukur' => $request->satuan_ukur,
//            'alokasi_dana' => $request->alokasi_dana,
//            'id_table_spesifikasi' => $request->id,
//            'status' => 2,
//            'id_user' => Auth::user()->id
//        ], 'id_syarat_teknis');
//
//        $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
//            'id_syarat_teknis' => $insert_syarat_teknis
//        ]);
//        $number = count($_POST["uraian_pekerjaan"]);
//        if ($number > 0) {
//            for ($i = 0; $i < $number; $i++) {
//                $insert = DB::table('table_spesifikasi')->insert([
//                    'id_table_spesifikasi' => $insert_syarat_teknis,
//                    'uraian_pekerjaan' => $request->uraian_pekerjaan[$i],
//                    'spesifikasi' => $request->spesifikasi[$i],
//                    'status' => 2,
//                ]);
//            }
//        }
//
//        return redirect('/list_ceklist_Apbn/' . $request->id . '');
//    }
//
//    public function apbn_form6($id)
//    {
//        $url = "save_apbn_form6";
//        return view('rengiat.apbn.apbn_form6', compact('url', 'id'));
//    }
//
//    public function store_form6(Request $request)
//    {
//        $file = $request->file('gambar')->getClientOriginalName();
//        $destinationPath = public_path() . "\uploads\\form_gambar\\";
//        $request->file('gambar')->move($destinationPath, $file);
//
//        $insert_gambar_denah = DB::table('gambar_denah')->insertGetId([
//            'upload_gambar' => $file,
//            'kementrian_negara' => $request->kementerian,
//            'unit_organisasi_satker' => $request->unit_organisasi,
//            'kegiatan' => $request->kegiatan,
//            'keluaran' => $request->keluaran,
//            'detil_kegiatan' => $request->detil_kegiatan,
//            'volume' => $request->volume,
//            'satuan_ukur' => $request->satuan_ukur,
//            'alokasi_dana' => $request->alokasi_dana,
//            'status' => 2,
//            'id_user' => Auth::user()->id
//        ], 'id_gambar_denah');
//
//        $insert_gambar_denah = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
//            'id_gambar_denah' => $insert_gambar_denah
//        ]);
//
//        return redirect('/list_ceklist_Apbn/' . $request->id . '');
//        //return view('rengiat.apbn.apbn_form2');
//    }
//
//    public function apbn_form7($id)
//    {
//        $url = "save_apbn_form7";
//        return view('rengiat.apbn.apbn_form7', compact('url', 'id'));
//    }
//
//    public function store_form7(Request $request)
//    {
//        $file = $request->file('gambar')->getClientOriginalName();
//        $destinationPath = public_path() . "\uploads\\form_gambar\\";
//        $request->file('gambar')->move($destinationPath, $file);
//
//
//        $insert_bagan_organisasi = DB::table('bagan_organisasi')->insertGetId([
//            'upload_bagan_organisasi' => $file,
//            'status' => 2,
//            'id_user' => Auth::user()->id
//        ], 'id_bagan_organisasi');
//
//        $insert_gambar_denah = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
//            'id_bagan_organisasi' => $insert_bagan_organisasi
//        ]);
//
//
//        return redirect('/list_ceklist_Apbn/' . $request->id . '');
//    }
//
//    public function apbn_form8($id)
//    {
//        $url = "save_apbn_form8";
//        return view('rengiat.apbn.apbn_form8', compact('url', 'id'));
//    }
//
//    public function store_form8(Request $request)
//    {
//        $file = $request->file('gambar')->getClientOriginalName();
//        $destinationPath = public_path() . "\uploads\\form_gambar\\";
//        $request->file('gambar')->move($destinationPath, $file);
//
//
//        $insert_surat_pernyataan_mutlak = DB::table('surat_pernyataan_mutlak')->insertGetId([
//            'upload_surat_pernyataan' => $file,
//            'yang_bertanggung_jawab' => $request->nama,
//            'Jabatan' => $request->jabatan,
//            'status' => 2,
//            'id_user' => Auth::user()->id
//        ], 'id_surat_pernyataan_mutlak');
//
//        $insert_surat_pernyataan_mutlak = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
//            'id_surat_pernyataan_mutlak' => $insert_surat_pernyataan_mutlak
//        ]);
//
//
//        return redirect('/list_ceklist_Apbn/' . $request->id . '');
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//        $url = "kegiatan_update";
//        $kegiatan = Kegiatan::where('id_kegiatan', $id)->first();
//        $program = Program::all();
//        return view('master.kegiatan.edit', compact('kegiatan', 'url', 'program'));
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request $request
//     * @param  int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request)
//    {
//        //
//
//        $update = Kegiatan::where('id_kegiatan', $request->id_kegiatan)->update(['nama_kegiatan' => $request->nama_kegiatan,
//            'id_program' => $request->id_program, 'keterangan_kegiatan' => $request->keterangan]);
//
//        if ($update) {
//            return redirect('/list_kegiatan');
//        } else {
//            return "gagal";
//        }
//
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//        Kegiatan::destroy($id);
//
//        Session::flash('flash_message', 'Kegiatan deleted!');
//
//        return redirect('/list_kegiatan');
//    }
}
