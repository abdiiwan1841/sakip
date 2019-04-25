<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Menu;
use Illuminate\Support\Facades\DB;
use Session;

class MenuController extends Controller
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

        $menu = Menu::all();
        return view('setting.menu.index',compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $url = "/menu_insert";
        return view('setting.menu.form',compact('url'));
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
         $insert = Menu::insert(["nama_menu" => $request->nama_menu,
                                 "url" => $request->url,
                                 "urutan" => $request->urutan,
                                 "icon" => $request->icon,
                                 "keterangan" => $request->ket]);


         if($insert){
            Session::flash('success','Menambah Data');
            return redirect('/menu');
         }else{
            Session::flash('failed','Menambah Data');
            return redirect('/menu');
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
        $url = "/menu_update/".$id;
        $res = Menu::where('id_menu',$id)->first();
        return view('setting.menu.form',compact('url','res'));
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

         $update = Menu::where('id_menu',$id)->update(["nama_menu" => $request->nama_menu,
                                 "url" => $request->url,
                                 "urutan" => $request->urutan,
                                 "icon" => $request->icon,
                                 "keterangan" => $request->ket]);

         if($update){
            Session::flash('success','Menambah Data');
            return redirect('/menu');
         }else{
            Session::flash('failed','Menambah Data');
            return redirect('/menu');
         }  
    }

    public function create_submenu($id)
    {
        $url = "/submenu_insert";
        $res = Menu::where('id_menu',$id)->first();
        $parent = $res->nama_menu;
        $id_parent = $res->id_menu;

        if($res->parent > 0){
            $level = 1;
        }else{  
            $level = null; 
        }
        return view('setting.menu.add',compact('url','res','parent','id_parent','level'));
    }

      public function subinsert(Request $request)
    {
         $insert = Menu::insert(["nama_menu" => $request->nama_submenu,
                                 "url" => $request->url,
                                 "urutan" => $request->urutan,
                                 "icon" => $request->icon,
                                 "keterangan" => $request->ket,
                                 "parent" => $request->id_menu,
                                 "level" => $request->level]);

         if($insert){
            Session::flash('success','Menambah Data');
            return redirect('/menu');
         }else{
            Session::flash('failed','Menambah Data');
            return redirect('/menu');
         }

    }

    public function edit_submenu($id)
    {
        $url = "/submenu_update/".$id;
        $resed = Menu::where('id_menu',$id)->first();
        $get = Menu::where('id_menu',$resed->parent)->first();
        $parent = $get->nama_menu;
        $id_parent = $get->id_menu;
        $level = $get->level;


        return view('setting.menu.add',compact('url','resed','parent','id_parent','level'));
    }

     public function subupdate($id,Request $request)
    {
         $update = Menu::where('id_menu',$id)->update(["nama_menu" => $request->nama_submenu,
                                 "url" => $request->url,
                                 "urutan" => $request->urutan,
                                 "icon" => $request->icon,
                                 "keterangan" => $request->ket,
                                 "parent" => $request->id_menu]);

         if($update){
            Session::flash('success','Menambah Data');
            return redirect('/menu');
         }else{
            Session::flash('failed','Menambah Data');
            return redirect('/menu');
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
        $delete = Menu::where('id_menu',$id)->delete();

          if($delete){
            Session::flash('success','Menghapus Data');
            return redirect('/menu');
         }else{
            Session::flash('failed','Menghapus Data');
            return redirect('/menu');
         }
    }
}
