<?php

namespace App;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;
use Auth;
use Symfony\Component\HttpFoundation\File\File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Hash;

class Laporan
{

    public static function rekapditolak(){
 
        return DB::select("SELECT
                            users.name,
                            registrasi_pelaku_usaha.tanggal_registrasi,
                            registrasi_pelaku_usaha.nilai_pengajuan_pasti,
                            registrasi_pelaku_usaha.nama_jenis_eksportir,
                            eksportir.komoditi_ekspor
                            FROM
                            users
                            INNER JOIN repo_userdetail ON repo_userdetail.id = users.id
                            INNER JOIN registrasi_pelaku_usaha ON registrasi_pelaku_usaha.id_repo_userdetail = repo_userdetail.id_repo_userdetail
                            INNER JOIN eksportir ON eksportir.id_registrasi = registrasi_pelaku_usaha.id_registrasi
                            INNER JOIN verifikasi_pinjaman ON verifikasi_pinjaman.id_registrasi = registrasi_pelaku_usaha.id_registrasi
                            WHERE
                            verifikasi_pinjaman.status = '1'
                            ORDER BY
                            registrasi_pelaku_usaha.tanggal_registrasi DESC
                          ");

    }

    public static function rekapditerima(){


        return DB::select("SELECT
                            users.name,
                            registrasi_pelaku_usaha.tanggal_registrasi,
                            registrasi_pelaku_usaha.nilai_pengajuan_pasti,
                            registrasi_pelaku_usaha.nama_jenis_eksportir,
                            eksportir.komoditi_ekspor
                            FROM
                            users
                            INNER JOIN repo_userdetail ON repo_userdetail.id = users.id
                            INNER JOIN registrasi_pelaku_usaha ON registrasi_pelaku_usaha.id_repo_userdetail = repo_userdetail.id_repo_userdetail
                            INNER JOIN eksportir ON eksportir.id_registrasi = registrasi_pelaku_usaha.id_registrasi
                            INNER JOIN verifikasi_pinjaman ON verifikasi_pinjaman.id_registrasi = registrasi_pelaku_usaha.id_registrasi
                            WHERE 
                            verifikasi_pinjaman.status = '2'
                            ORDER BY
                            registrasi_pelaku_usaha.tanggal_registrasi DESC
                          ");
    }

    public static function rekapbelumverifikasi(){

        return DB::select("SELECT
                            users.name,
                            registrasi_pelaku_usaha.tanggal_registrasi,
                            registrasi_pelaku_usaha.nilai_pengajuan_pasti,
                            registrasi_pelaku_usaha.nama_jenis_eksportir,
                            eksportir.komoditi_ekspor
                            FROM
                            users
                            INNER JOIN repo_userdetail ON repo_userdetail.id = users.id
                            INNER JOIN registrasi_pelaku_usaha ON registrasi_pelaku_usaha.id_repo_userdetail = repo_userdetail.id_repo_userdetail
                            INNER JOIN eksportir ON eksportir.id_registrasi = registrasi_pelaku_usaha.id_registrasi
                            LEFT JOIN verifikasi_pinjaman ON verifikasi_pinjaman.id_registrasi = registrasi_pelaku_usaha.id_registrasi
                            WHERE
                            verifikasi_pinjaman.status is null
                            ORDER BY
                            registrasi_pelaku_usaha.tanggal_registrasi DESC
                          ");

    }
}