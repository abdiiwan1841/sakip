<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Grup;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index() 
    {
        //

         $pageTitle = 'Users';
        $user = User::join('jenis_user','jenis_user.id_jenis_user','=','users.id_jenis_user')->get();
        $url = '/user_save';
        $group = Grup::all();
        $satker = DB::table('jenis_satker')->orderBy('id_jenis_satker', 'DESC')->get();
        return view('users.index',compact('pageTitle','user','url','group', 'satker'));

        // $users = User::join('jenis_user','jenis_user.id_jenis_user','=','users.id_jenis_user')->orderBy('id','ASC')->get();
        // return View('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              $insert = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'active' => 1,
            'id_jenis_user' => $request->id_group,
            'id_satker' => 1,
            'password' => bcrypt($request->password),
            'password_real' => $request->password,
            
        ]);

        if($insert){
           
            return redirect('/users');
        }else{
            
            return redirect('/users');
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
           // $res = User::where('id',$id)->first();
           // $grup = Grup::all();
           // return View('users.form',compact('res','grup'));



           $pageTitle = 'Users';
        $user = User::join('jenis_user','jenis_user.id_jenis_user','=','users.id_jenis_user')->get();
        $url = '/user_update/'.$id;
        $res = User::find($id);
        $group = Grup::all();
        return view('users.index',compact('pageTitle','user','url','group','res'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
         $update = User::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'password_real' => $request->password,
            'id_jenis_user' => $request->id_group
        ]);

        if($update){
            return redirect('/users');
        }else{
            return redirect('/users');
        }



        // $update = User::where('id',$request->id_user)->update(['id_jenis_user' => $request->grup]);

        //  if($update){
        //     return redirect('/users');
        // }
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

        $delete = User::where('id',$id)->delete();

        if($delete){
            return redirect('/users');
        }
    }
}
