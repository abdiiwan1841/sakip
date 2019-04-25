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

class RengiatApbnController extends Controller
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

        $kegiatan = Kegiatan::all();
        $kegiatan_list = Kegiatan::join('master_program', 'master_program.id_program', '=', 'master_kegiatan.id_program')->get();

        // $apbn = DB::select(" select * from renbin join master_jawaban_renbin on renbin.id_renbin = master_jawaban_renbin.id_renbin where renbin.sumber_anggaran = 'APBN' and renbin.status = '5' and master_jawaban_renbin._status is null order by renbin.id_renbin desc ");
        $apbn = DB::table('renbin')
                ->join('master_jawaban_renbin', 'renbin.id_renbin', '=', 'master_jawaban_renbin.id_renbin')
                ->where('renbin.sumber_anggaran', 'APBN')
                ->where('renbin.status', '5')
                ->where('master_jawaban_renbin._status', NULL)
                ->where('renbin.id_user_pengirim', Auth::user()->id)
                ->orderBy('renbin.id_renbin', 'DESC')
                ->get();
        $noa = 1;

        return View('rengiat.apbn.index', compact('kegiatan','apbn','noa', 'kegiatan_list'));

    }

    public function getApbn()
    {
        $pesan = DB::select("SELECT  ROW_NUMBER() OVER (ORDER BY rencana_kegiatan.id_perencanaan_kegiatan DESC) AS Row, rencana_kegiatan.* FROM rencana_kegiatan WHERE status = '2' AND id_user = ".Auth::user()->id." order by rencana_kegiatan.id_perencanaan_kegiatan desc");


        return DataTables::of($pesan)
            ->addColumn('tanggal_rencanaz', function ($pesan) {
                if ($pesan->tanggal_rencana == null || $pesan->tanggal_rencana == "0000-00-00") {
                    $tlt = "00-00-0000";
                } else {
                    $tawal = explode("-", $pesan->tanggal_rencana);

                    $tlt = $tawal[2] . "-" . $tawal[1] . "-" . $tawal[0];
                }
                return $tlt;
            })
            ->addColumn('action', function ($pesan) {
            if(empty($pesan->id_surat_pengantar_kalakgiat) || empty($pesan->id_file_rencana_kegiatan) || empty($pesan->id_kerangka_acuan_kegiatan) || empty($pesan->id_uraian_kegiatan_rincian_biaya) || empty($pesan->id_syarat_teknis) ||empty($pesan->id_uraian_biaya_administrasi) || empty($pesan->id_gambar_denah) ||empty($pesan->id_bagan_organisasi) || empty($pesan->id_surat_pernyataan_mutlak)){
                return '<center>
        <a href="' . url("list_ceklist_Apbn") . '/' . $pesan->id_perencanaan_kegiatan . '" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp
                                <form method="POST" action="http://115.124.73.253/ecatalog_big/public/hapuspesanan/" accept-charset="UTF-8" style="display:inline"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="oOaUxxBxMUBCLEKJOh0VK1ZzPtMUBtIkPjbJM6ay">
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm(&quot;Confirm delete?&quot;)"><span class="glyphicon glyphicon-trash"></span></button>
                                    </form>
                                </center>';
            }
            else{
                if($pesan->status_ == 1){
                    return '<center>
        <a href="' . url("list_ceklist_Apbn") . '/' . $pesan->id_perencanaan_kegiatan . '" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp<a href="' . url("view_pelaporan_rengiat_apbn") . '/' . $pesan->id_perencanaan_kegiatan . '" class="btn btn-sm btn-primary"><span class="fa fa-search"></span></a>
                                <form method="POST" action="http://115.124.73.253/ecatalog_big/public/hapuspesanan/" accept-charset="UTF-8" style="display:inline"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="oOaUxxBxMUBCLEKJOh0VK1ZzPtMUBtIkPjbJM6ay">
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm(&quot;Confirm delete?&quot;)"><span class="glyphicon glyphicon-trash"></span></button>
                                    </form>
                                </center>';
                }
                elseif($pesan->status_ == 3){

                    return '<center>
        <a href="' . url("view_pelaporan_rengiat_apbn") . '/' . $pesan->id_perencanaan_kegiatan . '" class="btn btn-sm btn-primary"><span class="fa fa-search"></span></a>
                                <form method="POST" action="http://115.124.73.253/ecatalog_big/public/hapuspesanan/" accept-charset="UTF-8" style="display:inline"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="oOaUxxBxMUBCLEKJOh0VK1ZzPtMUBtIkPjbJM6ay">
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm(&quot;Confirm delete?&quot;)"><span class="glyphicon glyphicon-trash"></span></button>
                                    </form>
                                </center>';
                }
                else{
                    return '<center>
        <a href="' . url("list_ceklist_Apbn") . '/' . $pesan->id_perencanaan_kegiatan . '" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp<a href="' . url("view_pelaporan_rengiat_apbn") . '/' . $pesan->id_perencanaan_kegiatan . '" class="btn btn-sm btn-primary"><span class="fa fa-search"></span></a>
                                <form method="POST" action="http://115.124.73.253/ecatalog_big/public/hapuspesanan/" accept-charset="UTF-8" style="display:inline"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="oOaUxxBxMUBCLEKJOh0VK1ZzPtMUBtIkPjbJM6ay">
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm(&quot;Confirm delete?&quot;)"><span class="glyphicon glyphicon-trash"></span></button>
                                    </form>
                                </center>';
                }
                
            }
                
            })
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rencana = DB::select("select id_program,nama_program,status from sakip.master_program");
        $akun = DB::select("select * from sakip.master_akun");
        $url = "apbn_insert";
        return View('rengiat.apbn.form', compact('rencana', 'url','akun'));
    }

    public function createid($id_renbin_detail)
    {
        $rencana = DB::select("SELECT id_program,nama_program,status from sakip.master_program where status = '2'");
        $akun = DB::select("select * from sakip.master_akun");
        $url = "apbn_insert_id";
        $jawaban_renbin = DB::select("select * from sakip.master_jawaban_renbin where id_jawaban ='".$id_renbin_detail."'");
        foreach ($jawaban_renbin as $valuejr) {
            $detail_kegiatan = $valuejr->detail_kegiatan;
            $id_program = $valuejr->id_program;
            $id_kegiatan = $valuejr->id_kegiatan;
            $id_sub = $valuejr->id_sub;
        }

        return View('rengiat.apbn.form', compact('detail_kegiatan','id_program','id_kegiatan','id_sub','id_renbin_detail','rencana', 'url','akun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_pengirim = Auth::user()->id;
        $date = date('Y-m-d H:i:s'); //waktu nya belom ditambah 7

        $tglz = explode("-", $request->tglren);
        $tglfix = $tglz[2] . "-" . $tglz[1] . "-" . $tglz[0];
        $user_id = Auth::user()->id;
        $insert = DB::table('rencana_kegiatan')->insert([
            'id_sumber_alokasi_dana' => '2',
            'id_kegiatan' => $request->id_kegiatan,
            'keluaran' => $request->keluaran,
            'detail_kegiatan' => $request->detail_kegiatan,
            'tanggal_rencana' => $tglfix,
            'alokasi_anggaran' => intval(preg_replace('/,.*|[^0-9]/', '',$request->alokasi_anggaran)),
            'alokasi_anggaran_fisik' => intval(preg_replace('/,.*|[^0-9]/', '',$request->alokasi_anggaran_fisik)),
            'alokasi_anggaran_biaya_administrasi' => intval(preg_replace('/,.*|[^0-9]/', '',$request->alokasi_anggaran_biaya_administrasi)),
            'status' => 2,
            'id_user' => $user_id,
            'akun' => $request->akun,
            'penyaluran_anggaran' => $request->penyalurananggaran,
            'update_at' => $date,
            'id_program' => $request->id_program
        ]);

        
//        $insertrencana = DB::select
//        ("insert into rencana_kegiatan (id_sumber_alokasi_dana,id_rencana_program_rengiat,nama_perencanaan_kegiatan,keluaran,detail_kegiatan,tanggal_rencana,alokasi_anggaran_fisik,alokasi_anggaran_biaya_administrasi, status,id_user )
//		values ('2','" . $request->id_rencana_program_rengiat . "','" . $request->nama_perencanaan_kegiatan . "','" . $request->keluaran . "','" . $request->detail_kegiatan . "'
//		,'" . $tglfix . "','" . $request->alokasi_anggaran_fisik . "','" . $request->alokasi_anggaran_biaya_administrasi . "','2',$user_id)");

        $liz = DB::select("SELECT MAX(id_perencanaan_kegiatan) as maxid from rencana_kegiatan");
        foreach ($liz as $list) {
            $maxid = $list->maxid;
        }

        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima) 
        values ('".$id_pengirim."','".$maxid."','RENGIAT','pengajuan rencana kegiatan','0','1')");

        $getemail = DB::select("SELECT * from users where id_jenis_user = '1' limit 1 ");
            foreach ($getemail as $value) {
                $email = $value->email;
                $name = $value->name;
            }

        try{
             $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Pengajuan RENGIAT Baru'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Pengajuan Rencana Kegiatan baru</h2><br><b>Oleh : '.$name.'</b><p>Diterima pengajuan rencana kegiatan baru silahkan lihat aplikasi untuk aksi lebih lanjut.</p>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }

        return redirect('/list_ceklist_Apbn/' . $maxid);
    }

     public function storeid(Request $request)
    {
        $id_pengirim = Auth::user()->id;
        $date = date('Y-m-d H:i:s'); //waktu nya belom ditambah 7

        $master_jawaban_renbin = DB::select("select * from master_jawaban_renbin where id_jawaban = '".$request->id_renbin_detail."'");
        foreach ($master_jawaban_renbin as $key) {
            $id_kerangka_acuan_kegiatan = $key->id_kerangka_acuan_kegiatan;
            $id_uraian_kegiatan_rincian_biaya = $key->id_uraian_kegiatan_rincian_biaya;
            $id_uraian_biaya_administrasi = $key->id_uraian_biaya_administrasi;
            $id_syarat_teknis = $key->id_syarat_teknis;
            $id_gambar_denah = $key->id_gambar_denah;
            $id_bagan_organisasi = $key->id_bagan_organisasi;
        }

        $master_jawaban_renbin = DB::select("update master_jawaban_renbin set _status='1' where id_jawaban = '".$request->id_renbin_detail."'");

        $tglz = explode("-", $request->tglren);
        $tglfix = $tglz[2] . "-" . $tglz[1] . "-" . $tglz[0];
        $user_id = Auth::user()->id;
        $insert = DB::table('rencana_kegiatan')->insert([
            'id_sumber_alokasi_dana' => '2',
            'id_kegiatan' => $request->id_kegiatan,
            'keluaran' => $request->keluaran,
            'detail_kegiatan' => $request->detail_kegiatan,
            'tanggal_rencana' => $tglfix,
            'alokasi_anggaran' => intval(preg_replace('/,.*|[^0-9]/', '',$request->alokasi_anggaran)),
            'alokasi_anggaran_fisik' => intval(preg_replace('/,.*|[^0-9]/', '',$request->alokasi_anggaran_fisik)),
            'alokasi_anggaran_biaya_administrasi' => intval(preg_replace('/,.*|[^0-9]/', '',$request->alokasi_anggaran_biaya_administrasi)),
            'status' => 2,
            'id_user' => $user_id,
            'akun' => $request->akun,
            'penyaluran_anggaran' => $request->penyalurananggaran,
            'update_at' => $date,
            'id_program' => $request->id_program,
            'id_kerangka_acuan_kegiatan' => $id_kerangka_acuan_kegiatan,
            'id_uraian_kegiatan_rincian_biaya' => $id_uraian_kegiatan_rincian_biaya,
            'id_uraian_biaya_administrasi' => $id_uraian_biaya_administrasi,
            'id_syarat_teknis' => $id_syarat_teknis,
            'id_gambar_denah' => $id_gambar_denah,
            'id_bagan_organisasi' => $id_bagan_organisasi
        ]);


        $liz = DB::select("SELECT MAX(id_perencanaan_kegiatan) as maxid from rencana_kegiatan");
        foreach ($liz as $list) {
            $maxid = $list->maxid;
        }

        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima) 
        values ('".$id_pengirim."','".$maxid."','RENGIAT','pengajuan rencana kegiatan','0','1')");

        $getemail = DB::select("SELECT * from users where id_jenis_user = '1' limit 1 ");
            foreach ($getemail as $value) {
                $email = $value->email;
                $name = $value->name;
            }

        try{
             $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Pengajuan RENGIAT Baru'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Pengajuan Rencana Kegiatan baru</h2><br><b>Oleh : '.$name.'</b><p>Diterima pengajuan rencana kegiatan baru silahkan lihat aplikasi untuk aksi lebih lanjut.</p>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }

        return redirect('/list_ceklist_Apbn/' . $maxid);
    }

    public function list_ceklist_Apbn($id)
    {
        $id_pengirim = Auth::user()->id;
        $notif = DB::select("delete from notif where id_keterangan ='".$id."' and id_penerima = '".$id_pengirim."' and keterangan = 'RENGIAT' ");

        $datalist = DB::select(" SELECT * FROM rencana_kegiatan where id_perencanaan_kegiatan = '" . $id . "'");
        $rencana = DB::select(" SELECT id_program,nama_program from master_program");
        $kegiatan = DB::select("select id_kegiatan,nama_kegiatan from master_kegiatan");
        $url = Kegiatan::all();
        return view('rengiat.apbn.listceklistapbn', compact('datalist', 'rencana', 'url','kegiatan'));
    }


    public function apbn_form1($id)
    {
        $id_rengiat = $id;
        $getid = DB :: select("select id_kalakgiat from kalakgiat order by id_kalakgiat desc limit 1");
                    if(!empty($getid)){
                            foreach($getid as $list){
                                $id = $list->id_kalakgiat;
                                $id_kalakgiat = $id+1;
                            }
                    }
                    else{
                            $id_kalakgiat = 1;
                    }

        $kode = "R/".$id_kalakgiat."/".date('d')."".date('m')."/".date('Y');

        $datalist = DB::select(" SELECT * FROM rencana_kegiatan where id_perencanaan_kegiatan = '" . $id . "'");
        $url = "save_apbn_form1";
        return view('rengiat.apbn.apbn_form1', compact('datalist', 'url', 'id_rengiat','kode'));

    }

    public function store_form1(Request $request)
    {
        $id_pengirim = Auth::user()->id;
        $date = date('Y-m-d H:i:s');

        $insert_kalakgiat = DB::table('kalakgiat')->insertGetId([
            'nomor_kalakgiat' => $request->nomor,
            'klasifikasi' => $request->klasifikasi,
            'lampiran' => $request->lampiran,
            'perihal' => $request->perihal,
            'kepada' => $request->kepada,
            'isi' => $request->isi,
        ], 'id_kalakgiat');

        $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
            'id_surat_pengantar_kalakgiat' => $insert_kalakgiat,
            'update_at' => $date
        ]);

        $number = count($_POST["tembusan"]);
        if ($number > 0) {
            for ($i = 0; $i < $number; $i++) {
                $insert = DB::table('tembusan_kalakgiat')->insert([
                    'id_kalakgiat' => $insert_kalakgiat,
                    'kepada' => $request->tembusan[$i],
                ]);
            }
        }

        $rengiat = DB::select("SELECT * from rencana_kegiatan where id_perencanaan_kegiatan = '".$request->id."'");
                                                foreach($rengiat as $listg)
                                                  {
                                                    $id_surat_pengantar_kalakgiat = $listg->id_surat_pengantar_kalakgiat;
                                                    $id_file_rencana_kegiatan = $listg->id_file_rencana_kegiatan;    
                                                    $id_kerangka_acuan_kegiatan = $listg->id_kerangka_acuan_kegiatan;
                                                    $id_uraian_kegiatan_rincian_biaya = $listg->id_uraian_kegiatan_rincian_biaya;
                                                    $id_syarat_teknis = $listg->id_syarat_teknis;
                                                    $id_uraian_biaya_administrasi = $listg->id_uraian_biaya_administrasi;
                                                    $id_gambar_denah = $listg->id_gambar_denah;
                                                    $id_bagan_organisasi = $listg->id_bagan_organisasi;
                                                    $id_surat_pernyataan_mutlak = $listg->id_surat_pernyataan_mutlak;
                                                    $keluaran = $listg->keluaran;
                                                  }

        if(empty($id_surat_pengantar_kalakgiat) || empty($id_file_rencana_kegiatan) || empty($id_kerangka_acuan_kegiatan) || empty($id_uraian_kegiatan_rincian_biaya) || empty($id_syarat_teknis) ||empty($id_uraian_biaya_administrasi) || empty($id_gambar_denah) ||empty($id_bagan_organisasi) || empty($id_surat_pernyataan_mutlak)){


        }
        else{
        $datalist = DB::select(" SELECT * FROM rencana_kegiatan where id_perencanaan_kegiatan = '" . $request->id . "'");
        foreach ($datalist as $key) {
            $status = $key->status_;
        }
        if($status == 1)
        {
            $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
                'status_' => 2
            ]);
        }

        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima) 
        values ('".$id_pengirim."','".$request->id."','RENGIAT','pengajuan rencana kegiatan','0','1')");

            $getemail = DB::select("SELECT * from users where id_jenis_user = '1' limit 1 ");
            foreach ($getemail as $value) {
                $email = $value->email;
                $name = $value->name;
            }

        try{
             $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Data RENGIAT Telah Lengkap'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Data Pengajuan Rencana Kegiatan telah lengkap</h2><br><b>Oleh : '.$name.'</b><br><b>Keluaran : '.$keluaran.'</b><p>Diterima data lengkap pengajuan rencana kegiatan silahkan lihat aplikasi untuk aksi lebih lanjut.</p>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }
        }



        return redirect('/list_ceklist_Apbn/' . $request->id . '');

    }

    public function apbn_form2($id)
    {
        $datalist = DB::select(" SELECT * FROM rencana_kegiatan where id_perencanaan_kegiatan = '" . $id . "'");
        $rencana = DB::select(" SELECT id_program,nama_program from master_program");
        $kegiatan = DB::select("select id_kegiatan,nama_kegiatan from master_kegiatan");

        $url = "save_apbn_form2";
        return view('rengiat.apbn.apbn_form2', compact('url', 'id','datalist','rencana','kegiatan'));
    }

    public function store_form2(Request $request)
    {
        //die(dd($request));
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

        $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
            'id_kerangka_acuan_kegiatan' => $insert_kerangka_acuan_kegiatan,
            'update_at' => $date
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

        $rengiat = DB::select("SELECT * from rencana_kegiatan where id_perencanaan_kegiatan = '".$request->id."'");
                                                foreach($rengiat as $listg)
                                                  {
                                                    $id_surat_pengantar_kalakgiat = $listg->id_surat_pengantar_kalakgiat;
                                                    $id_file_rencana_kegiatan = $listg->id_file_rencana_kegiatan;    
                                                    $id_kerangka_acuan_kegiatan = $listg->id_kerangka_acuan_kegiatan;
                                                    $id_uraian_kegiatan_rincian_biaya = $listg->id_uraian_kegiatan_rincian_biaya;
                                                    $id_syarat_teknis = $listg->id_syarat_teknis;
                                                    $id_uraian_biaya_administrasi = $listg->id_uraian_biaya_administrasi;
                                                    $id_gambar_denah = $listg->id_gambar_denah;
                                                    $id_bagan_organisasi = $listg->id_bagan_organisasi;
                                                    $id_surat_pernyataan_mutlak = $listg->id_surat_pernyataan_mutlak;
                                                    $keluaran = $listg->keluaran;
                                                  }

        if(empty($id_surat_pengantar_kalakgiat) || empty($id_file_rencana_kegiatan) || empty($id_kerangka_acuan_kegiatan) || empty($id_uraian_kegiatan_rincian_biaya) || empty($id_syarat_teknis) ||empty($id_uraian_biaya_administrasi) || empty($id_gambar_denah) ||empty($id_bagan_organisasi) || empty($id_surat_pernyataan_mutlak)){


        }
        else{
        $datalist = DB::select(" SELECT * FROM rencana_kegiatan where id_perencanaan_kegiatan = '" . $request->id . "'");
        foreach ($datalist as $key) {
            $status = $key->status_;
        }
        if($status == 1)
        {
            $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
                'status_' => 2
            ]);
        }

        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima) 
        values ('".$id_pengirim."','".$request->id."','RENGIAT','pengajuan rencana kegiatan','0','1')");

            $getemail = DB::select("SELECT * from users where id_jenis_user = '1' limit 1 ");
            foreach ($getemail as $value) {
                $email = $value->email;
                $name = $value->name;
            }

        try{
             $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Data RENGIAT Telah Lengkap'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Data Pengajuan Rencana Kegiatan telah lengkap</h2><br><b>Oleh : '.$name.'</b><br><b>Keluaran : '.$keluaran.'</b><p>Diterima data lengkap pengajuan rencana kegiatan silahkan lihat aplikasi untuk aksi lebih lanjut.</p>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }
        }

        return redirect('/list_ceklist_Apbn/' . $request->id . '');
        //return view('rengiat.apbn.apbn_form2');

    }

    public function apbn_form3($id)
    {

        $data = DB::select("select * from sakip.rencana_kegiatan a,sakip.kerangka_acuan_kegiatan b where a.id_kerangka_acuan_kegiatan = b.id_kerangka_acuan_kegiatan and a.id_perencanaan_kegiatan = '" . $id . "' ");
        $program = DB::select(" SELECT id_program,nama_program from master_program");
        $kegiatan = DB::select("select id_kegiatan,nama_kegiatan from master_kegiatan");
        $url = "save_apbn_form3";
        $biaya_administrasi = Uraian_biaya_administrasi::where("id_uraian_lengkap", $id)->first();
//        die(dd($biaya_administrasi));
        return view('rengiat.apbn.apbn_form3', compact('url', 'id', 'biaya_administrasi','data','program','kegiatan'));

    }

    public function store_form3(Request $request)
    {
        //die(dd($request));
         $id_pengirim = Auth::user()->id;
        $date = date('Y-m-d H:i:s');

        $insert_uraian_kegaitan = DB::table('uraian_kegiatan_rincian_biaya')->insertGetId([
            'kementrian_negara_lembaga' => $request->kementerian,
            //'unit_organisasi_satker' => $request->unit_eselon,
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

        $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
            'id_uraian_kegiatan_rincian_biaya' => $insert_uraian_kegaitan,
            'update_at' => $date
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

        $rengiat = DB::select("SELECT * from rencana_kegiatan where id_perencanaan_kegiatan = '".$request->id."'");
                                                foreach($rengiat as $listg)
                                                  {
                                                    $id_surat_pengantar_kalakgiat = $listg->id_surat_pengantar_kalakgiat;
                                                    $id_file_rencana_kegiatan = $listg->id_file_rencana_kegiatan;    
                                                    $id_kerangka_acuan_kegiatan = $listg->id_kerangka_acuan_kegiatan;
                                                    $id_uraian_kegiatan_rincian_biaya = $listg->id_uraian_kegiatan_rincian_biaya;
                                                    $id_syarat_teknis = $listg->id_syarat_teknis;
                                                    $id_uraian_biaya_administrasi = $listg->id_uraian_biaya_administrasi;
                                                    $id_gambar_denah = $listg->id_gambar_denah;
                                                    $id_bagan_organisasi = $listg->id_bagan_organisasi;
                                                    $id_surat_pernyataan_mutlak = $listg->id_surat_pernyataan_mutlak;
                                                    $keluaran = $listg->keluaran;
                                                  }

        if(empty($id_surat_pengantar_kalakgiat) || empty($id_file_rencana_kegiatan) || empty($id_kerangka_acuan_kegiatan) || empty($id_uraian_kegiatan_rincian_biaya) || empty($id_syarat_teknis) ||empty($id_uraian_biaya_administrasi) || empty($id_gambar_denah) ||empty($id_bagan_organisasi) || empty($id_surat_pernyataan_mutlak)){


        }
        else{

            $datalist = DB::select(" SELECT * FROM rencana_kegiatan where id_perencanaan_kegiatan = '" . $request->id . "'");
        foreach ($datalist as $key) {
            $status = $key->status_;
        }
        if($status == 1)
        {
            $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
                'status_' => 2
            ]);
        }

        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima) 
        values ('".$id_pengirim."','".$request->id."','RENGIAT','pengajuan rencana kegiatan','0','1')");

            $getemail = DB::select("SELECT * from users where id_jenis_user = '1' limit 1 ");
            foreach ($getemail as $value) {
                $email = $value->email;
                $name = $value->name;
            }

        try{
             $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Data RENGIAT Telah Lengkap'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Data Pengajuan Rencana Kegiatan telah lengkap</h2><br><b>Oleh : '.$name.'</b><br><b>Keluaran : '.$keluaran.'</b><p>Diterima data lengkap pengajuan rencana kegiatan silahkan lihat aplikasi untuk aksi lebih lanjut.</p>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }
        }



        return redirect('/list_ceklist_Apbn/' . $request->id . '');
        //return view('rengiat.apbn.apbn_form2');

    }

    public function apbn_form4($id)
    {
        $data = DB::select("select * from sakip.rencana_kegiatan a,sakip.kerangka_acuan_kegiatan b where a.id_kerangka_acuan_kegiatan = b.id_kerangka_acuan_kegiatan and a.id_perencanaan_kegiatan = '" . $id . "' ");
        $program = DB::select(" SELECT id_program,nama_program from master_program");
        $kegiatan = DB::select("select id_kegiatan,nama_kegiatan from master_kegiatan");
        $url = "save_apbn_form4";
        $biaya_fisik = Uraian_kegiatan_rincian_biaya::where("id_rincian_anggaran_biaya", $id)->first();
//        die(dd($biaya_fisik));
        return view('rengiat.apbn.apbn_form4', compact('url', 'id', 'biaya_fisik','data','program','kegiatan'));

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

        $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
            'id_uraian_biaya_administrasi' => $insert_uraian_biaya_administrasi,
            'update_at' => $date
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

        $rengiat = DB::select("SELECT * from rencana_kegiatan where id_perencanaan_kegiatan = '".$request->id."'");
                                                foreach($rengiat as $listg)
                                                  {
                                                    $id_surat_pengantar_kalakgiat = $listg->id_surat_pengantar_kalakgiat;
                                                    $id_file_rencana_kegiatan = $listg->id_file_rencana_kegiatan;    
                                                    $id_kerangka_acuan_kegiatan = $listg->id_kerangka_acuan_kegiatan;
                                                    $id_uraian_kegiatan_rincian_biaya = $listg->id_uraian_kegiatan_rincian_biaya;
                                                    $id_syarat_teknis = $listg->id_syarat_teknis;
                                                    $id_uraian_biaya_administrasi = $listg->id_uraian_biaya_administrasi;
                                                    $id_gambar_denah = $listg->id_gambar_denah;
                                                    $id_bagan_organisasi = $listg->id_bagan_organisasi;
                                                    $id_surat_pernyataan_mutlak = $listg->id_surat_pernyataan_mutlak;
                                                    $keluaran = $listg->keluaran;
                                                  }

        if(empty($id_surat_pengantar_kalakgiat) || empty($id_file_rencana_kegiatan) || empty($id_kerangka_acuan_kegiatan) || empty($id_uraian_kegiatan_rincian_biaya) || empty($id_syarat_teknis) ||empty($id_uraian_biaya_administrasi) || empty($id_gambar_denah) ||empty($id_bagan_organisasi) || empty($id_surat_pernyataan_mutlak)){


        }
        else{
        $datalist = DB::select(" SELECT * FROM rencana_kegiatan where id_perencanaan_kegiatan = '" . $request->id . "'");
        foreach ($datalist as $key) {
            $status = $key->status_;
        }
        if($status == 1)
        {
            $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
                'status_' => 2
            ]);
        }

        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima) 
        values ('".$id_pengirim."','".$request->id."','RENGIAT','pengajuan rencana kegiatan','0','1')");

            $getemail = DB::select("SELECT * from users where id_jenis_user = '1' limit 1 ");
            foreach ($getemail as $value) {
                $email = $value->email;
                $name = $value->name;
            }

        try{
             $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Data RENGIAT Telah Lengkap'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Data Pengajuan Rencana Kegiatan telah lengkap</h2><br><b>Oleh : '.$name.'</b><br><b>Keluaran : '.$keluaran.'</b><p>Diterima data lengkap pengajuan rencana kegiatan silahkan lihat aplikasi untuk aksi lebih lanjut.</p>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }
        }

        return redirect('/list_ceklist_Apbn/' . $request->id . '');
        //return view('rengiat.apbn.apbn_form2');

    }

    public function apbn_form5($id)
    {
        $data = DB::select("select * from sakip.rencana_kegiatan a,sakip.kerangka_acuan_kegiatan b where a.id_kerangka_acuan_kegiatan = b.id_kerangka_acuan_kegiatan and a.id_perencanaan_kegiatan = '" . $id . "' ");
        $program = DB::select(" SELECT id_program,nama_program from master_program");
        $kegiatan = DB::select("select id_kegiatan,nama_kegiatan from master_kegiatan");
        $url = "save_apbn_form5";
        return view('rengiat.apbn.apbn_form5', compact('url', 'id','data','program','kegiatan'));
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

        $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
            'id_syarat_teknis' => $insert_syarat_teknis,
            'update_at' => $date
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



        $rengiat = DB::select("SELECT * from rencana_kegiatan where id_perencanaan_kegiatan = '".$request->id."'");
                                                foreach($rengiat as $listg)
                                                  {
                                                    $id_surat_pengantar_kalakgiat = $listg->id_surat_pengantar_kalakgiat;
                                                    $id_file_rencana_kegiatan = $listg->id_file_rencana_kegiatan;    
                                                    $id_kerangka_acuan_kegiatan = $listg->id_kerangka_acuan_kegiatan;
                                                    $id_uraian_kegiatan_rincian_biaya = $listg->id_uraian_kegiatan_rincian_biaya;
                                                    $id_syarat_teknis = $listg->id_syarat_teknis;
                                                    $id_uraian_biaya_administrasi = $listg->id_uraian_biaya_administrasi;
                                                    $id_gambar_denah = $listg->id_gambar_denah;
                                                    $id_bagan_organisasi = $listg->id_bagan_organisasi;
                                                    $id_surat_pernyataan_mutlak = $listg->id_surat_pernyataan_mutlak;
                                                    $keluaran = $listg->keluaran;
                                                  }

        if(empty($id_surat_pengantar_kalakgiat) || empty($id_file_rencana_kegiatan) || empty($id_kerangka_acuan_kegiatan) || empty($id_uraian_kegiatan_rincian_biaya) || empty($id_syarat_teknis) ||empty($id_uraian_biaya_administrasi) || empty($id_gambar_denah) ||empty($id_bagan_organisasi) || empty($id_surat_pernyataan_mutlak)){


        }
        else{

        $datalist = DB::select(" SELECT * FROM rencana_kegiatan where id_perencanaan_kegiatan = '" . $request->id . "'");
        foreach ($datalist as $key) {
            $status = $key->status_;
        }
        if($status == 1)
        {
            $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
                'status_' => 2
            ]);
        }

        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima) 
        values ('".$id_pengirim."','".$request->id."','RENGIAT','pengajuan rencana kegiatan','0','1')");

            $getemail = DB::select("SELECT * from users where id_jenis_user = '1' limit 1 ");
            foreach ($getemail as $value) {
                $email = $value->email;
                $name = $value->name;
            }

        try{
             $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Data RENGIAT Telah Lengkap'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Data Pengajuan Rencana Kegiatan telah lengkap</h2><br><b>Oleh : '.$name.'</b><br><b>Keluaran : '.$keluaran.'</b><p>Diterima data lengkap pengajuan rencana kegiatan silahkan lihat aplikasi untuk aksi lebih lanjut.</p>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }
        }

        return redirect('/list_ceklist_Apbn/' . $request->id . '');
    }

    public function apbn_form6($id)
    {
        $data = DB::select("select * from sakip.rencana_kegiatan a,sakip.kerangka_acuan_kegiatan b where a.id_kerangka_acuan_kegiatan = b.id_kerangka_acuan_kegiatan and a.id_perencanaan_kegiatan = '" . $id . "' ");
        $program = DB::select(" SELECT id_program,nama_program from master_program");
        $kegiatan = DB::select("select id_kegiatan,nama_kegiatan from master_kegiatan");

        $url = "save_apbn_form6";
        return view('rengiat.apbn.apbn_form6', compact('url', 'id','data','program','kegiatan'));
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

        $insert_gambar_denah = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
            'id_gambar_denah' => $insert_gambar_denah,
            'update_at' => $date
        ]);

        $rengiat = DB::select("SELECT * from rencana_kegiatan where id_perencanaan_kegiatan = '".$request->id."'");
                                                foreach($rengiat as $listg)
                                                  {
                                                    $id_surat_pengantar_kalakgiat = $listg->id_surat_pengantar_kalakgiat;
                                                    $id_file_rencana_kegiatan = $listg->id_file_rencana_kegiatan;    
                                                    $id_kerangka_acuan_kegiatan = $listg->id_kerangka_acuan_kegiatan;
                                                    $id_uraian_kegiatan_rincian_biaya = $listg->id_uraian_kegiatan_rincian_biaya;
                                                    $id_syarat_teknis = $listg->id_syarat_teknis;
                                                    $id_uraian_biaya_administrasi = $listg->id_uraian_biaya_administrasi;
                                                    $id_gambar_denah = $listg->id_gambar_denah;
                                                    $id_bagan_organisasi = $listg->id_bagan_organisasi;
                                                    $id_surat_pernyataan_mutlak = $listg->id_surat_pernyataan_mutlak;
                                                    $keluaran = $listg->keluaran;
                                                  }

        if(empty($id_surat_pengantar_kalakgiat) || empty($id_file_rencana_kegiatan) || empty($id_kerangka_acuan_kegiatan) || empty($id_uraian_kegiatan_rincian_biaya) || empty($id_syarat_teknis) ||empty($id_uraian_biaya_administrasi) || empty($id_gambar_denah) ||empty($id_bagan_organisasi) || empty($id_surat_pernyataan_mutlak)){


        }
        else{
        $datalist = DB::select(" SELECT * FROM rencana_kegiatan where id_perencanaan_kegiatan = '" . $request->id . "'");
        foreach ($datalist as $key) {
            $status = $key->status_;
        }
        if($status == 1)
        {
            $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
                'status_' => 2
            ]);
        }

        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima) 
        values ('".$id_pengirim."','".$request->id."','RENGIAT','pengajuan rencana kegiatan','0','1')");

            $getemail = DB::select("SELECT * from users where id_jenis_user = '1' limit 1 ");
            foreach ($getemail as $value) {
                $email = $value->email;
                $name = $value->name;
            }

        try{
             $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Data RENGIAT Telah Lengkap'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Data Pengajuan Rencana Kegiatan telah lengkap</h2><br><b>Oleh : '.$name.'</b><br><b>Keluaran : '.$keluaran.'</b><p>Diterima data lengkap pengajuan rencana kegiatan silahkan lihat aplikasi untuk aksi lebih lanjut.</p>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }
        }

        return redirect('/list_ceklist_Apbn/' . $request->id . '');
        //return view('rengiat.apbn.apbn_form2');
    }

    public function apbn_form7($id)
    {
        $url = "save_apbn_form7";
        return view('rengiat.apbn.apbn_form7', compact('url', 'id'));
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

        $insert_gambar_denah = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
            'id_bagan_organisasi' => $insert_bagan_organisasi,
            'update_at' => $date
        ]);

        $rengiat = DB::select("SELECT * from rencana_kegiatan where id_perencanaan_kegiatan = '".$request->id."'");
                                                foreach($rengiat as $listg)
                                                  {
                                                    $id_surat_pengantar_kalakgiat = $listg->id_surat_pengantar_kalakgiat;
                                                    $id_file_rencana_kegiatan = $listg->id_file_rencana_kegiatan;    
                                                    $id_kerangka_acuan_kegiatan = $listg->id_kerangka_acuan_kegiatan;
                                                    $id_uraian_kegiatan_rincian_biaya = $listg->id_uraian_kegiatan_rincian_biaya;
                                                    $id_syarat_teknis = $listg->id_syarat_teknis;
                                                    $id_uraian_biaya_administrasi = $listg->id_uraian_biaya_administrasi;
                                                    $id_gambar_denah = $listg->id_gambar_denah;
                                                    $id_bagan_organisasi = $listg->id_bagan_organisasi;
                                                    $id_surat_pernyataan_mutlak = $listg->id_surat_pernyataan_mutlak;
                                                    $keluaran = $listg->keluaran;
                                                  }

        if(empty($id_surat_pengantar_kalakgiat) || empty($id_file_rencana_kegiatan) || empty($id_kerangka_acuan_kegiatan) || empty($id_uraian_kegiatan_rincian_biaya) || empty($id_syarat_teknis) ||empty($id_uraian_biaya_administrasi) || empty($id_gambar_denah) ||empty($id_bagan_organisasi) || empty($id_surat_pernyataan_mutlak)){


        }
        else{
        $datalist = DB::select(" SELECT * FROM rencana_kegiatan where id_perencanaan_kegiatan = '" . $request->id . "'");
        foreach ($datalist as $key) {
            $status = $key->status_;
        }
        if($status == 1)
        {
            $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
                'status_' => 2
            ]);
        }

        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima) 
        values ('".$id_pengirim."','".$request->id."','RENGIAT','pengajuan rencana kegiatan','0','1')");

            $getemail = DB::select("SELECT * from users where id_jenis_user = '1' limit 1 ");
            foreach ($getemail as $value) {
                $email = $value->email;
                $name = $value->name;
            }

        try{
             $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Data RENGIAT Telah Lengkap'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Data Pengajuan Rencana Kegiatan telah lengkap</h2><br><b>Oleh : '.$name.'</b><br><b>Keluaran : '.$keluaran.'</b><p>Diterima data lengkap pengajuan rencana kegiatan silahkan lihat aplikasi untuk aksi lebih lanjut.</p>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }
        }

        return redirect('/list_ceklist_Apbn/' . $request->id . '');
    }


    public function apbn_form9($id)
    {
        $url = "save_apbn_form9";
        return view('rengiat.apbn.apbn_form9', compact('url', 'id'));
    }

    public function store_form9(Request $request)
    {

        $id_pengirim = Auth::user()->id;
        $date = date('Y-m-d H:i:s');

        $file = $request->file('gambar')->getClientOriginalName();
        $destinationPath = public_path() . "\uploads\\form_gambar\\";
        $request->file('gambar')->move($destinationPath, $file);


        $insert_file_rencana_kegiatan = DB::table('file_rencana_kegiatan')->insertGetId([
            'file' => $file,
        ], 'id');

        $insert_gambar_denah = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
            'id_file_rencana_kegiatan' => $insert_file_rencana_kegiatan,
            'update_at' => $date
        ]);


        $rengiat = DB::select("SELECT * from rencana_kegiatan where id_perencanaan_kegiatan = '".$request->id."'");
                                                foreach($rengiat as $listg)
                                                  {
                                                    $id_surat_pengantar_kalakgiat = $listg->id_surat_pengantar_kalakgiat;
                                                    $id_file_rencana_kegiatan = $listg->id_file_rencana_kegiatan;    
                                                    $id_kerangka_acuan_kegiatan = $listg->id_kerangka_acuan_kegiatan;
                                                    $id_uraian_kegiatan_rincian_biaya = $listg->id_uraian_kegiatan_rincian_biaya;
                                                    $id_syarat_teknis = $listg->id_syarat_teknis;
                                                    $id_uraian_biaya_administrasi = $listg->id_uraian_biaya_administrasi;
                                                    $id_gambar_denah = $listg->id_gambar_denah;
                                                    $id_bagan_organisasi = $listg->id_bagan_organisasi;
                                                    $id_surat_pernyataan_mutlak = $listg->id_surat_pernyataan_mutlak;
                                                    $keluaran = $listg->keluaran;
                                                  }

        if(empty($id_surat_pengantar_kalakgiat) || empty($id_file_rencana_kegiatan) || empty($id_kerangka_acuan_kegiatan) || empty($id_uraian_kegiatan_rincian_biaya) || empty($id_syarat_teknis) ||empty($id_uraian_biaya_administrasi) || empty($id_gambar_denah) ||empty($id_bagan_organisasi) || empty($id_surat_pernyataan_mutlak)){


        }
        else{
        $datalist = DB::select(" SELECT * FROM rencana_kegiatan where id_perencanaan_kegiatan = '" . $request->id . "'");
        foreach ($datalist as $key) {
            $status = $key->status_;
        }
        if($status == 1)
        {
            $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
                'status_' => 2
            ]);
        }

        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima) 
        values ('".$id_pengirim."','".$request->id."','RENGIAT','pengajuan rencana kegiatan','0','1')");

            $getemail = DB::select("SELECT * from users where id_jenis_user = '1' limit 1 ");
            foreach ($getemail as $value) {
                $email = $value->email;
                $name = $value->name;
            }

        try{
             $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Data RENGIAT Telah Lengkap'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Data Pengajuan Rencana Kegiatan telah lengkap</h2><br><b>Oleh : '.$name.'</b><br><b>Keluaran : '.$keluaran.'</b><p>Diterima data lengkap pengajuan rencana kegiatan silahkan lihat aplikasi untuk aksi lebih lanjut.</p>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }
        }


        return redirect('/list_ceklist_Apbn/' . $request->id . '');
    }




    public function apbn_form8($id)
    {
        $url = "save_apbn_form8";
        return view('rengiat.apbn.apbn_form8', compact('url', 'id'));
    }

    public function store_form8(Request $request)
    {
        $id_pengirim = Auth::user()->id;
        $date = date('Y-m-d H:i:s');

        $file = $request->file('gambar')->getClientOriginalName();
        $destinationPath = public_path() . "\uploads\\form_gambar\\";
        $request->file('gambar')->move($destinationPath, $file);


        $insert_surat_pernyataan_mutlak = DB::table('surat_pernyataan_mutlak')->insertGetId([
            'upload_surat_pernyataan' => $file,
            'yang_bertanggung_jawab' => $request->nama,
            'Jabatan' => $request->jabatan,
            'status' => 2,
            'id_user' => Auth::user()->id
        ], 'id_surat_pernyataan_mutlak');

        $insert_surat_pernyataan_mutlak = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
            'id_surat_pernyataan_mutlak' => $insert_surat_pernyataan_mutlak,
            'update_at' => $date
        ]);


        $rengiat = DB::select("SELECT * from rencana_kegiatan where id_perencanaan_kegiatan = '".$request->id."'");
                                                foreach($rengiat as $listg)
                                                  {
                                                    $id_surat_pengantar_kalakgiat = $listg->id_surat_pengantar_kalakgiat;
                                                    $id_file_rencana_kegiatan = $listg->id_file_rencana_kegiatan;    
                                                    $id_kerangka_acuan_kegiatan = $listg->id_kerangka_acuan_kegiatan;
                                                    $id_uraian_kegiatan_rincian_biaya = $listg->id_uraian_kegiatan_rincian_biaya;
                                                    $id_syarat_teknis = $listg->id_syarat_teknis;
                                                    $id_uraian_biaya_administrasi = $listg->id_uraian_biaya_administrasi;
                                                    $id_gambar_denah = $listg->id_gambar_denah;
                                                    $id_bagan_organisasi = $listg->id_bagan_organisasi;
                                                    $id_surat_pernyataan_mutlak = $listg->id_surat_pernyataan_mutlak;
                                                    $keluaran = $listg->keluaran;
                                                  }

        if(empty($id_surat_pengantar_kalakgiat) || empty($id_file_rencana_kegiatan) || empty($id_kerangka_acuan_kegiatan) || empty($id_uraian_kegiatan_rincian_biaya) || empty($id_syarat_teknis) ||empty($id_uraian_biaya_administrasi) || empty($id_gambar_denah) ||empty($id_bagan_organisasi) || empty($id_surat_pernyataan_mutlak)){


        }
        else{
            $datalist = DB::select(" SELECT * FROM rencana_kegiatan where id_perencanaan_kegiatan = '" . $request->id . "'");
        foreach ($datalist as $key) {
            $status = $key->status_;
        }
        if($status == 1)
        {
            $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
                'status_' => 2
            ]);
        }

        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima) 
        values ('".$id_pengirim."','".$request->id."','RENGIAT','pengajuan rencana kegiatan','0','1')");

            $getemail = DB::select("SELECT * from users where id_jenis_user = '1' limit 1 ");
            foreach ($getemail as $value) {
                $email = $value->email;
                $name = $value->name;
            }

        try{
             $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Data RENGIAT Telah Lengkap'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Data Pengajuan Rencana Kegiatan telah lengkap</h2><br><b>Oleh : '.$name.'</b><br><b>Keluaran : '.$keluaran.'</b><p>Diterima data lengkap pengajuan rencana kegiatan silahkan lihat aplikasi untuk aksi lebih lanjut.</p>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }
        }

        return redirect('/list_ceklist_Apbn/' . $request->id . '');
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
        //
        $url = "kegiatan_update";
        $kegiatan = Kegiatan::where('id_kegiatan', $id)->first();
        $program = Program::all();
        return view('master.kegiatan.edit', compact('kegiatan', 'url', 'program'));
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

        $update = Kegiatan::where('id_kegiatan', $request->id_kegiatan)->update(['nama_kegiatan' => $request->nama_kegiatan,
            'id_program' => $request->id_program, 'keterangan_kegiatan' => $request->keterangan]);

        if ($update) {
            return redirect('/list_kegiatan');
        } else {
            return "gagal";
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Kegiatan::destroy($id);

        Session::flash('flash_message', 'Kegiatan deleted!');

        return redirect('/list_kegiatan');
    }

    public function get_kegiatan($id)
    {

        $res = DB::select('select * from sakip.master_kegiatan where id_program =' . $id);

        $ext = '<option value="0">Pilih Kegiatan</option>';
        foreach ($res as $rs) {
            $ext .= '<option value="' . $rs->id_kegiatan . '">' . $rs->nama_kegiatan . '</option>';
        }

        echo $ext;


    }

    public function hapusnotif($id_perencanaan_kegiatan)
    {
         $notif = DB::select("delete from notif where id_keterangan ='".$id_perencanaan_kegiatan."' and keterangan='RENGIAT' ");

        return redirect('ceklist_rengiat');
    }




}
