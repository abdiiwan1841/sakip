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

class Bank
{
      public static function listBank(){

          return  DB::select("SELECT
							users.name,
							registrasi_pelaku_usaha.tanggal_registrasi,
							registrasi_pelaku_usaha.nilai_pengajuan_pasti,
							registrasi_pelaku_usaha.nama_jenis_eksportir,
							eksportir.komoditi_ekspor,
							registrasi_pelaku_usaha.id_registrasi,
              verifikasi_pinjaman.diterima_bank,
              registrasi_pelaku_usaha.id_jenis_registrasi
							FROM
							verifikasi_pinjaman
							INNER JOIN registrasi_pelaku_usaha ON verifikasi_pinjaman.id_registrasi = registrasi_pelaku_usaha.id_registrasi
							INNER JOIN eksportir ON eksportir.id_registrasi = registrasi_pelaku_usaha.id_registrasi
              INNER JOIN repo_userdetail ON repo_userdetail.id_repo_userdetail = registrasi_pelaku_usaha.id_repo_userdetail
							INNER JOIN users ON repo_userdetail.id = users.id
							WHERE
							verifikasi_pinjaman.status = '2'");

      }

      public static function diterimaBank($id){

          return $data = DB::table('verifikasi_pinjaman')
              ->where('id_registrasi',$id)
              ->update(
                  [
                      'diterima_bank' => 1
                  ]
              );
      }

      public static function cekDiterimaBank($id){

          return DB::select("SELECT
                                Count(verifikasi_pinjaman.id_verifikasi) as jumlah
                                FROM
                                verifikasi_pinjaman
                                WHERE
                                verifikasi_pinjaman.id_registrasi = $id AND
                                verifikasi_pinjaman.diterima_bank = 1 ");
      }

      public static function getEmailUser($id){

          return DB::select("SELECT
                            users.email
                            FROM
                            users
                            INNER JOIN registrasi_pelaku_usaha ON registrasi_pelaku_usaha.id = users.id
                            WHERE
                            registrasi_pelaku_usaha.id_registrasi = $id");
      }
}