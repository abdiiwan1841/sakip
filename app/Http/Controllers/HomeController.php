<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $kemajuan=1;


     $data=DB::table('master_programkerja')->where('id_satker',1)->join('master_programkerjadetail','master_programkerjadetail.id_programkerja','=','master_programkerja.id_programkerja')->get();


     return view('dashboard.index',compact('data','kemajuan'));
 }

 public function getdata($id,$kemajuan)
 {       


    $data=DB::table('master_programkerja')->where('id_satker',$id)->join('master_programkerjadetail','master_programkerjadetail.id_programkerja','=','master_programkerja.id_programkerja')->get();

    $program = $data[0];

    return view('dashboard.index',compact('data','kemajuan','program'));
}
}
