<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grup;
use Illuminate\Support\Facades\DB;
use Auth;
use Bauth;
use Session;

class GrupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('bauth');
    }



    public function index()
    {
        

        $grup = Grup::all();
        return view ('setting.grup.index',compact('grup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $url = "grup_insert";
         return View('setting.grup.form',compact('url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = DB::table('jenis_user')->insert([
                  'nama_jenis_user' => $request->nama_jenis_user,
                  'status' => '1',
                  'keterangan' => $request->keterangan
                  
                  
            ]);

        if($insert){
            return redirect('/grup');
        }else{
            return "gagal";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $url = "grup_update/".$id;
        $grup = Grup::where('id_jenis_user',$id)->first();
        return view ('setting.grup.form',compact('grup','url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $update = Grup::where('id_jenis_user',$id)->update(['nama_jenis_user' => $request->nama_jenis_user,
                  'status' => '1',
                  'keterangan' => $request->keterangan]);

         if($update){
            return redirect('/grup');
        }else{
            return "gagal";
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        grup::destroy($id);

        Session::flash('flash_message', 'Grup deleted!');

        return redirect('/grup');
    }
}
