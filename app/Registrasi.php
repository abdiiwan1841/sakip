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

class Registrasi
{

    public static function Create($name, $email, $password_real){

        return DB::table('users')->insert(
            [
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password_real),
                'password_real' => $password_real,
                'id_jenis_user' => 3,
                'id_satker' => 0
            ]
        );

    }

    public static function maxUser(){

        return DB::table('users')->max('id');
    }

    public static function getUser($id){

        return DB::table('users')->where('id', '=', $id)->get();
    }

    public static function confirmUser($id){

        return $data = DB::table('users')
            ->where('id',$id)
            ->update(
                [
                    'active' => 1
                ]
            );

    }
}