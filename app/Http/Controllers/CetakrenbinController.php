<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CetakrenbinController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index($id_jawaban)
  {
    $value4 = DB::table('master_jawaban_renbin')->where('id_jawaban',$id_jawaban)->first();
    $tahap = 1;

    $no = 1;
      return view('renja.pdf.pdf', compact('value4','$id_jawaban','tahap','no'));
  }
}
