<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grup;
use App\Menu;
use App\Hakakses;
use Illuminate\Support\Facades\DB;
use Session;
use Auth; 

class HakaksesController extends Controller
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
        //
        $allgrup = Grup::all();
        return view ('setting.hakakses.index',compact('allgrup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //

        $iduser = $id;
        $menu = Menu::all();
        return view('setting.hakakses.form',compact('menu','iduser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $arr = array();
        foreach ($request->id_menu as $key => $id_menu) {
            array_push($arr,array("id_jenis_user" => $request->id_jenis_user,
                                  "id_menu" => $id_menu,
                                  "create_at" => date('Y-m-d')));
        }

        Hakakses::where('id_jenis_user',$request->id_jenis_user)->delete();
        $insert = Hakakses::insert($arr);

        if($insert){
            return redirect('/hakakses');
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
    }
}
