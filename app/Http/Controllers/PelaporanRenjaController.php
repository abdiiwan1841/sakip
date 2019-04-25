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

class PelaporanRenjaController extends Controller
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
        $apbn = DB::select(" SELECT * from renbin where sumber_anggaran = 'APBN' order by id_renbin desc ");
        $pnbp = DB::select(" SELECT * from renbin where sumber_anggaran = 'PNBP' order by id_renbin desc");
        $noa = 1;
        $nob = 1;
        return view('renjapelaporan.index', compact('apbn','pnbp','noa','nob'));
    }



    public function subkegiatan($id_kegiatan)
    {
        $kegiatan = DB::select(" SELECT * from master_rencana where id_rencana = '".$id_kegiatan."' ");
        foreach ($kegiatan as $key) {
            $parent = $key->parent;
        }

        $subkegiatan = DB::select("SELECT * from master_rencana where keterangan = 'subkegiatan' and parent = '".$parent."'");


        return view('renja.subkegiatan', compact('subkegiatan'));
    }

    public function paskarenaku1($id_renbin)
    {
        //$rencana = DB::select(" SELECT id_rencana_program_rengiat,rencana_program_rengiat,status from master_rencana_program_rengiat where status = '2'");

        //$url = "pnbp_insert";
        return view('renja.hasilpascarenaku1');
    }

    public function prarenaku2()
    {
        //$rencana = DB::select(" SELECT id_rencana_program_rengiat,rencana_program_rengiat,status from master_rencana_program_rengiat where status = '2'");

        //$url = "pnbp_insert";
        return view('renja.prarenaku2');
    }


    public function editrenaku1(Request $request)
    {
        $id_pengirim = Auth::user()->id;

        $countidprog = count($request->id_program);

        $insert = DB::select("update renbin set status='1',keterangan = '".$request->keterangan."' where id_renbin ='".$request->id_renbin."'");

        $cekidrencana = DB::select("SELECT * from renbin where id_renbin = '".$request->id_renbin."' ");
        foreach ($cekidrencana as $value) {
            $id_user_pengirim = $value->id_user_pengirim;
            $kode = $value->kode_rencana_kebutuhan;
        }

        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima)
        values ('".$id_pengirim."','".$request->id_renbin."','RENJA','".$request->keterangan."','0','".$id_user_pengirim."')");


            $getemail = DB::select("SELECT * from users where id = '".$id_user_pengirim."' limit 1 ");
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
             ->setBody('<h2>Pembenaran Pengajuan Rencana Kebutuhan</h2><br><b>No Urut Renbut : '.$kode.'</b><p>berikut pembenaran pengajuan rencana kebutuhan atau silahkan lihat aplikasi untuk mengkonfirmasi.</p><br><p>'.$request->keterangan.'</p>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }


        for ($i=0 ; $i < $countidprog ; $i++)
            {
                if(!empty($request->status[$i])){

                     $masuk = DB::select("update master_jawaban_renbin set status='".$request->status[$i]."' where id_jawaban = '".$request->id_jawaban[$i]."' and id_renbin ='".$request->id_renbin."' and id_program = '".$request->id_program[$i]."' and id_kegiatan='".$request->id_kegiatan[$i]."' and id_sub = '".$request->id_sub[$i]."' ");
                }
                else
                {
                     $masuk2 = DB::select("update master_jawaban_renbin set status='0' where id_jawaban = '".$request->id_jawaban[$i]."' and id_renbin ='".$request->id_renbin."' and id_program = '".$request->id_program[$i]."' and id_kegiatan='".$request->id_kegiatan[$i]."' and id_sub = '".$request->id_sub[$i]."' ");
                }

            }

        return redirect('/pelaporan_renja');
    }

    public function editrenaku2(Request $request)
    {
        $id_pengirim = Auth::user()->id;

        $countidprog = count($request->id_program);
        $countstatus = 0;
        for ($i=0 ; $i < $countidprog ; $i++){
            $countstatus += $request->status[$i];
        }

        if($countidprog == $countstatus){
            for ($i=0 ; $i < $countidprog ; $i++)
            {
                if(!empty($request->status[$i])){

                     $masuk = DB::select("update master_jawaban_renbin set status='".$request->status[$i]."' where id_jawaban = '".$request->id_jawaban[$i]."' and id_renbin ='".$request->id_renbin."' and id_program = '".$request->id_program[$i]."' and id_kegiatan='".$request->id_kegiatan[$i]."' and id_sub = '".$request->id_sub[$i]."' ");
                }

            }

         $insert = DB::select("update renbin set status='3',keterangan = '".$request->keterangan."' where id_renbin ='".$request->id_renbin."'");


        $cekidrencana = DB::select("SELECT * from renbin where id_renbin = '".$request->id_renbin."' ");
        foreach ($cekidrencana as $value) {
            $id_user_pengirim = $value->id_user_pengirim;
            $kode = $value->kode_rencana_kebutuhan;
        }

        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima)
        values ('".$id_pengirim."','".$request->id_renbin."','RENJA','".$request->keterangan."','0','".$id_user_pengirim."')");


            $getemail = DB::select("SELECT * from users where id = '".$id_user_pengirim."' limit 1 ");
            foreach ($getemail as $value) {
                $email = $value->email;
            }

        try{
             $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Lanjutan Pembenaran Pengajuan'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Lanjutan Pembenaran Pengajuan Rencana Kebutuhan</h2><br><b>No Urut Renbut : '.$kode.'</b><p>berikut pembenaran pengajuan rencana kebutuhan atau silahkan lihat aplikasi untuk mengkonfirmasi.</p><br><p>'.$request->keterangan.'</p>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }



        }
        else{
        for ($i=0 ; $i < $countidprog ; $i++)
            {
                if(!empty($request->status[$i])){

                     $masuk = DB::select("update master_jawaban_renbin set status='".$request->status[$i]."' where id_jawaban = '".$request->id_jawaban[$i]."' and id_renbin ='".$request->id_renbin."' and id_program = '".$request->id_program[$i]."' and id_kegiatan='".$request->id_kegiatan[$i]."' and id_sub = '".$request->id_sub[$i]."' ");
                }
                else
                {
                     $masuk2 = DB::select("update master_jawaban_renbin set status='0' where id_jawaban = '".$request->id_jawaban[$i]."' and id_renbin ='".$request->id_renbin."' and id_program = '".$request->id_program[$i]."' and id_kegiatan='".$request->id_kegiatan[$i]."' and id_sub = '".$request->id_sub[$i]."' ");
                }

            }

        $insert = DB::select("update renbin set status='1',keterangan = '".$request->keterangan."' where id_renbin ='".$request->id_renbin."'");

        $cekidrencana = DB::select("SELECT * from renbin where id_renbin = '".$request->id_renbin."' ");
        foreach ($cekidrencana as $value) {
            $id_user_pengirim = $value->id_user_pengirim;
            $kode = $value->kode_rencana_kebutuhan;
        }

        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima)
        values ('".$id_pengirim."','".$request->id_renbin."','RENJA','".$request->keterangan."','0','".$id_user_pengirim."')");


            $getemail = DB::select("SELECT * from users where id = '".$id_user_pengirim."' limit 1 ");
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
             ->setBody('<h2>Pembenaran Pengajuan Rencana Kebutuhan</h2><br><b>No Urut Renbut : '.$kode.'</b><p>berikut pembenaran pengajuan rencana kebutuhan atau silahkan lihat aplikasi untuk mengkonfirmasi.</p><br><p>'.$request->keterangan.'</p>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }

        }


        return redirect('/pelaporan_renja');
    }


    public function editrenaku3(Request $request)
    {
        //die(dd($request));
        $id_pengirim = Auth::user()->id;
        $countidprog = count($request->id_program);

        $countstatus = 0;
        for ($i=0 ; $i < $countidprog ; $i++){
            $countstatus += $request->status[$i];
        }

        if($countidprog == $countstatus){
        for ($i=0 ; $i < $countidprog ; $i++)
            {
                if(!empty($request->status[$i])){

                     $masuk = DB::select("update master_jawaban_renbin set status_='".$request->status[$i]."', feedback='' where id_jawaban = '".$request->id_jawaban[$i]."' and id_renbin ='".$request->id_renbin."' and id_program = '".$request->id_program[$i]."' and id_kegiatan='".$request->id_kegiatan[$i]."' and id_sub = '".$request->id_sub[$i]."' ");
                }

            }

        $insert = DB::select("update renbin set status='5',keterangan='' where id_renbin ='".$request->id_renbin."'");


        $cekidrencana = DB::select("SELECT * from renbin where id_renbin = '".$request->id_renbin."' ");
        foreach ($cekidrencana as $value) {
            $id_user_pengirim = $value->id_user_pengirim;
            $kode = $value->kode_rencana_kebutuhan;
        }


        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima)
        values ('".$id_pengirim."','".$request->id_renbin."','RENJA','renbut diterima','0','".$id_user_pengirim."')");


            $getemail = DB::select("SELECT * from users where id = '".$id_user_pengirim."' limit 1 ");
            foreach ($getemail as $value) {
                $email = $value->email;
            }

        try{
             $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Pengajuan Diterima'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Pengajuan Rencana Kebutuhan Diterima</h2><br><b>No Urut Renbut : '.$kode.'</b><p>penerimaan pengajuan rencana kebutuhan atau silahkan lihat aplikasi untuk mengkonfirmasi.</p><br>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }

        }
        else{
        for ($i=0 ; $i < $countidprog ; $i++)
            {
                if(!empty($request->status[$i])){

                     $masuk = DB::select("update master_jawaban_renbin set status_='".$request->status[$i]."' where id_jawaban = '".$request->id_jawaban[$i]."' and id_renbin ='".$request->id_renbin."' and id_program = '".$request->id_program[$i]."' and id_kegiatan='".$request->id_kegiatan[$i]."' and id_sub = '".$request->id_sub[$i]."' ");
                }
                else
                {
                     $masuk2 = DB::select("update master_jawaban_renbin set status_='0',feedback='".$request->keterangan[$i]."' where id_jawaban = '".$request->id_jawaban[$i]."' and id_renbin ='".$request->id_renbin."' and id_program = '".$request->id_program[$i]."' and id_kegiatan='".$request->id_kegiatan[$i]."' and id_sub = '".$request->id_sub[$i]."' ");
                }

            }

        $insert = DB::select("update renbin set status='3',keterangan='' where id_renbin ='".$request->id_renbin."'");


        $cekidrencana = DB::select("SELECT * from renbin where id_renbin = '".$request->id_renbin."' ");
        foreach ($cekidrencana as $value) {
            $id_user_pengirim = $value->id_user_pengirim;
            $kode = $value->kode_rencana_kebutuhan;
        }


        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima)
        values ('".$id_pengirim."','".$request->id_renbin."','RENJA','renbut butuh perbaikan','0','".$id_user_pengirim."')");


            $getemail = DB::select("SELECT * from users where id = '".$id_user_pengirim."' limit 1 ");
            foreach ($getemail as $value) {
                $email = $value->email;
            }

        try{
             $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Pengajuan Diterima'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Pengajuan Rencana Kebutuhan Butuh Perbaikan</h2><br><b>No Urut Renbut : '.$kode.'</b><p>lakukan perbaikan pengajuan rencana kebutuhan atau silahkan lihat aplikasi untuk mengkonfirmasi.</p><br>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }

        }


        return redirect('/pelaporan_renja');
    }

    public function pelaporanedit($id_renbin)
    {
        $notif = DB::select("delete from notif where id_keterangan ='".$id_renbin."' and keterangan = 'RENJA' ");

        $renbin = DB::select(" SELECT * from renbin where id_renbin = '".$id_renbin."' ");

        $master_jawaban_renbin = DB::select(" SELECT count(id_jawaban), id_program FROM sakip.master_jawaban_renbin where id_renbin = '".$id_renbin."' GROUP BY id_program");

        $tahap = 1;

        return view('renjapelaporan.editrenaku1', compact('renbin','master_jawaban_renbin','id_renbin','tahap'));
    }

    public function pelaporanedit2($id_renbin)
    {
        $notif = DB::select("delete from notif where id_keterangan ='".$id_renbin."' and keterangan = 'RENJA' ");

        $renbin = DB::select(" SELECT * from renbin where id_renbin = '".$id_renbin."' ");

        $master_jawaban_renbin = DB::select(" SELECT count(id_jawaban), id_program FROM sakip.master_jawaban_renbin where id_renbin = '".$id_renbin."' GROUP BY id_program");

        $tahap = 1;

        return view('renjapelaporan.editrenaku2', compact('renbin','master_jawaban_renbin','id_renbin','tahap'));
    }
    public function pelaporanedit3($id_renbin)
    {
        $notif = DB::select("delete from notif where id_keterangan ='".$id_renbin."' and keterangan = 'RENJA' ");


        $renbin = DB::select(" SELECT * from renbin where id_renbin = '".$id_renbin."' ");

        $master_jawaban_renbin = DB::select(" SELECT count(id_jawaban), id_program FROM sakip.master_jawaban_renbin where id_renbin = '".$id_renbin."' GROUP BY id_program");

        $renbin1 = DB::table('master_jawaban_renbin')->where('id_renbin',$id_renbin)->get();

        $no = 1;      

        $tahap = 1;

        // die(dd($kak));

        return view('renjapelaporan.editrenaku3', compact('renbin','master_jawaban_renbin',
        'id_renbin','tahap','no'));

    }

    public function viewpelaporanedit($id_renbin)
    {
        $renbin = DB::select(" SELECT * from renbin where id_renbin = '".$id_renbin."' ");

        $master_jawaban_renbin = DB::select(" SELECT count(id_jawaban), id_program FROM sakip.master_jawaban_renbin where id_renbin = '".$id_renbin."' GROUP BY id_program");

        $tahap = 2;

        return view('renjapelaporan.editrenaku1', compact('renbin','master_jawaban_renbin','id_renbin','tahap'));
    }




}
