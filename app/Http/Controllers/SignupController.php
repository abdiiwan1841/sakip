<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Registrasi;
use Mail;
use Swift_Transport; 
use Swift_Message;
use Swift_Mailer;

class SignupController extends Controller
{

    
    public function index(){

        return view('signup.form');
    }

    public function cekemail(){

        return view('signup.cekmail');
    }

    public function confirm($id){

        Registrasi::confirmUser($id);
        return Redirect('login');
    }

    public function simpanRegis(Request $request){

        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        Registrasi::Create($username,$email,$password);

        $idmax = Registrasi::maxUser();

        $data = Registrasi::getUser($idmax);
        foreach ($data as $rows){
           $name = $rows->name;
           $password = $rows->password_real;
           $emailverif  = $rows->email;
        }

        //proses Send Email
        // Variable data ini yang berupa array ini akan bisa diakses di dalam "view".
        $data = ['username' => $name, 'password' => $password, 'email' => $emailverif, 'id' => $idmax];

        // "emails.hello" adalah nama view.
        Mail::send('signup.emails', $data, function ($mail) use ($data)
        {

            $mail->to($data['email'], $data['username']);
            $mail->subject('Konfirmasi Pendaftaran Akun Baru');

        });



        return Redirect('cekmail');
    }


}