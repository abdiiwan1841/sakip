<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use View;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      View()->composer('*', function ($view)
        { if (Auth::check() == 'true') {

        $cek = Auth::User()->id;
        $usr = DB::table('users')->where('id',$cek)->first();
        $id_satker = $usr->id_satker;

        $tgl1 = DB::select("SELECT a.tanggal, b.* from sakip.master_programkerja a, sakip.upload_file_progja b
        WHERE a.id_programkerja = b.id_progja
        AND id_master_upload = 1
        AND id_sub_master_upload = 1
        AND nama_file is null
        AND a.tanggal < CURRENT_DATE + INTERVAL '-3 month'
        AND id_satker = $id_satker");

        $tgl2 = DB::select("SELECT a.tanggal, b.* from sakip.master_programkerja a, sakip.upload_file_progja b
        WHERE a.id_programkerja = b.id_progja
        AND id_master_upload = 1
        AND id_sub_master_upload = 2
        AND nama_file is null
        AND a.tanggal < CURRENT_DATE + INTERVAL '-5 month'
        AND id_satker = $id_satker");

        $tgl3 = DB::select("SELECT a.tanggal, b.* from sakip.master_programkerja a, sakip.upload_file_progja b
        WHERE a.id_programkerja = b.id_progja
        AND id_master_upload = 2
        AND id_sub_master_upload = 5
        AND nama_file is null
        AND a.tanggal < CURRENT_DATE + INTERVAL '-3 month'
        AND id_satker = $id_satker");

        $tgl4 = DB::select("SELECT a.tanggal, b.* from sakip.master_programkerja a, sakip.upload_file_progja b
        WHERE a.id_programkerja = b.id_progja
        AND id_master_upload = 2
        AND id_sub_master_upload = 6
        AND nama_file is null
        AND a.tanggal < CURRENT_DATE + INTERVAL '-3 month'
        AND id_satker = $id_satker");

        $tgl5 = DB::select("SELECT a.tanggal, b.* from sakip.master_programkerja a, sakip.upload_file_progja b
        WHERE a.id_programkerja = b.id_progja
        AND id_master_upload = 2
        AND id_sub_master_upload = 7
        AND nama_file is null
        AND a.tanggal < CURRENT_DATE + INTERVAL '-5 month'
        AND id_satker = $id_satker");

        $tgl6 = DB::select("SELECT a.tanggal, b.* from sakip.master_programkerja a, sakip.upload_file_progja b
        WHERE a.id_programkerja = b.id_progja
        AND id_master_upload = 2
        AND id_sub_master_upload = 8
        AND nama_file is null
        AND a.tanggal < CURRENT_DATE + INTERVAL '-3 month'
        AND id_satker = $id_satker");

        $tgl7 = DB::select("SELECT a.tanggal, b.* from sakip.master_programkerja a, sakip.upload_file_progja b
        WHERE a.id_programkerja = b.id_progja
        AND id_master_upload = 2
        AND id_sub_master_upload = 9
        AND nama_file is null
        AND a.tanggal < CURRENT_DATE + INTERVAL '-3 month'
        AND id_satker = $id_satker");

        $tgl8 = DB::select("SELECT a.tanggal, b.* from sakip.master_programkerja a, sakip.upload_file_progja b
        WHERE a.id_programkerja = b.id_progja
        AND id_master_upload = 3
        AND id_sub_master_upload = 10
        AND nama_file is null
        AND a.tanggal < CURRENT_DATE + INTERVAL '-1 year'
        AND id_satker = $id_satker");

        $tgl9 = DB::select("SELECT a.tanggal, b.* from sakip.master_programkerja a, sakip.upload_file_progja b
        WHERE a.id_programkerja = b.id_progja
        AND id_master_upload = 3
        AND id_sub_master_upload = 11
        AND nama_file is null
        AND a.tanggal < CURRENT_DATE + INTERVAL '-1 year'
        AND id_satker = $id_satker");

        $tgl10 = DB::select("SELECT a.tanggal, b.* from sakip.master_programkerja a, sakip.upload_file_progja b
        WHERE a.id_programkerja = b.id_progja
        AND id_master_upload = 3
        AND id_sub_master_upload = 12
        AND nama_file is null
        AND a.tanggal < CURRENT_DATE + INTERVAL '-1 year'
        AND id_satker = $id_satker");

        $tgl11 = DB::select("SELECT a.tanggal, b.* from sakip.master_programkerja a, sakip.upload_file_progja b
        WHERE a.id_programkerja = b.id_progja
        AND id_master_upload = 3
        AND id_sub_master_upload = 13
        AND nama_file is null
        AND a.tanggal < CURRENT_DATE + INTERVAL '-1 year'
        AND id_satker = $id_satker");

        $tgl12 = DB::select("SELECT a.tanggal, b.* from sakip.master_programkerja a, sakip.upload_file_progja b
        WHERE a.id_programkerja = b.id_progja
        AND id_master_upload = 3
        AND id_sub_master_upload = 14
        AND nama_file is null
        AND a.tanggal < CURRENT_DATE + INTERVAL '-1 year'
        AND id_satker = $id_satker");

        $interval = count($tgl1)+count($tgl2)+count($tgl3)+count($tgl4)+count($tgl5)+count($tgl6)+count($tgl7)+count($tgl8)+count($tgl9)+count($tgl10)+count($tgl11)+count($tgl12);


        View::share('tgl1', $tgl1);
        View::share('tgl2', $tgl2);
        View::share('tgl3', $tgl3);
        View::share('tgl4', $tgl4);
        View::share('tgl5', $tgl5);
        View::share('tgl6', $tgl6);
        View::share('tgl7', $tgl7);
        View::share('tgl8', $tgl8);
        View::share('tgl9', $tgl9);
        View::share('tgl10', $tgl10);
        View::share('tgl11', $tgl11);
        View::share('tgl12', $tgl12);
        View::share('interval', $interval);
      }
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
