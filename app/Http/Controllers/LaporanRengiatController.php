<?php

namespace App\Http\Controllers;

use App\TableSpesifikasi;
use Illuminate\Http\Request;
use App\Kegiatan;
use App\Program;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Session;
use App\RencanaKegiatan;
use App\KerangkaAcuanKegiatan;
use App\WaktuPelaksanaan;
use App\RincianAnggaranBiaya;
use App\UraianLengkapBiayaAdministrasi;
use App\SyaratTeknisSpesifikasi;
use App\GambarDenah;
use App\BaganOrganisasi;
use App\SuratPernyataanMutlak;
use Auth;

class LaporanRengiatController extends Controller
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
        //

//        $kegiatan = Kegiatan::all();
        $apbn = RencanaKegiatan::where('rencana_kegiatan.status', '=', '2')->join("users", "users.id", "=", "rencana_kegiatan.id_user")->orderBy('rencana_kegiatan.id_perencanaan_kegiatan','desc')->get();
        $pnbp = RencanaKegiatan::where('rencana_kegiatan.status', '=', '1')->join("users", "users.id", "=", "rencana_kegiatan.id_user")->orderBy('rencana_kegiatan.id_perencanaan_kegiatan','desc')->get();
        return view('laporan_rengiat.index', compact('apbn', 'pnbp'));


    }


    public function ceklist_rengiat()
    {
        //

//        $kegiatan = Kegiatan::all();
        $apbn = RencanaKegiatan::where('rencana_kegiatan.status', '=', '2')->join("users", "users.id", "=", "rencana_kegiatan.id_user")->orderBy('rencana_kegiatan.id_perencanaan_kegiatan','desc')->get();
        $pnbp = RencanaKegiatan::where('rencana_kegiatan.status', '=', '1')->join("users", "users.id", "=", "rencana_kegiatan.id_user")->orderBy('rencana_kegiatan.id_perencanaan_kegiatan','desc')->get();
        return view('laporan_rengiat.checklist', compact('apbn', 'pnbp'));


    }



    public function view_apbn($id)
    {
        $id_pengirim = Auth::user()->id;

        $notif = DB::select("delete from notif where id_keterangan ='".$id."' and id_penerima = '".$id_pengirim."' and keterangan= 'RENGIAT'");

        $apbn = collect(\DB::select("SELECT
        sakip.rencana_kegiatan.id_perencanaan_kegiatan,
        sakip.rencana_kegiatan.id_kegiatan,
        sakip.rencana_kegiatan.keluaran,
        sakip.rencana_kegiatan.detail_kegiatan,
        sakip.rencana_kegiatan.alokasi_anggaran,
        sakip.rencana_kegiatan.alokasi_anggaran_fisik,
        sakip.rencana_kegiatan.alokasi_anggaran_biaya_administrasi,
        sakip.rencana_kegiatan.catatan,
        sakip.rencana_kegiatan.keterangan,
        sakip.rencana_kegiatan.status,
        sakip.rencana_kegiatan.id_surat_pengantar_kalakgiat,
        sakip.rencana_kegiatan.id_kerangka_acuan_kegiatan,
        sakip.rencana_kegiatan.id_uraian_kegiatan_rincian_biaya,
        sakip.rencana_kegiatan.id_syarat_teknis,
        sakip.rencana_kegiatan.id_gambar_denah,
        sakip.rencana_kegiatan.id_bagan_organisasi,
        sakip.rencana_kegiatan.id_surat_pernyataan_mutlak,
        sakip.rencana_kegiatan.id_rencana_kegiatan,
        sakip.rencana_kegiatan.id_rencana_program_rengiat,
        sakip.rencana_kegiatan.id_uraian_biaya_administrasi,
        sakip.rencana_kegiatan.id_kegiatan_perencanaan,
        sakip.rencana_kegiatan.id_sub_kegiatan,
        sakip.rencana_kegiatan.id_sub_kategori_akun,
        sakip.rencana_kegiatan.tanggal_rencana,
        sakip.rencana_kegiatan.id_user,
        sakip.rencana_kegiatan.akun,
        sakip.master_rencana_program_rengiat.rencana_program_rengiat,
        sakip.master_rencana_program_rengiat.status AS status_master_rencana_program_rengiat,
        sakip.master_rencana_program_rengiat.keterangan AS keterangan_master_rencana_program_rengiat,
        sakip.kerangka_acuan_kegiatan.kementrian_negara_lembaga,
        sakip.kerangka_acuan_kegiatan.id_program,
        sakip.kerangka_acuan_kegiatan.id_kegiatan,
        sakip.kerangka_acuan_kegiatan.indikator_kinerja_kegiatan,
        sakip.kerangka_acuan_kegiatan.jenis_keluaran,
        sakip.kerangka_acuan_kegiatan.volume_keluaran,
        sakip.kerangka_acuan_kegiatan.dasar_hukum,
        sakip.kerangka_acuan_kegiatan.gambaran_umum,
        sakip.kerangka_acuan_kegiatan.penerimaan_manfaat,
        sakip.kerangka_acuan_kegiatan.metode_pelaksanaan,
        sakip.kerangka_acuan_kegiatan.waktu_pelaksanaan,
        sakip.kerangka_acuan_kegiatan.waktu_pencapaian_keluaran,
        sakip.kerangka_acuan_kegiatan.biaya_yang_diperlukan,
        sakip.kerangka_acuan_kegiatan.keterangan AS keterangan_kerangka_acuan_kegiatan,
        sakip.kerangka_acuan_kegiatan.status AS status_kerangka_acuan_kegiatan,
        sakip.kerangka_acuan_kegiatan.hasil,
        sakip.kerangka_acuan_kegiatan.waktu_pelaksanaan,
        sakip.master_penyaluran_anggaran.penyaluran_anggaran,
        sakip.master_penyaluran_anggaran.keterangan AS keterangan_master_penyaluran_anggaran,
        sakip.master_penyaluran_anggaran.status AS status_master_penyaluran_anggaran,
        sakip.uraian_kegiatan_rincian_biaya.kementrian_negara_lembaga AS kementrian_negara_lembaga_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.unit_organisasi_satker,
        sakip.uraian_kegiatan_rincian_biaya.kegiatan AS kegiatan_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.keluaran AS keluaran_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.detil_kegiatan,
        sakip.uraian_kegiatan_rincian_biaya.volume,
        sakip.uraian_kegiatan_rincian_biaya.satuan_ukur,
        sakip.uraian_kegiatan_rincian_biaya.alokasi_dana,
        sakip.uraian_kegiatan_rincian_biaya.keterangan AS keterangan_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.status AS status_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.total_biaya_administrasi,
        sakip.uraian_kegiatan_rincian_biaya.total_biaya_fisik,
        sakip.uraian_kegiatan_rincian_biaya.\"Total_keseluruhan\",
        sakip.uraian_kegiatan_rincian_biaya.id_rincian_anggaran_biaya,
        sakip.uraian_kegiatan_rincian_biaya.program AS program_uraian_kegiatan_rincian_biaya,
        sakip.uraian_biaya_administrasi.\"Unit_organisasi_satker\",
        sakip.uraian_biaya_administrasi.\"Penyusunan_biaya_administrasi\",
        sakip.uraian_biaya_administrasi.alokasi_dana AS alokasi_dana_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.\"Kegiatan\" AS kegiatan_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.waktu_pelaksanaan,
        sakip.uraian_biaya_administrasi.jenis_pengadaan,
        sakip.uraian_biaya_administrasi.satuan_ukur AS satuan_ukur_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.status AS status_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.keterangan AS keterangan_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.kebutuhan_biaya_pengadaan,
        sakip.uraian_biaya_administrasi.pagu_anggaran,
        sakip.uraian_biaya_administrasi.biaya_administrasi,
        sakip.uraian_biaya_administrasi.biaya_fisik,
        sakip.syarat_teknis_spesifikasi.kementrian_negara,
        sakip.syarat_teknis_spesifikasi.unit_organisasi_satker AS unit_organisasi_satker_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.kegiatan AS kegiatan_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.keluaran AS keluaran_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.datil_kegiatan,
        sakip.syarat_teknis_spesifikasi.volume AS volume_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.satuan_ukur AS satuan_ukur_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.alokasi_dana AS alokasi_dana_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.status AS status_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.keterangan AS keterangan_syarat_teknis_spesifikasi,
        sakip.gambar_denah.kementrian_negara AS kementrian_negara_gambar_denah,
        sakip.gambar_denah.unit_organisasi_satker AS unit_organisasi_satker_gambar_denah,
        sakip.gambar_denah.kegiatan AS kegiatan_gambar_denah,
        sakip.gambar_denah.keluaran AS keluaran_gambar_denah,
        sakip.gambar_denah.detil_kegiatan AS detail_kegiatan_gambar_denah,
        sakip.gambar_denah.volume AS volume_gambar_denah,
        sakip.gambar_denah.satuan_ukur as satuan_ukur_gambar_denah,
        sakip.gambar_denah.alokasi_dana as alokasi_dana_gambar_denah,
        sakip.gambar_denah.upload_gambar as upload_gambar_gambar_denah,
        sakip.gambar_denah.status as status_gambar_denah,
        sakip.gambar_denah.keterangan as keterangan_gambar_denah,
        sakip.bagan_organisasi.upload_bagan_organisasi as upload_bagan_organisasi_gambar_denah,
        sakip.bagan_organisasi.keterangan as keterangan_gambar_denah,
        sakip.bagan_organisasi.status as status_gambar_denah,
        sakip.surat_pernyataan_mutlak.yang_bertanggung_jawab as yang_bertanggung_jawab_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.upload_surat_pernyataan as upload_surat_pernyataan_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.\"Jabatan\" as jabatan_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.status as status_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.keterangan as keterangan_surat_pernyataan_mutlak
        FROM
        sakip.rencana_kegiatan
        LEFT JOIN sakip.master_rencana_program_rengiat ON sakip.master_rencana_program_rengiat.id_rencana_program_rengiat = sakip.rencana_kegiatan.id_rencana_program_rengiat
        LEFT JOIN sakip.kerangka_acuan_kegiatan ON sakip.kerangka_acuan_kegiatan.id_kerangka_acuan_kegiatan = sakip.rencana_kegiatan.id_kerangka_acuan_kegiatan
        LEFT JOIN sakip.master_penyaluran_anggaran ON sakip.master_penyaluran_anggaran.id_master_penyaluran_anggaran = sakip.rencana_kegiatan.id_master_penyaluran_anggaran
        LEFT JOIN sakip.uraian_kegiatan_rincian_biaya ON sakip.uraian_kegiatan_rincian_biaya.id_uraian_kegiatan_rincian_biaya = sakip.rencana_kegiatan.id_uraian_kegiatan_rincian_biaya
        LEFT JOIN sakip.uraian_biaya_administrasi ON sakip.uraian_biaya_administrasi.id_uraian_biaya_administrasi = sakip.rencana_kegiatan.id_uraian_biaya_administrasi
        LEFT JOIN sakip.syarat_teknis_spesifikasi ON sakip.syarat_teknis_spesifikasi.id_syarat_teknis = sakip.rencana_kegiatan.id_syarat_teknis
        LEFT JOIN sakip.gambar_denah ON sakip.rencana_kegiatan.id_gambar_denah = sakip.gambar_denah.id_gambar_denah
        LEFT JOIN sakip.bagan_organisasi ON sakip.rencana_kegiatan.id_bagan_organisasi = sakip.bagan_organisasi.id_bagan_organisasi
        LEFT JOIN sakip.surat_pernyataan_mutlak ON sakip.rencana_kegiatan.id_surat_pernyataan_mutlak = sakip.surat_pernyataan_mutlak.id_surat_pernyataan_mutlak
        WHERE
        sakip.rencana_kegiatan.id_perencanaan_kegiatan = ".$id.""))->first();

        if(!empty($apbn->id_kerangka_acuan_kegiatan)){
            $waktu_pelaksanaan = WaktuPelaksanaan::where('waktu_pelaksanaan.id_waktu_pelaksanaan', '=', $apbn->id_kerangka_acuan_kegiatan)->get();
        }else{
            $waktu_pelaksanaan = array();
        }
        if(!empty($apbn->id_uraian_kegiatan_rincian_biaya)){
            $rincian_anggaran_biaya = RincianAnggaranBiaya::where('rincian_anggaran_biaya.id_rincian_anggaran_biaya','=',$apbn->id_uraian_kegiatan_rincian_biaya)->get();
        }else{
            $rincian_anggaran_biaya = array();
        }
        if(!empty($apbn->id_uraian_kegiatan_rincian_biaya)){
            $uraian_lengkap_biaya_administrasi = UraianLengkapBiayaAdministrasi::where('uraian_lengkap_biaya_administrasi.id_uraian_lengkap','=',$apbn->id_uraian_biaya_administrasi)->get();
        }else{
            $uraian_lengkap_biaya_administrasi = array();
        }
        if(!empty($apbn->id_uraian_kegiatan_rincian_biaya)){
            $tabel_spesifikasi = TableSpesifikasi::where('table_spesifikasi.id_table_spesifikasi','=',$apbn->id_syarat_teknis)->get();
        }else{
            $tabel_spesifikasi = array();
        }

        $getidkalakgiat = DB :: select("select * from rencana_kegiatan where id_perencanaan_kegiatan = '".$id."' ");
        foreach ($getidkalakgiat as $value) {
            $id_kalakgiat = $value->id_surat_pengantar_kalakgiat;
            $id_file = $value->id_file_rencana_kegiatan;
        }

        if(!empty($id_kalakgiat)){

            $kalakgiat = DB :: select("select * from kalakgiat where id_kalakgiat = '".$id_kalakgiat."' ");
            $tembusan = DB :: select("select * from tembusan_kalakgiat where id_kalakgiat = '".$id_kalakgiat."' ");

            $id_file_rencana_kegiatan = DB :: select("select * from file_rencana_kegiatan where id = '".$id_file."' ");

            return view('laporan_rengiat.view_apbn', compact('id','apbn','waktu_pelaksanaan','rincian_anggaran_biaya','uraian_lengkap_biaya_administrasi','syarat_teknis_spesifikasi','gambar_denah','bagan_organisasi','surat_pernyataan_mutlak','syarat_teknis_spesifikasi','tabel_spesifikasi','kalakgiat','tembusan','id_file_rencana_kegiatan'));
        }
        else{

        return view('laporan_rengiat.view_apbn', compact('id','apbn','waktu_pelaksanaan','rincian_anggaran_biaya','uraian_lengkap_biaya_administrasi','syarat_teknis_spesifikasi','gambar_denah','bagan_organisasi','surat_pernyataan_mutlak','syarat_teknis_spesifikasi','tabel_spesifikasi'));

        }


    }

     public function checklist_apbn($id)
    {
        $notif = DB::select("delete from notif where id_keterangan ='".$id."' and keterangan = 'RENGIAT'");

        $apbn = collect(\DB::select("SELECT
        sakip.rencana_kegiatan.id_perencanaan_kegiatan,
        sakip.rencana_kegiatan.feedback,
        sakip.rencana_kegiatan.id_kegiatan,
        sakip.rencana_kegiatan.keluaran,
        sakip.rencana_kegiatan.detail_kegiatan,
        sakip.rencana_kegiatan.alokasi_anggaran,
        sakip.rencana_kegiatan.alokasi_anggaran_fisik,
        sakip.rencana_kegiatan.alokasi_anggaran_biaya_administrasi,
        sakip.rencana_kegiatan.catatan,
        sakip.rencana_kegiatan.keterangan,
        sakip.rencana_kegiatan.status,
        sakip.rencana_kegiatan.id_surat_pengantar_kalakgiat,
        sakip.rencana_kegiatan.id_kerangka_acuan_kegiatan,
        sakip.rencana_kegiatan.id_uraian_kegiatan_rincian_biaya,
        sakip.rencana_kegiatan.id_syarat_teknis,
        sakip.rencana_kegiatan.id_gambar_denah,
        sakip.rencana_kegiatan.id_bagan_organisasi,
        sakip.rencana_kegiatan.id_surat_pernyataan_mutlak,
        sakip.rencana_kegiatan.id_rencana_kegiatan,
        sakip.rencana_kegiatan.id_rencana_program_rengiat,
        sakip.rencana_kegiatan.id_uraian_biaya_administrasi,
        sakip.rencana_kegiatan.id_kegiatan_perencanaan,
        sakip.rencana_kegiatan.id_sub_kegiatan,
        sakip.rencana_kegiatan.id_sub_kategori_akun,
        sakip.rencana_kegiatan.tanggal_rencana,
        sakip.rencana_kegiatan.id_user,
        sakip.rencana_kegiatan.akun,
        sakip.master_rencana_program_rengiat.rencana_program_rengiat,
        sakip.master_rencana_program_rengiat.status AS status_master_rencana_program_rengiat,
        sakip.master_rencana_program_rengiat.keterangan AS keterangan_master_rencana_program_rengiat,
        sakip.kerangka_acuan_kegiatan.kementrian_negara_lembaga,
        sakip.kerangka_acuan_kegiatan.id_kerangka_acuan_kegiatan,
        sakip.kerangka_acuan_kegiatan.id_program,
        sakip.kerangka_acuan_kegiatan.id_kegiatan,
        sakip.kerangka_acuan_kegiatan.indikator_kinerja_kegiatan,
        sakip.kerangka_acuan_kegiatan.jenis_keluaran,
        sakip.kerangka_acuan_kegiatan.volume_keluaran,
        sakip.kerangka_acuan_kegiatan.dasar_hukum,
        sakip.kerangka_acuan_kegiatan.gambaran_umum,
        sakip.kerangka_acuan_kegiatan.penerimaan_manfaat,
        sakip.kerangka_acuan_kegiatan.metode_pelaksanaan,
        sakip.kerangka_acuan_kegiatan.waktu_pelaksanaan,
        sakip.kerangka_acuan_kegiatan.waktu_pencapaian_keluaran,
        sakip.kerangka_acuan_kegiatan.biaya_yang_diperlukan,
        sakip.kerangka_acuan_kegiatan.keterangan AS keterangan_kerangka_acuan_kegiatan,
        sakip.kerangka_acuan_kegiatan.status AS status_kerangka_acuan_kegiatan,
        sakip.kerangka_acuan_kegiatan.hasil,
        sakip.kerangka_acuan_kegiatan.waktu_pelaksanaan,
        sakip.master_penyaluran_anggaran.penyaluran_anggaran,
        sakip.master_penyaluran_anggaran.keterangan AS keterangan_master_penyaluran_anggaran,
        sakip.master_penyaluran_anggaran.status AS status_master_penyaluran_anggaran,
        sakip.uraian_kegiatan_rincian_biaya.kementrian_negara_lembaga AS kementrian_negara_lembaga_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.unit_organisasi_satker,
        sakip.uraian_kegiatan_rincian_biaya.id_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.kegiatan AS kegiatan_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.keluaran AS keluaran_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.detil_kegiatan,
        sakip.uraian_kegiatan_rincian_biaya.volume,
        sakip.uraian_kegiatan_rincian_biaya.satuan_ukur,
        sakip.uraian_kegiatan_rincian_biaya.alokasi_dana,
        sakip.uraian_kegiatan_rincian_biaya.keterangan AS keterangan_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.status AS status_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.total_biaya_administrasi,
        sakip.uraian_kegiatan_rincian_biaya.total_biaya_fisik,
        sakip.uraian_kegiatan_rincian_biaya.\"Total_keseluruhan\",
        sakip.uraian_kegiatan_rincian_biaya.id_rincian_anggaran_biaya,
        sakip.uraian_kegiatan_rincian_biaya.program AS program_uraian_kegiatan_rincian_biaya,
        sakip.uraian_biaya_administrasi.\"Unit_organisasi_satker\",
        sakip.uraian_biaya_administrasi.\"Penyusunan_biaya_administrasi\",
        sakip.uraian_biaya_administrasi.alokasi_dana AS alokasi_dana_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.\"Kegiatan\" AS kegiatan_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.waktu_pelaksanaan,
        sakip.uraian_biaya_administrasi.jenis_pengadaan,
        sakip.uraian_biaya_administrasi.satuan_ukur AS satuan_ukur_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.status AS status_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.keterangan AS keterangan_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.kebutuhan_biaya_pengadaan,
        sakip.uraian_biaya_administrasi.pagu_anggaran,
        sakip.uraian_biaya_administrasi.biaya_administrasi,
        sakip.uraian_biaya_administrasi.biaya_fisik,
        sakip.syarat_teknis_spesifikasi.kementrian_negara,
        sakip.syarat_teknis_spesifikasi.unit_organisasi_satker AS unit_organisasi_satker_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.kegiatan AS kegiatan_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.keluaran AS keluaran_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.datil_kegiatan,
        sakip.syarat_teknis_spesifikasi.volume AS volume_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.satuan_ukur AS satuan_ukur_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.alokasi_dana AS alokasi_dana_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.status AS status_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.keterangan AS keterangan_syarat_teknis_spesifikasi,
        sakip.gambar_denah.kementrian_negara AS kementrian_negara_gambar_denah,
        sakip.gambar_denah.unit_organisasi_satker AS unit_organisasi_satker_gambar_denah,
        sakip.gambar_denah.kegiatan AS kegiatan_gambar_denah,
        sakip.gambar_denah.keluaran AS keluaran_gambar_denah,
        sakip.gambar_denah.detil_kegiatan AS detail_kegiatan_gambar_denah,
        sakip.gambar_denah.volume AS volume_gambar_denah,
        sakip.gambar_denah.satuan_ukur as satuan_ukur_gambar_denah,
        sakip.gambar_denah.alokasi_dana as alokasi_dana_gambar_denah,
        sakip.gambar_denah.upload_gambar as upload_gambar_gambar_denah,
        sakip.gambar_denah.status as status_gambar_denah,
        sakip.gambar_denah.keterangan as keterangan_gambar_denah,
        sakip.bagan_organisasi.upload_bagan_organisasi as upload_bagan_organisasi_gambar_denah,
        sakip.bagan_organisasi.keterangan as keterangan_gambar_denah,
        sakip.bagan_organisasi.status as status_gambar_denah,
        sakip.surat_pernyataan_mutlak.yang_bertanggung_jawab as yang_bertanggung_jawab_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.upload_surat_pernyataan as upload_surat_pernyataan_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.\"Jabatan\" as jabatan_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.status as status_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.keterangan as keterangan_surat_pernyataan_mutlak
        FROM
        sakip.rencana_kegiatan
        LEFT JOIN sakip.master_rencana_program_rengiat ON sakip.master_rencana_program_rengiat.id_rencana_program_rengiat = sakip.rencana_kegiatan.id_rencana_program_rengiat
        LEFT JOIN sakip.kerangka_acuan_kegiatan ON sakip.kerangka_acuan_kegiatan.id_kerangka_acuan_kegiatan = sakip.rencana_kegiatan.id_kerangka_acuan_kegiatan
        LEFT JOIN sakip.master_penyaluran_anggaran ON sakip.master_penyaluran_anggaran.id_master_penyaluran_anggaran = sakip.rencana_kegiatan.id_master_penyaluran_anggaran
        LEFT JOIN sakip.uraian_kegiatan_rincian_biaya ON sakip.uraian_kegiatan_rincian_biaya.id_uraian_kegiatan_rincian_biaya = sakip.rencana_kegiatan.id_uraian_kegiatan_rincian_biaya
        LEFT JOIN sakip.uraian_biaya_administrasi ON sakip.uraian_biaya_administrasi.id_uraian_biaya_administrasi = sakip.rencana_kegiatan.id_uraian_biaya_administrasi
        LEFT JOIN sakip.syarat_teknis_spesifikasi ON sakip.syarat_teknis_spesifikasi.id_syarat_teknis = sakip.rencana_kegiatan.id_syarat_teknis
        LEFT JOIN sakip.gambar_denah ON sakip.rencana_kegiatan.id_gambar_denah = sakip.gambar_denah.id_gambar_denah
        LEFT JOIN sakip.bagan_organisasi ON sakip.rencana_kegiatan.id_bagan_organisasi = sakip.bagan_organisasi.id_bagan_organisasi
        LEFT JOIN sakip.surat_pernyataan_mutlak ON sakip.rencana_kegiatan.id_surat_pernyataan_mutlak = sakip.surat_pernyataan_mutlak.id_surat_pernyataan_mutlak
        WHERE
        sakip.rencana_kegiatan.id_perencanaan_kegiatan = ".$id.""))->first();

        if(!empty($apbn->id_kerangka_acuan_kegiatan)){
            $waktu_pelaksanaan = WaktuPelaksanaan::where('waktu_pelaksanaan.id_waktu_pelaksanaan', '=', $apbn->id_kerangka_acuan_kegiatan)->get();
        }else{
            $waktu_pelaksanaan = array();
        }
        if(!empty($apbn->id_uraian_kegiatan_rincian_biaya)){
            $rincian_anggaran_biaya = RincianAnggaranBiaya::where('rincian_anggaran_biaya.id_rincian_anggaran_biaya','=',$apbn->id_uraian_kegiatan_rincian_biaya)->get();
        }else{
            $rincian_anggaran_biaya = array();
        }
        if(!empty($apbn->id_uraian_kegiatan_rincian_biaya)){
            $uraian_lengkap_biaya_administrasi = UraianLengkapBiayaAdministrasi::where('uraian_lengkap_biaya_administrasi.id_uraian_lengkap','=',$apbn->id_uraian_biaya_administrasi)->get();
        }else{
            $uraian_lengkap_biaya_administrasi = array();
        }
        if(!empty($apbn->id_uraian_kegiatan_rincian_biaya)){
            $tabel_spesifikasi = TableSpesifikasi::where('table_spesifikasi.id_table_spesifikasi','=',$apbn->id_syarat_teknis)->get();
        }else{
            $tabel_spesifikasi = array();
        }

        $getidkalakgiat = DB :: select("select * from rencana_kegiatan where id_perencanaan_kegiatan = '".$id."' ");
        foreach ($getidkalakgiat as $value) {
            $id_kalakgiat = $value->id_surat_pengantar_kalakgiat;
            $id_file = $value->id_file_rencana_kegiatan;
        }

        if(!empty($id_kalakgiat)){

            $kalakgiat = DB :: select("select * from kalakgiat where id_kalakgiat = '".$id_kalakgiat."' ");
            $tembusan = DB :: select("select * from tembusan_kalakgiat where id_kalakgiat = '".$id_kalakgiat."' ");

            $id_file_rencana_kegiatan = DB :: select("select * from file_rencana_kegiatan where id = '".$id_file."' ");

            return view('laporan_rengiat.checklist_apbn', compact('id','apbn','waktu_pelaksanaan','rincian_anggaran_biaya','uraian_lengkap_biaya_administrasi','syarat_teknis_spesifikasi','gambar_denah','bagan_organisasi','surat_pernyataan_mutlak','syarat_teknis_spesifikasi','tabel_spesifikasi','kalakgiat','tembusan','id_file_rencana_kegiatan'));
        }
        else{

        return view('laporan_rengiat.checklist_apbn', compact('id','apbn','waktu_pelaksanaan','rincian_anggaran_biaya','uraian_lengkap_biaya_administrasi','syarat_teknis_spesifikasi','gambar_denah','bagan_organisasi','surat_pernyataan_mutlak','syarat_teknis_spesifikasi','tabel_spesifikasi'));

        }


    }


    public function view_apbn_cetak($id)
    {


        $apbn = collect(\DB::select("SELECT
        sakip.rencana_kegiatan.id_perencanaan_kegiatan,
        sakip.rencana_kegiatan.id_kegiatan,
        sakip.rencana_kegiatan.keluaran,
        sakip.rencana_kegiatan.detail_kegiatan,
        sakip.rencana_kegiatan.alokasi_anggaran,
        sakip.rencana_kegiatan.alokasi_anggaran_fisik,
        sakip.rencana_kegiatan.alokasi_anggaran_biaya_administrasi,
        sakip.rencana_kegiatan.catatan,
        sakip.rencana_kegiatan.keterangan,
        sakip.rencana_kegiatan.status,
        sakip.rencana_kegiatan.id_surat_pengantar_kalakgiat,
        sakip.rencana_kegiatan.id_kerangka_acuan_kegiatan,
        sakip.rencana_kegiatan.id_uraian_kegiatan_rincian_biaya,
        sakip.rencana_kegiatan.id_syarat_teknis,
        sakip.rencana_kegiatan.id_gambar_denah,
        sakip.rencana_kegiatan.id_bagan_organisasi,
        sakip.rencana_kegiatan.id_surat_pernyataan_mutlak,
        sakip.rencana_kegiatan.id_rencana_kegiatan,
        sakip.rencana_kegiatan.id_rencana_program_rengiat,
        sakip.rencana_kegiatan.id_uraian_biaya_administrasi,
        sakip.rencana_kegiatan.id_kegiatan_perencanaan,
        sakip.rencana_kegiatan.id_sub_kegiatan,
        sakip.rencana_kegiatan.id_sub_kategori_akun,
        sakip.rencana_kegiatan.tanggal_rencana,
        sakip.rencana_kegiatan.id_user,
        sakip.rencana_kegiatan.akun,
        sakip.master_rencana_program_rengiat.rencana_program_rengiat,
        sakip.master_rencana_program_rengiat.status AS status_master_rencana_program_rengiat,
        sakip.master_rencana_program_rengiat.keterangan AS keterangan_master_rencana_program_rengiat,
        sakip.kerangka_acuan_kegiatan.kementrian_negara_lembaga,
        sakip.kerangka_acuan_kegiatan.id_program,
        sakip.kerangka_acuan_kegiatan.id_kegiatan,
        sakip.kerangka_acuan_kegiatan.indikator_kinerja_kegiatan,
        sakip.kerangka_acuan_kegiatan.jenis_keluaran,
        sakip.kerangka_acuan_kegiatan.volume_keluaran,
        sakip.kerangka_acuan_kegiatan.dasar_hukum,
        sakip.kerangka_acuan_kegiatan.gambaran_umum,
        sakip.kerangka_acuan_kegiatan.penerimaan_manfaat,
        sakip.kerangka_acuan_kegiatan.metode_pelaksanaan,
        sakip.kerangka_acuan_kegiatan.waktu_pelaksanaan,
        sakip.kerangka_acuan_kegiatan.waktu_pencapaian_keluaran,
        sakip.kerangka_acuan_kegiatan.biaya_yang_diperlukan,
        sakip.kerangka_acuan_kegiatan.keterangan AS keterangan_kerangka_acuan_kegiatan,
        sakip.kerangka_acuan_kegiatan.status AS status_kerangka_acuan_kegiatan,
        sakip.kerangka_acuan_kegiatan.hasil,
        sakip.kerangka_acuan_kegiatan.waktu_pelaksanaan,
        sakip.master_penyaluran_anggaran.penyaluran_anggaran,
        sakip.master_penyaluran_anggaran.keterangan AS keterangan_master_penyaluran_anggaran,
        sakip.master_penyaluran_anggaran.status AS status_master_penyaluran_anggaran,
        sakip.uraian_kegiatan_rincian_biaya.kementrian_negara_lembaga AS kementrian_negara_lembaga_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.unit_organisasi_satker,
        sakip.uraian_kegiatan_rincian_biaya.kegiatan AS kegiatan_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.keluaran AS keluaran_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.detil_kegiatan,
        sakip.uraian_kegiatan_rincian_biaya.volume,
        sakip.uraian_kegiatan_rincian_biaya.satuan_ukur,
        sakip.uraian_kegiatan_rincian_biaya.alokasi_dana,
        sakip.uraian_kegiatan_rincian_biaya.keterangan AS keterangan_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.status AS status_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.total_biaya_administrasi,
        sakip.uraian_kegiatan_rincian_biaya.total_biaya_fisik,
        sakip.uraian_kegiatan_rincian_biaya.\"Total_keseluruhan\",
        sakip.uraian_kegiatan_rincian_biaya.id_rincian_anggaran_biaya,
        sakip.uraian_kegiatan_rincian_biaya.program AS program_uraian_kegiatan_rincian_biaya,
        sakip.uraian_biaya_administrasi.\"Unit_organisasi_satker\",
        sakip.uraian_biaya_administrasi.\"Penyusunan_biaya_administrasi\",
        sakip.uraian_biaya_administrasi.alokasi_dana AS alokasi_dana_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.\"Kegiatan\" AS kegiatan_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.waktu_pelaksanaan,
        sakip.uraian_biaya_administrasi.jenis_pengadaan,
        sakip.uraian_biaya_administrasi.satuan_ukur AS satuan_ukur_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.status AS status_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.keterangan AS keterangan_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.kebutuhan_biaya_pengadaan,
        sakip.uraian_biaya_administrasi.pagu_anggaran,
        sakip.uraian_biaya_administrasi.biaya_administrasi,
        sakip.uraian_biaya_administrasi.biaya_fisik,
        sakip.syarat_teknis_spesifikasi.kementrian_negara,
        sakip.syarat_teknis_spesifikasi.unit_organisasi_satker AS unit_organisasi_satker_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.kegiatan AS kegiatan_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.keluaran AS keluaran_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.datil_kegiatan,
        sakip.syarat_teknis_spesifikasi.volume AS volume_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.satuan_ukur AS satuan_ukur_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.alokasi_dana AS alokasi_dana_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.status AS status_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.keterangan AS keterangan_syarat_teknis_spesifikasi,
        sakip.gambar_denah.kementrian_negara AS kementrian_negara_gambar_denah,
        sakip.gambar_denah.unit_organisasi_satker AS unit_organisasi_satker_gambar_denah,
        sakip.gambar_denah.kegiatan AS kegiatan_gambar_denah,
        sakip.gambar_denah.keluaran AS keluaran_gambar_denah,
        sakip.gambar_denah.detil_kegiatan AS detail_kegiatan_gambar_denah,
        sakip.gambar_denah.volume AS volume_gambar_denah,
        sakip.gambar_denah.satuan_ukur as satuan_ukur_gambar_denah,
        sakip.gambar_denah.alokasi_dana as alokasi_dana_gambar_denah,
        sakip.gambar_denah.upload_gambar as upload_gambar_gambar_denah,
        sakip.gambar_denah.status as status_gambar_denah,
        sakip.gambar_denah.keterangan as keterangan_gambar_denah,
        sakip.bagan_organisasi.upload_bagan_organisasi as upload_bagan_organisasi_gambar_denah,
        sakip.bagan_organisasi.keterangan as keterangan_gambar_denah,
        sakip.bagan_organisasi.status as status_gambar_denah,
        sakip.surat_pernyataan_mutlak.yang_bertanggung_jawab as yang_bertanggung_jawab_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.upload_surat_pernyataan as upload_surat_pernyataan_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.\"Jabatan\" as jabatan_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.status as status_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.keterangan as keterangan_surat_pernyataan_mutlak
        FROM
        sakip.rencana_kegiatan
        LEFT JOIN sakip.master_rencana_program_rengiat ON sakip.master_rencana_program_rengiat.id_rencana_program_rengiat = sakip.rencana_kegiatan.id_rencana_program_rengiat
        LEFT JOIN sakip.kerangka_acuan_kegiatan ON sakip.kerangka_acuan_kegiatan.id_kerangka_acuan_kegiatan = sakip.rencana_kegiatan.id_kerangka_acuan_kegiatan
        LEFT JOIN sakip.master_penyaluran_anggaran ON sakip.master_penyaluran_anggaran.id_master_penyaluran_anggaran = sakip.rencana_kegiatan.id_master_penyaluran_anggaran
        LEFT JOIN sakip.uraian_kegiatan_rincian_biaya ON sakip.uraian_kegiatan_rincian_biaya.id_uraian_kegiatan_rincian_biaya = sakip.rencana_kegiatan.id_uraian_kegiatan_rincian_biaya
        LEFT JOIN sakip.uraian_biaya_administrasi ON sakip.uraian_biaya_administrasi.id_uraian_biaya_administrasi = sakip.rencana_kegiatan.id_uraian_biaya_administrasi
        LEFT JOIN sakip.syarat_teknis_spesifikasi ON sakip.syarat_teknis_spesifikasi.id_syarat_teknis = sakip.rencana_kegiatan.id_syarat_teknis
        LEFT JOIN sakip.gambar_denah ON sakip.rencana_kegiatan.id_gambar_denah = sakip.gambar_denah.id_gambar_denah
        LEFT JOIN sakip.bagan_organisasi ON sakip.rencana_kegiatan.id_bagan_organisasi = sakip.bagan_organisasi.id_bagan_organisasi
        LEFT JOIN sakip.surat_pernyataan_mutlak ON sakip.rencana_kegiatan.id_surat_pernyataan_mutlak = sakip.surat_pernyataan_mutlak.id_surat_pernyataan_mutlak
        WHERE
        sakip.rencana_kegiatan.id_perencanaan_kegiatan = ".$id.""))->first();

        if(!empty($apbn->id_kerangka_acuan_kegiatan)){
            $waktu_pelaksanaan = WaktuPelaksanaan::where('waktu_pelaksanaan.id_waktu_pelaksanaan', '=', $apbn->id_kerangka_acuan_kegiatan)->get();
        }else{
            $waktu_pelaksanaan = array();
        }
        if(!empty($apbn->id_uraian_kegiatan_rincian_biaya)){
            $rincian_anggaran_biaya = RincianAnggaranBiaya::where('rincian_anggaran_biaya.id_rincian_anggaran_biaya','=',$apbn->id_uraian_kegiatan_rincian_biaya)->get();
        }else{
            $rincian_anggaran_biaya = array();
        }
        if(!empty($apbn->id_uraian_kegiatan_rincian_biaya)){
            $uraian_lengkap_biaya_administrasi = UraianLengkapBiayaAdministrasi::where('uraian_lengkap_biaya_administrasi.id_uraian_lengkap','=',$apbn->id_uraian_biaya_administrasi)->get();
        }else{
            $uraian_lengkap_biaya_administrasi = array();
        }
        if(!empty($apbn->id_uraian_kegiatan_rincian_biaya)){
            $tabel_spesifikasi = TableSpesifikasi::where('table_spesifikasi.id_table_spesifikasi','=',$apbn->id_syarat_teknis)->get();
        }else{
            $tabel_spesifikasi = array();
        }
        $getidkalakgiat = DB :: select("select * from rencana_kegiatan where id_perencanaan_kegiatan = '".$id."' ");
        foreach ($getidkalakgiat as $value) {
            $id_kalakgiat = $value->id_surat_pengantar_kalakgiat;
            $id_file = $value->id_file_rencana_kegiatan;
        }

        if(!empty($id_kalakgiat)){

            $kalakgiat = DB :: select("select * from kalakgiat where id_kalakgiat = '".$id_kalakgiat."' ");
            $tembusan = DB :: select("select * from tembusan_kalakgiat where id_kalakgiat = '".$id_kalakgiat."' ");

            $id_file_rencana_kegiatan = DB :: select("select * from file_rencana_kegiatan where id = '".$id_file."' ");

            $no = 1;

            return view('laporan_rengiat.view_apbn_cetak', compact('id','apbn','waktu_pelaksanaan','rincian_anggaran_biaya','uraian_lengkap_biaya_administrasi','syarat_teknis_spesifikasi','gambar_denah','bagan_organisasi','surat_pernyataan_mutlak','syarat_teknis_spesifikasi','tabel_spesifikasi','kalakgiat','tembusan','id_file_rencana_kegiatan','no'));
        }



        return view('laporan_rengiat.view_apbn_cetak', compact('id','apbn','waktu_pelaksanaan','rincian_anggaran_biaya','uraian_lengkap_biaya_administrasi','syarat_teknis_spesifikasi','gambar_denah','bagan_organisasi','surat_pernyataan_mutlak','syarat_teknis_spesifikasi','tabel_spesifikasi'));
    }



    public function view_pnbp($id)
    {
        $id_pengirim = Auth::user()->id;

        $notif = DB::select("delete from notif where id_keterangan ='".$id."' and id_penerima = '".$id_pengirim."' and keterangan ='RENGIAT' ");

        $pnbp = collect(\DB::select("SELECT
        sakip.rencana_kegiatan.id_perencanaan_kegiatan,
        sakip.rencana_kegiatan.id_perencanaan_kegiatan,
        sakip.rencana_kegiatan.keluaran,
        sakip.rencana_kegiatan.detail_kegiatan,
        sakip.rencana_kegiatan.alokasi_anggaran,
        sakip.rencana_kegiatan.alokasi_anggaran_fisik,
        sakip.rencana_kegiatan.alokasi_anggaran_biaya_administrasi,
        sakip.rencana_kegiatan.catatan,
        sakip.rencana_kegiatan.keterangan,
        sakip.rencana_kegiatan.status,
        sakip.rencana_kegiatan.id_surat_pengantar_kalakgiat,
        sakip.rencana_kegiatan.id_kerangka_acuan_kegiatan,
        sakip.rencana_kegiatan.id_uraian_kegiatan_rincian_biaya,
        sakip.rencana_kegiatan.id_syarat_teknis,
        sakip.rencana_kegiatan.id_gambar_denah,
        sakip.rencana_kegiatan.id_bagan_organisasi,
        sakip.rencana_kegiatan.id_surat_pernyataan_mutlak,
        sakip.rencana_kegiatan.id_rencana_kegiatan,
        sakip.rencana_kegiatan.id_rencana_program_rengiat,
        sakip.rencana_kegiatan.id_uraian_biaya_administrasi,
        sakip.rencana_kegiatan.id_kegiatan_perencanaan,
        sakip.rencana_kegiatan.id_sub_kegiatan,
        sakip.rencana_kegiatan.id_sub_kategori_akun,
        sakip.rencana_kegiatan.tanggal_rencana,
        sakip.rencana_kegiatan.id_user,
        sakip.rencana_kegiatan.akun,
        sakip.master_rencana_program_rengiat.rencana_program_rengiat,
        sakip.master_rencana_program_rengiat.status AS status_master_rencana_program_rengiat,
        sakip.master_rencana_program_rengiat.keterangan AS keterangan_master_rencana_program_rengiat,
        sakip.kerangka_acuan_kegiatan.kementrian_negara_lembaga,
        sakip.kerangka_acuan_kegiatan.id_program,
        sakip.kerangka_acuan_kegiatan.id_kegiatan,
        sakip.kerangka_acuan_kegiatan.indikator_kinerja_kegiatan,
        sakip.kerangka_acuan_kegiatan.jenis_keluaran,
        sakip.kerangka_acuan_kegiatan.volume_keluaran,
        sakip.kerangka_acuan_kegiatan.dasar_hukum,
        sakip.kerangka_acuan_kegiatan.gambaran_umum,
        sakip.kerangka_acuan_kegiatan.penerimaan_manfaat,
        sakip.kerangka_acuan_kegiatan.metode_pelaksanaan,
        sakip.kerangka_acuan_kegiatan.waktu_pelaksanaan,
        sakip.kerangka_acuan_kegiatan.waktu_pencapaian_keluaran,
        sakip.kerangka_acuan_kegiatan.biaya_yang_diperlukan,
        sakip.kerangka_acuan_kegiatan.keterangan AS keterangan_kerangka_acuan_kegiatan,
        sakip.kerangka_acuan_kegiatan.status AS status_kerangka_acuan_kegiatan,
        sakip.kerangka_acuan_kegiatan.hasil,
        sakip.kerangka_acuan_kegiatan.waktu_pelaksanaan,
        sakip.master_penyaluran_anggaran.penyaluran_anggaran,
        sakip.master_penyaluran_anggaran.keterangan AS keterangan_master_penyaluran_anggaran,
        sakip.master_penyaluran_anggaran.status AS status_master_penyaluran_anggaran,
        sakip.uraian_kegiatan_rincian_biaya.kementrian_negara_lembaga AS kementrian_negara_lembaga_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.unit_organisasi_satker,
        sakip.uraian_kegiatan_rincian_biaya.kegiatan AS kegiatan_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.keluaran AS keluaran_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.detil_kegiatan,
        sakip.uraian_kegiatan_rincian_biaya.volume,
        sakip.uraian_kegiatan_rincian_biaya.satuan_ukur,
        sakip.uraian_kegiatan_rincian_biaya.alokasi_dana,
        sakip.uraian_kegiatan_rincian_biaya.keterangan AS keterangan_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.status AS status_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.total_biaya_administrasi,
        sakip.uraian_kegiatan_rincian_biaya.total_biaya_fisik,
        sakip.uraian_kegiatan_rincian_biaya.\"Total_keseluruhan\",
        sakip.uraian_kegiatan_rincian_biaya.id_rincian_anggaran_biaya,
        sakip.uraian_kegiatan_rincian_biaya.program AS program_uraian_kegiatan_rincian_biaya,
        sakip.uraian_biaya_administrasi.\"Unit_organisasi_satker\",
        sakip.uraian_biaya_administrasi.\"Penyusunan_biaya_administrasi\",
        sakip.uraian_biaya_administrasi.alokasi_dana AS alokasi_dana_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.\"Kegiatan\" AS kegiatan_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.waktu_pelaksanaan,
        sakip.uraian_biaya_administrasi.jenis_pengadaan,
        sakip.uraian_biaya_administrasi.satuan_ukur AS satuan_ukur_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.status AS status_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.keterangan AS keterangan_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.kebutuhan_biaya_pengadaan,
        sakip.uraian_biaya_administrasi.pagu_anggaran,
        sakip.uraian_biaya_administrasi.biaya_administrasi,
        sakip.uraian_biaya_administrasi.biaya_fisik,
        sakip.syarat_teknis_spesifikasi.kementrian_negara,
        sakip.syarat_teknis_spesifikasi.unit_organisasi_satker AS unit_organisasi_satker_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.kegiatan AS kegiatan_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.keluaran AS keluaran_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.datil_kegiatan,
        sakip.syarat_teknis_spesifikasi.volume AS volume_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.satuan_ukur AS satuan_ukur_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.alokasi_dana AS alokasi_dana_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.status AS status_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.keterangan AS keterangan_syarat_teknis_spesifikasi,
        sakip.gambar_denah.kementrian_negara AS kementrian_negara_gambar_denah,
        sakip.gambar_denah.unit_organisasi_satker AS unit_organisasi_satker_gambar_denah,
        sakip.gambar_denah.kegiatan AS kegiatan_gambar_denah,
        sakip.gambar_denah.keluaran AS keluaran_gambar_denah,
        sakip.gambar_denah.detil_kegiatan AS detail_kegiatan_gambar_denah,
        sakip.gambar_denah.volume AS volume_gambar_denah,
        sakip.gambar_denah.satuan_ukur as satuan_ukur_gambar_denah,
        sakip.gambar_denah.alokasi_dana as alokasi_dana_gambar_denah,
        sakip.gambar_denah.upload_gambar as upload_gambar_gambar_denah,
        sakip.gambar_denah.status as status_gambar_denah,
        sakip.gambar_denah.keterangan as keterangan_gambar_denah,
        sakip.bagan_organisasi.upload_bagan_organisasi as upload_bagan_organisasi_gambar_denah,
        sakip.bagan_organisasi.keterangan as keterangan_gambar_denah,
        sakip.bagan_organisasi.status as status_gambar_denah,
        sakip.surat_pernyataan_mutlak.yang_bertanggung_jawab as yang_bertanggung_jawab_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.upload_surat_pernyataan as upload_surat_pernyataan_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.\"Jabatan\" as jabatan_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.status as status_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.keterangan as keterangan_surat_pernyataan_mutlak
        FROM
        sakip.rencana_kegiatan
        LEFT JOIN sakip.master_rencana_program_rengiat ON sakip.master_rencana_program_rengiat.id_rencana_program_rengiat = sakip.rencana_kegiatan.id_rencana_program_rengiat
        LEFT JOIN sakip.kerangka_acuan_kegiatan ON sakip.kerangka_acuan_kegiatan.id_kerangka_acuan_kegiatan = sakip.rencana_kegiatan.id_kerangka_acuan_kegiatan
        LEFT JOIN sakip.master_penyaluran_anggaran ON sakip.master_penyaluran_anggaran.id_master_penyaluran_anggaran = sakip.rencana_kegiatan.id_master_penyaluran_anggaran
        LEFT JOIN sakip.uraian_kegiatan_rincian_biaya ON sakip.uraian_kegiatan_rincian_biaya.id_uraian_kegiatan_rincian_biaya = sakip.rencana_kegiatan.id_uraian_kegiatan_rincian_biaya
        LEFT JOIN sakip.uraian_biaya_administrasi ON sakip.uraian_biaya_administrasi.id_uraian_biaya_administrasi = sakip.rencana_kegiatan.id_uraian_biaya_administrasi
        LEFT JOIN sakip.syarat_teknis_spesifikasi ON sakip.syarat_teknis_spesifikasi.id_syarat_teknis = sakip.rencana_kegiatan.id_syarat_teknis
        LEFT JOIN sakip.gambar_denah ON sakip.rencana_kegiatan.id_gambar_denah = sakip.gambar_denah.id_gambar_denah
        LEFT JOIN sakip.bagan_organisasi ON sakip.rencana_kegiatan.id_bagan_organisasi = sakip.bagan_organisasi.id_bagan_organisasi
        LEFT JOIN sakip.surat_pernyataan_mutlak ON sakip.rencana_kegiatan.id_surat_pernyataan_mutlak = sakip.surat_pernyataan_mutlak.id_surat_pernyataan_mutlak
        WHERE
        sakip.rencana_kegiatan.id_perencanaan_kegiatan = ".$id.""))->first();

        if(!empty($pnbp->id_kerangka_acuan_kegiatan)){
            $waktu_pelaksanaan = WaktuPelaksanaan::where('waktu_pelaksanaan.id_waktu_pelaksanaan', '=', $pnbp->id_kerangka_acuan_kegiatan)->get();
        }else{
            $waktu_pelaksanaan = array();
        }
        if(!empty($pnbp->id_uraian_kegiatan_rincian_biaya)){
            $rincian_anggaran_biaya = RincianAnggaranBiaya::where('rincian_anggaran_biaya.id_rincian_anggaran_biaya','=',$pnbp->id_uraian_kegiatan_rincian_biaya)->get();
        }else{
            $rincian_anggaran_biaya = array();
        }
        if(!empty($pnbp->id_uraian_kegiatan_rincian_biaya)){
            $uraian_lengkap_biaya_administrasi = UraianLengkapBiayaAdministrasi::where('uraian_lengkap_biaya_administrasi.id_uraian_lengkap','=',$pnbp->id_uraian_biaya_administrasi)->get();
        }else{
            $uraian_lengkap_biaya_administrasi = array();
        }
        if(!empty($pnbp->id_uraian_kegiatan_rincian_biaya)){
            $tabel_spesifikasi = TableSpesifikasi::where('table_spesifikasi.id_table_spesifikasi','=',$pnbp->id_syarat_teknis)->get();
        }else{
            $tabel_spesifikasi = array();
        }


        $getidkalakgiat = DB :: select("select * from rencana_kegiatan where id_perencanaan_kegiatan = '".$id."' ");
        foreach ($getidkalakgiat as $value) {
            $id_kalakgiat = $value->id_surat_pengantar_kalakgiat;
            $id_file = $value->id_file_rencana_kegiatan;
        }
        if(!empty($id_kalakgiat)){

            $kalakgiat = DB :: select("select * from kalakgiat where id_kalakgiat = '".$id_kalakgiat."' ");
            $tembusan = DB :: select("select * from tembusan_kalakgiat where id_kalakgiat = '".$id_kalakgiat."' ");

            $id_file_rencana_kegiatan = DB :: select("select * from file_rencana_kegiatan where id = '".$id_file."' ");

            return view('laporan_rengiat.view_pnbp', compact('id','pnbp','waktu_pelaksanaan','rincian_anggaran_biaya','uraian_lengkap_biaya_administrasi','syarat_teknis_spesifikasi','gambar_denah','bagan_organisasi','surat_pernyataan_mutlak','syarat_teknis_spesifikasi','tabel_spesifikasi','kalakgiat','tembusan','id_file_rencana_kegiatan'));
        }
        else{

        return view('laporan_rengiat.view_pnbp', compact('id','pnbp','waktu_pelaksanaan','rincian_anggaran_biaya','uraian_lengkap_biaya_administrasi','syarat_teknis_spesifikasi','gambar_denah','bagan_organisasi','surat_pernyataan_mutlak','syarat_teknis_spesifikasi','tabel_spesifikasi'));

        }

    }


     public function checklist_pnbp($id)
    {
        $notif = DB::select("delete from notif where id_keterangan ='".$id."' and keterangan = 'RENGIAT'");

        $pnbp = collect(\DB::select("SELECT
        sakip.rencana_kegiatan.id_perencanaan_kegiatan,
        sakip.rencana_kegiatan.feedback,
        sakip.rencana_kegiatan.id_perencanaan_kegiatan,
        sakip.rencana_kegiatan.keluaran,
        sakip.rencana_kegiatan.detail_kegiatan,
        sakip.rencana_kegiatan.alokasi_anggaran,
        sakip.rencana_kegiatan.alokasi_anggaran_fisik,
        sakip.rencana_kegiatan.alokasi_anggaran_biaya_administrasi,
        sakip.rencana_kegiatan.catatan,
        sakip.rencana_kegiatan.keterangan,
        sakip.rencana_kegiatan.status,
        sakip.rencana_kegiatan.id_surat_pengantar_kalakgiat,
        sakip.rencana_kegiatan.id_kerangka_acuan_kegiatan,
        sakip.rencana_kegiatan.id_uraian_kegiatan_rincian_biaya,
        sakip.rencana_kegiatan.id_syarat_teknis,
        sakip.rencana_kegiatan.id_gambar_denah,
        sakip.rencana_kegiatan.id_bagan_organisasi,
        sakip.rencana_kegiatan.id_surat_pernyataan_mutlak,
        sakip.rencana_kegiatan.id_rencana_kegiatan,
        sakip.rencana_kegiatan.id_rencana_program_rengiat,
        sakip.rencana_kegiatan.id_uraian_biaya_administrasi,
        sakip.rencana_kegiatan.id_kegiatan_perencanaan,
        sakip.rencana_kegiatan.id_sub_kegiatan,
        sakip.rencana_kegiatan.id_sub_kategori_akun,
        sakip.rencana_kegiatan.tanggal_rencana,
        sakip.rencana_kegiatan.id_user,
        sakip.rencana_kegiatan.akun,
        sakip.master_rencana_program_rengiat.rencana_program_rengiat,
        sakip.master_rencana_program_rengiat.status AS status_master_rencana_program_rengiat,
        sakip.master_rencana_program_rengiat.keterangan AS keterangan_master_rencana_program_rengiat,
        sakip.kerangka_acuan_kegiatan.kementrian_negara_lembaga,
        sakip.kerangka_acuan_kegiatan.id_program,
        sakip.kerangka_acuan_kegiatan.id_kegiatan,
        sakip.kerangka_acuan_kegiatan.indikator_kinerja_kegiatan,
        sakip.kerangka_acuan_kegiatan.jenis_keluaran,
        sakip.kerangka_acuan_kegiatan.volume_keluaran,
        sakip.kerangka_acuan_kegiatan.dasar_hukum,
        sakip.kerangka_acuan_kegiatan.gambaran_umum,
        sakip.kerangka_acuan_kegiatan.penerimaan_manfaat,
        sakip.kerangka_acuan_kegiatan.metode_pelaksanaan,
        sakip.kerangka_acuan_kegiatan.waktu_pelaksanaan,
        sakip.kerangka_acuan_kegiatan.waktu_pencapaian_keluaran,
        sakip.kerangka_acuan_kegiatan.biaya_yang_diperlukan,
        sakip.kerangka_acuan_kegiatan.keterangan AS keterangan_kerangka_acuan_kegiatan,
        sakip.kerangka_acuan_kegiatan.status AS status_kerangka_acuan_kegiatan,
        sakip.kerangka_acuan_kegiatan.hasil,
        sakip.kerangka_acuan_kegiatan.waktu_pelaksanaan,
        sakip.master_penyaluran_anggaran.penyaluran_anggaran,
        sakip.master_penyaluran_anggaran.keterangan AS keterangan_master_penyaluran_anggaran,
        sakip.master_penyaluran_anggaran.status AS status_master_penyaluran_anggaran,
        sakip.uraian_kegiatan_rincian_biaya.kementrian_negara_lembaga AS kementrian_negara_lembaga_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.unit_organisasi_satker,
        sakip.uraian_kegiatan_rincian_biaya.kegiatan AS kegiatan_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.keluaran AS keluaran_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.detil_kegiatan,
        sakip.uraian_kegiatan_rincian_biaya.volume,
        sakip.uraian_kegiatan_rincian_biaya.satuan_ukur,
        sakip.uraian_kegiatan_rincian_biaya.alokasi_dana,
        sakip.uraian_kegiatan_rincian_biaya.keterangan AS keterangan_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.status AS status_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.total_biaya_administrasi,
        sakip.uraian_kegiatan_rincian_biaya.total_biaya_fisik,
        sakip.uraian_kegiatan_rincian_biaya.\"Total_keseluruhan\",
        sakip.uraian_kegiatan_rincian_biaya.id_rincian_anggaran_biaya,
        sakip.uraian_kegiatan_rincian_biaya.program AS program_uraian_kegiatan_rincian_biaya,
        sakip.uraian_biaya_administrasi.\"Unit_organisasi_satker\",
        sakip.uraian_biaya_administrasi.\"Penyusunan_biaya_administrasi\",
        sakip.uraian_biaya_administrasi.alokasi_dana AS alokasi_dana_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.\"Kegiatan\" AS kegiatan_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.waktu_pelaksanaan,
        sakip.uraian_biaya_administrasi.jenis_pengadaan,
        sakip.uraian_biaya_administrasi.satuan_ukur AS satuan_ukur_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.status AS status_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.keterangan AS keterangan_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.kebutuhan_biaya_pengadaan,
        sakip.uraian_biaya_administrasi.pagu_anggaran,
        sakip.uraian_biaya_administrasi.biaya_administrasi,
        sakip.uraian_biaya_administrasi.biaya_fisik,
        sakip.syarat_teknis_spesifikasi.kementrian_negara,
        sakip.syarat_teknis_spesifikasi.unit_organisasi_satker AS unit_organisasi_satker_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.kegiatan AS kegiatan_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.keluaran AS keluaran_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.datil_kegiatan,
        sakip.syarat_teknis_spesifikasi.volume AS volume_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.satuan_ukur AS satuan_ukur_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.alokasi_dana AS alokasi_dana_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.status AS status_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.keterangan AS keterangan_syarat_teknis_spesifikasi,
        sakip.gambar_denah.kementrian_negara AS kementrian_negara_gambar_denah,
        sakip.gambar_denah.unit_organisasi_satker AS unit_organisasi_satker_gambar_denah,
        sakip.gambar_denah.kegiatan AS kegiatan_gambar_denah,
        sakip.gambar_denah.keluaran AS keluaran_gambar_denah,
        sakip.gambar_denah.detil_kegiatan AS detail_kegiatan_gambar_denah,
        sakip.gambar_denah.volume AS volume_gambar_denah,
        sakip.gambar_denah.satuan_ukur as satuan_ukur_gambar_denah,
        sakip.gambar_denah.alokasi_dana as alokasi_dana_gambar_denah,
        sakip.gambar_denah.upload_gambar as upload_gambar_gambar_denah,
        sakip.gambar_denah.status as status_gambar_denah,
        sakip.gambar_denah.keterangan as keterangan_gambar_denah,
        sakip.bagan_organisasi.upload_bagan_organisasi as upload_bagan_organisasi_gambar_denah,
        sakip.bagan_organisasi.keterangan as keterangan_gambar_denah,
        sakip.bagan_organisasi.status as status_gambar_denah,
        sakip.surat_pernyataan_mutlak.yang_bertanggung_jawab as yang_bertanggung_jawab_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.upload_surat_pernyataan as upload_surat_pernyataan_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.\"Jabatan\" as jabatan_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.status as status_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.keterangan as keterangan_surat_pernyataan_mutlak
        FROM
        sakip.rencana_kegiatan
        LEFT JOIN sakip.master_rencana_program_rengiat ON sakip.master_rencana_program_rengiat.id_rencana_program_rengiat = sakip.rencana_kegiatan.id_rencana_program_rengiat
        LEFT JOIN sakip.kerangka_acuan_kegiatan ON sakip.kerangka_acuan_kegiatan.id_kerangka_acuan_kegiatan = sakip.rencana_kegiatan.id_kerangka_acuan_kegiatan
        LEFT JOIN sakip.master_penyaluran_anggaran ON sakip.master_penyaluran_anggaran.id_master_penyaluran_anggaran = sakip.rencana_kegiatan.id_master_penyaluran_anggaran
        LEFT JOIN sakip.uraian_kegiatan_rincian_biaya ON sakip.uraian_kegiatan_rincian_biaya.id_uraian_kegiatan_rincian_biaya = sakip.rencana_kegiatan.id_uraian_kegiatan_rincian_biaya
        LEFT JOIN sakip.uraian_biaya_administrasi ON sakip.uraian_biaya_administrasi.id_uraian_biaya_administrasi = sakip.rencana_kegiatan.id_uraian_biaya_administrasi
        LEFT JOIN sakip.syarat_teknis_spesifikasi ON sakip.syarat_teknis_spesifikasi.id_syarat_teknis = sakip.rencana_kegiatan.id_syarat_teknis
        LEFT JOIN sakip.gambar_denah ON sakip.rencana_kegiatan.id_gambar_denah = sakip.gambar_denah.id_gambar_denah
        LEFT JOIN sakip.bagan_organisasi ON sakip.rencana_kegiatan.id_bagan_organisasi = sakip.bagan_organisasi.id_bagan_organisasi
        LEFT JOIN sakip.surat_pernyataan_mutlak ON sakip.rencana_kegiatan.id_surat_pernyataan_mutlak = sakip.surat_pernyataan_mutlak.id_surat_pernyataan_mutlak
        WHERE
        sakip.rencana_kegiatan.id_perencanaan_kegiatan = ".$id.""))->first();

        if(!empty($pnbp->id_kerangka_acuan_kegiatan)){
            $waktu_pelaksanaan = WaktuPelaksanaan::where('waktu_pelaksanaan.id_waktu_pelaksanaan', '=', $pnbp->id_kerangka_acuan_kegiatan)->get();
        }else{
            $waktu_pelaksanaan = array();
        }
        if(!empty($pnbp->id_uraian_kegiatan_rincian_biaya)){
            $rincian_anggaran_biaya = RincianAnggaranBiaya::where('rincian_anggaran_biaya.id_rincian_anggaran_biaya','=',$pnbp->id_uraian_kegiatan_rincian_biaya)->get();
        }else{
            $rincian_anggaran_biaya = array();
        }
        if(!empty($pnbp->id_uraian_kegiatan_rincian_biaya)){
            $uraian_lengkap_biaya_administrasi = UraianLengkapBiayaAdministrasi::where('uraian_lengkap_biaya_administrasi.id_uraian_lengkap','=',$pnbp->id_uraian_biaya_administrasi)->get();
        }else{
            $uraian_lengkap_biaya_administrasi = array();
        }
        if(!empty($pnbp->id_uraian_kegiatan_rincian_biaya)){
            $tabel_spesifikasi = TableSpesifikasi::where('table_spesifikasi.id_table_spesifikasi','=',$pnbp->id_syarat_teknis)->get();
        }else{
            $tabel_spesifikasi = array();
        }


       $getidkalakgiat = DB :: select("select * from rencana_kegiatan where id_perencanaan_kegiatan = '".$id."' ");
        foreach ($getidkalakgiat as $value) {
            $id_kalakgiat = $value->id_surat_pengantar_kalakgiat;
            $id_file = $value->id_file_rencana_kegiatan;
        }

        if(!empty($id_kalakgiat)){

            $kalakgiat = DB :: select("select * from kalakgiat where id_kalakgiat = '".$id_kalakgiat."' ");
            $tembusan = DB :: select("select * from tembusan_kalakgiat where id_kalakgiat = '".$id_kalakgiat."' ");

            $id_file_rencana_kegiatan = DB :: select("select * from file_rencana_kegiatan where id = '".$id_file."' ");

            return view('laporan_rengiat.checklist_pnbp', compact('id','pnbp','waktu_pelaksanaan','rincian_anggaran_biaya','uraian_lengkap_biaya_administrasi','syarat_teknis_spesifikasi','gambar_denah','bagan_organisasi','surat_pernyataan_mutlak','syarat_teknis_spesifikasi','tabel_spesifikasi','kalakgiat','tembusan','id_file_rencana_kegiatan'));
        }
        else{

        return view('laporan_rengiat.checklist_pnbp', compact('id','pnbp','waktu_pelaksanaan','rincian_anggaran_biaya','uraian_lengkap_biaya_administrasi','syarat_teknis_spesifikasi','gambar_denah','bagan_organisasi','surat_pernyataan_mutlak','syarat_teknis_spesifikasi','tabel_spesifikasi'));

        }
    }




    public function view_pnbp_cetak($id)
    {
        $pnbp = collect(\DB::select("SELECT
        sakip.rencana_kegiatan.id_perencanaan_kegiatan,
        sakip.rencana_kegiatan.id_perencanaan_kegiatan,
        sakip.rencana_kegiatan.keluaran,
        sakip.rencana_kegiatan.detail_kegiatan,
        sakip.rencana_kegiatan.alokasi_anggaran,
        sakip.rencana_kegiatan.alokasi_anggaran_fisik,
        sakip.rencana_kegiatan.alokasi_anggaran_biaya_administrasi,
        sakip.rencana_kegiatan.catatan,
        sakip.rencana_kegiatan.keterangan,
        sakip.rencana_kegiatan.status,
        sakip.rencana_kegiatan.id_surat_pengantar_kalakgiat,
        sakip.rencana_kegiatan.id_kerangka_acuan_kegiatan,
        sakip.rencana_kegiatan.id_uraian_kegiatan_rincian_biaya,
        sakip.rencana_kegiatan.id_syarat_teknis,
        sakip.rencana_kegiatan.id_gambar_denah,
        sakip.rencana_kegiatan.id_bagan_organisasi,
        sakip.rencana_kegiatan.id_surat_pernyataan_mutlak,
        sakip.rencana_kegiatan.id_rencana_kegiatan,
        sakip.rencana_kegiatan.id_rencana_program_rengiat,
        sakip.rencana_kegiatan.id_uraian_biaya_administrasi,
        sakip.rencana_kegiatan.id_kegiatan_perencanaan,
        sakip.rencana_kegiatan.id_sub_kegiatan,
        sakip.rencana_kegiatan.id_sub_kategori_akun,
        sakip.rencana_kegiatan.tanggal_rencana,
        sakip.rencana_kegiatan.id_user,
        sakip.rencana_kegiatan.akun,
        sakip.master_rencana_program_rengiat.rencana_program_rengiat,
        sakip.master_rencana_program_rengiat.status AS status_master_rencana_program_rengiat,
        sakip.master_rencana_program_rengiat.keterangan AS keterangan_master_rencana_program_rengiat,
        sakip.kerangka_acuan_kegiatan.kementrian_negara_lembaga,
        sakip.kerangka_acuan_kegiatan.id_program,
        sakip.kerangka_acuan_kegiatan.id_kegiatan,
        sakip.kerangka_acuan_kegiatan.indikator_kinerja_kegiatan,
        sakip.kerangka_acuan_kegiatan.jenis_keluaran,
        sakip.kerangka_acuan_kegiatan.volume_keluaran,
        sakip.kerangka_acuan_kegiatan.dasar_hukum,
        sakip.kerangka_acuan_kegiatan.gambaran_umum,
        sakip.kerangka_acuan_kegiatan.penerimaan_manfaat,
        sakip.kerangka_acuan_kegiatan.metode_pelaksanaan,
        sakip.kerangka_acuan_kegiatan.waktu_pelaksanaan,
        sakip.kerangka_acuan_kegiatan.waktu_pencapaian_keluaran,
        sakip.kerangka_acuan_kegiatan.biaya_yang_diperlukan,
        sakip.kerangka_acuan_kegiatan.keterangan AS keterangan_kerangka_acuan_kegiatan,
        sakip.kerangka_acuan_kegiatan.status AS status_kerangka_acuan_kegiatan,
        sakip.kerangka_acuan_kegiatan.hasil,
        sakip.kerangka_acuan_kegiatan.waktu_pelaksanaan,
        sakip.master_penyaluran_anggaran.penyaluran_anggaran,
        sakip.master_penyaluran_anggaran.keterangan AS keterangan_master_penyaluran_anggaran,
        sakip.master_penyaluran_anggaran.status AS status_master_penyaluran_anggaran,
        sakip.uraian_kegiatan_rincian_biaya.kementrian_negara_lembaga AS kementrian_negara_lembaga_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.unit_organisasi_satker,
        sakip.uraian_kegiatan_rincian_biaya.kegiatan AS kegiatan_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.keluaran AS keluaran_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.detil_kegiatan,
        sakip.uraian_kegiatan_rincian_biaya.volume,
        sakip.uraian_kegiatan_rincian_biaya.satuan_ukur,
        sakip.uraian_kegiatan_rincian_biaya.alokasi_dana,
        sakip.uraian_kegiatan_rincian_biaya.keterangan AS keterangan_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.status AS status_uraian_kegiatan_rincian_biaya,
        sakip.uraian_kegiatan_rincian_biaya.total_biaya_administrasi,
        sakip.uraian_kegiatan_rincian_biaya.total_biaya_fisik,
        sakip.uraian_kegiatan_rincian_biaya.\"Total_keseluruhan\",
        sakip.uraian_kegiatan_rincian_biaya.id_rincian_anggaran_biaya,
        sakip.uraian_kegiatan_rincian_biaya.program AS program_uraian_kegiatan_rincian_biaya,
        sakip.uraian_biaya_administrasi.\"Unit_organisasi_satker\",
        sakip.uraian_biaya_administrasi.\"Penyusunan_biaya_administrasi\",
        sakip.uraian_biaya_administrasi.alokasi_dana AS alokasi_dana_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.\"Kegiatan\" AS kegiatan_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.waktu_pelaksanaan,
        sakip.uraian_biaya_administrasi.jenis_pengadaan,
        sakip.uraian_biaya_administrasi.satuan_ukur AS satuan_ukur_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.status AS status_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.keterangan AS keterangan_uraian_biaya_administrasi,
        sakip.uraian_biaya_administrasi.kebutuhan_biaya_pengadaan,
        sakip.uraian_biaya_administrasi.pagu_anggaran,
        sakip.uraian_biaya_administrasi.biaya_administrasi,
        sakip.uraian_biaya_administrasi.biaya_fisik,
        sakip.syarat_teknis_spesifikasi.kementrian_negara,
        sakip.syarat_teknis_spesifikasi.unit_organisasi_satker AS unit_organisasi_satker_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.kegiatan AS kegiatan_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.keluaran AS keluaran_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.datil_kegiatan,
        sakip.syarat_teknis_spesifikasi.volume AS volume_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.satuan_ukur AS satuan_ukur_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.alokasi_dana AS alokasi_dana_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.status AS status_syarat_teknis_spesifikasi,
        sakip.syarat_teknis_spesifikasi.keterangan AS keterangan_syarat_teknis_spesifikasi,
        sakip.gambar_denah.kementrian_negara AS kementrian_negara_gambar_denah,
        sakip.gambar_denah.unit_organisasi_satker AS unit_organisasi_satker_gambar_denah,
        sakip.gambar_denah.kegiatan AS kegiatan_gambar_denah,
        sakip.gambar_denah.keluaran AS keluaran_gambar_denah,
        sakip.gambar_denah.detil_kegiatan AS detail_kegiatan_gambar_denah,
        sakip.gambar_denah.volume AS volume_gambar_denah,
        sakip.gambar_denah.satuan_ukur as satuan_ukur_gambar_denah,
        sakip.gambar_denah.alokasi_dana as alokasi_dana_gambar_denah,
        sakip.gambar_denah.upload_gambar as upload_gambar_gambar_denah,
        sakip.gambar_denah.status as status_gambar_denah,
        sakip.gambar_denah.keterangan as keterangan_gambar_denah,
        sakip.bagan_organisasi.upload_bagan_organisasi as upload_bagan_organisasi_gambar_denah,
        sakip.bagan_organisasi.keterangan as keterangan_gambar_denah,
        sakip.bagan_organisasi.status as status_gambar_denah,
        sakip.surat_pernyataan_mutlak.yang_bertanggung_jawab as yang_bertanggung_jawab_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.upload_surat_pernyataan as upload_surat_pernyataan_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.\"Jabatan\" as jabatan_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.status as status_surat_pernyataan_mutlak,
        sakip.surat_pernyataan_mutlak.keterangan as keterangan_surat_pernyataan_mutlak
        FROM
        sakip.rencana_kegiatan
        LEFT JOIN sakip.master_rencana_program_rengiat ON sakip.master_rencana_program_rengiat.id_rencana_program_rengiat = sakip.rencana_kegiatan.id_rencana_program_rengiat
        LEFT JOIN sakip.kerangka_acuan_kegiatan ON sakip.kerangka_acuan_kegiatan.id_kerangka_acuan_kegiatan = sakip.rencana_kegiatan.id_kerangka_acuan_kegiatan
        LEFT JOIN sakip.master_penyaluran_anggaran ON sakip.master_penyaluran_anggaran.id_master_penyaluran_anggaran = sakip.rencana_kegiatan.id_master_penyaluran_anggaran
        LEFT JOIN sakip.uraian_kegiatan_rincian_biaya ON sakip.uraian_kegiatan_rincian_biaya.id_uraian_kegiatan_rincian_biaya = sakip.rencana_kegiatan.id_uraian_kegiatan_rincian_biaya
        LEFT JOIN sakip.uraian_biaya_administrasi ON sakip.uraian_biaya_administrasi.id_uraian_biaya_administrasi = sakip.rencana_kegiatan.id_uraian_biaya_administrasi
        LEFT JOIN sakip.syarat_teknis_spesifikasi ON sakip.syarat_teknis_spesifikasi.id_syarat_teknis = sakip.rencana_kegiatan.id_syarat_teknis
        LEFT JOIN sakip.gambar_denah ON sakip.rencana_kegiatan.id_gambar_denah = sakip.gambar_denah.id_gambar_denah
        LEFT JOIN sakip.bagan_organisasi ON sakip.rencana_kegiatan.id_bagan_organisasi = sakip.bagan_organisasi.id_bagan_organisasi
        LEFT JOIN sakip.surat_pernyataan_mutlak ON sakip.rencana_kegiatan.id_surat_pernyataan_mutlak = sakip.surat_pernyataan_mutlak.id_surat_pernyataan_mutlak
        WHERE
        sakip.rencana_kegiatan.id_perencanaan_kegiatan = ".$id.""))->first();

        if(!empty($pnbp->id_kerangka_acuan_kegiatan)){
            $waktu_pelaksanaan = WaktuPelaksanaan::where('waktu_pelaksanaan.id_waktu_pelaksanaan', '=', $pnbp->id_kerangka_acuan_kegiatan)->get();
        }else{
            $waktu_pelaksanaan = array();
        }
        if(!empty($pnbp->id_uraian_kegiatan_rincian_biaya)){
            $rincian_anggaran_biaya = RincianAnggaranBiaya::where('rincian_anggaran_biaya.id_rincian_anggaran_biaya','=',$pnbp->id_uraian_kegiatan_rincian_biaya)->get();
        }else{
            $rincian_anggaran_biaya = array();
        }
        if(!empty($pnbp->id_uraian_kegiatan_rincian_biaya)){
            $uraian_lengkap_biaya_administrasi = UraianLengkapBiayaAdministrasi::where('uraian_lengkap_biaya_administrasi.id_uraian_lengkap','=',$pnbp->id_uraian_biaya_administrasi)->get();
        }else{
            $uraian_lengkap_biaya_administrasi = array();
        }
        if(!empty($pnbp->id_uraian_kegiatan_rincian_biaya)){
            $tabel_spesifikasi = TableSpesifikasi::where('table_spesifikasi.id_table_spesifikasi','=',$pnbp->id_syarat_teknis)->get();
        }else{
            $tabel_spesifikasi = array();
        }


        return view('laporan_rengiat.view_pnbp_cetak', compact('id','pnbp','waktu_pelaksanaan','rincian_anggaran_biaya','uraian_lengkap_biaya_administrasi','syarat_teknis_spesifikasi','gambar_denah','bagan_organisasi','surat_pernyataan_mutlak','syarat_teknis_spesifikasi','tabel_spesifikasi'));
    }


    public function feedbackrengiat(Request $request)
    {
        $id_pengirim = Auth::user()->id;
        $date = date('Y-m-d H:i:s');

        //kalakgiat
        if(empty($request->check_kalakgiat)){
            $update_kalakgiat = DB::table('kalakgiat')->where('id_kalakgiat', $request->id_surat_pengantar_kalakgiat)->update([
            'status' => 0
            ]);
        }
        else
        {
            $update_kalakgiat = DB::table('kalakgiat')->where('id_kalakgiat', $request->id_surat_pengantar_kalakgiat)->update([
            'status' => $request->check_kalakgiat
            ]);
        }

        //file rencana kegiatan
        if(empty($request->check_filerencana)){
            $update_check_filerencana = DB::table('file_rencana_kegiatan')->where('id', $request->id_file_rencana_kegiatan)->update([
            'status' => 0
            ]);
        }
        else
        {
            $update_check_filerencana = DB::table('file_rencana_kegiatan')->where('id', $request->id_file_rencana_kegiatan)->update([
            'status' => $request->check_filerencana
            ]);
        }

        //kerangka acuan kegiatan
        if(empty($request->check_kak)){
            $check_kak = DB::table('kerangka_acuan_kegiatan')->where('id_kerangka_acuan_kegiatan', $request->id_kerangka_acuan_kegiatan)->update([
            'status_' => 0
            ]);
        }
        else
        {
            $check_kak = DB::table('kerangka_acuan_kegiatan')->where('id_kerangka_acuan_kegiatan', $request->id_kerangka_acuan_kegiatan)->update([
            'status_' => $request->check_kak
            ]);
        }

        //rab
        if(empty($request->check_rab)){
            $check_rab = DB::table('uraian_kegiatan_rincian_biaya')->where('id_uraian_kegiatan_rincian_biaya', $request->id_uraian_kegiatan_rincian_biaya)->update([
            'status_' => 0
            ]);
        }
        else
        {
            $check_rab = DB::table('uraian_kegiatan_rincian_biaya')->where('id_uraian_kegiatan_rincian_biaya', $request->id_uraian_kegiatan_rincian_biaya)->update([
            'status_' => $request->check_rab
            ]);
        }

        //administrasi
        if(empty($request->check_administrasi)){
            $check_administrasi = DB::table('uraian_biaya_administrasi')->where('id_uraian_biaya_administrasi', $request->id_uraian_biaya_administrasi)->update([
            'status_' => 0
            ]);
        }
        else
        {
            $check_administrasi = DB::table('uraian_biaya_administrasi')->where('id_uraian_biaya_administrasi', $request->id_uraian_biaya_administrasi)->update([
            'status_' => $request->check_administrasi
            ]);
        }

        //syarat
        if(empty($request->check_syarat)){
            $check_syarat = DB::table('syarat_teknis_spesifikasi')->where('id_syarat_teknis', $request->id_syarat_teknis)->update([
            'status_' => 0
            ]);
        }
        else
        {
             $check_syarat = DB::table('syarat_teknis_spesifikasi')->where('id_syarat_teknis', $request->id_syarat_teknis)->update([
            'status_' => $request->check_syarat
            ]);
        }

        //gambar
        if(empty($request->check_denah)){
            $check_denah = DB::table('gambar_denah')->where('id_gambar_denah', $request->id_gambar_denah)->update([
            'status_' => 0
            ]);
        }
        else
        {
              $check_denah = DB::table('gambar_denah')->where('id_gambar_denah', $request->id_gambar_denah)->update([
            'status_' => $request->check_denah
            ]);
        }

        //bagan organisasi
        if(empty($request->check_organisasi)){
            $check_organisasi = DB::table('bagan_organisasi')->where('id_bagan_organisasi', $request->id_bagan_organisasi)->update([
            'status_' => 0
            ]);
        }
        else
        {
            $check_organisasi = DB::table('bagan_organisasi')->where('id_bagan_organisasi', $request->id_bagan_organisasi)->update([
            'status_' => $request->check_organisasi
            ]);
        }

        //mutlak
        if(empty($request->check_mutlak)){
            $check_mutlak = DB::table('surat_pernyataan_mutlak')->where('id_surat_pernyataan_mutlak', $request->id_surat_pernyataan_mutlak)->update([
            'status_' => 0
            ]);
        }
        else
        {
            $check_mutlak = DB::table('surat_pernyataan_mutlak')->where('id_surat_pernyataan_mutlak', $request->id_surat_pernyataan_mutlak)->update([
            'status_' => $request->check_mutlak
            ]);
        }

        $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $request->id)->update([
            'status_' => 1,
            'update_at' => $date,
            'feedback' => $request->feedback
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
                                                    $id_user= $listg->id_user;
                                                  }

        if(empty($id_surat_pengantar_kalakgiat) || empty($id_file_rencana_kegiatan) || empty($id_kerangka_acuan_kegiatan) || empty($id_uraian_kegiatan_rincian_biaya) || empty($id_syarat_teknis) ||empty($id_uraian_biaya_administrasi) || empty($id_gambar_denah) ||empty($id_bagan_organisasi) || empty($id_surat_pernyataan_mutlak)){


        }
        else{

        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima)
        values ('".$id_pengirim."','".$request->id."','RENGIAT','balasan rencana kegiatan','0','".$id_user."')");

            $getemail = DB::select("SELECT * from users where id = '".$id_user."'");
            foreach ($getemail as $value) {
                $email = $value->email;
                $name = $value->name;
            }

        try{
             $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('Balasan RENGIAT'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Balasan Pengajuan Rencana Kegiatan telah lengkap</h2><br><b>Oleh : '.$name.'</b><br><b>Keluaran : '.$keluaran.'</b><p>Diterima balasan pengajuan rencana kegiatan silahkan lihat aplikasi untuk aksi lebih lanjut.</p>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }
        }



        return redirect('/ceklist_rengiat');
    }


    public function terimarengiat($id)
    {
        $id_pengirim = Auth::user()->id;
        $date = date('Y-m-d H:i:s');

        $insert_rencana_kegiatan = DB::table('rencana_kegiatan')->where('id_perencanaan_kegiatan', $id)->update([
            'status_' => 3,
            'update_at' => $date,
            'feedback' => ''
        ]);


        $rengiat = DB::select("SELECT * from rencana_kegiatan where id_perencanaan_kegiatan = '".$id."'");
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
                                                    $id_user= $listg->id_user;
                                                  }

        $notif = DB::select("insert into notif (id_pengirim,id_keterangan,keterangan,pesan,status,id_penerima)
        values ('".$id_pengirim."','".$id."','RENGIAT','terima rencana kegiatan','0','".$id_user."')");

            $getemail = DB::select("SELECT * from users where id = '".$id_user."'");
            foreach ($getemail as $value) {
                $email = $value->email;
                $name = $value->name;
            }

        try{
             $https['ssl']['verify_peer'] = FALSE;
             $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far
             $transport = (new\Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername('pushidrosal.mail@gmail.com')->setPassword('Admin1234%');

             $mailer = (new\Swift_Mailer($transport));
             $message = (new\Swift_Message('RENGIAT Diterima'))
             ->setFrom(array('pushidrosal.mail@gmail.com' => 'Pushidrosal Admin'))
             ->setTo(array($email => $email ))
             ->setBody('<h2>Diterima Rencana Kegiatan telah lengkap</h2><br><b>Oleh : '.$name.'</b><br><b>Keluaran : '.$keluaran.'</b><p>Diterima rencana kegiatan silahkan lihat aplikasi untuk aksi lebih lanjut.</p>', 'text/html');
             $result = $mailer->send($message);


             }catch(\Swift_TransportException $e){
             $response = $e->getMessage() ;
             echo $response;
             }

        return redirect('/ceklist_rengiat');
    }


}
