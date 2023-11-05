<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class Controller{


    public function index(){
        if (session()->has('username')) {
            return redirect()->route('dashboard');
        }
        return view('index');
    }



    public function login_view(){
        if (session()->has('username')) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function login(Request $request) {
   
        $username = $request->input('username');
        $password = $request->input('password');
        
        $sql_login_query = "SELECT username FROM users WHERE username='$username' AND password='$password' ";
        $users = DB::select($sql_login_query);
        if ($users){
            $request->session()->put('username',$username);
            return redirect('dashboard');
        }

        else if(!$users) {
            return view('login')->with('error_message','Email atau password salah !!!');
        }   
    }


    public function register(){
        return view('register');
    }


    public function register_auth(Request $request){
        $email = $request->input('email');
        $username = $request->input('username');
        $password = $request->input('password');

        // $check_if_username_exist="SELECT username FROM users WHERE username='$username'";
            // if ($check_if_username_exist){
            //     return view('login')->with("message_duplikat_username","Username sudah ada yang menggunakan");
            // }

        $sql_register_query = "INSERT INTO users VALUES ('$username', '$email', '$password')";
        $users = DB::insert($sql_register_query);
        return view('login');
                    
    }




    public function dashboard() {

        if (session()->has('username')) {
            return view('dashboard');
        }
        return redirect()->route('login');
    }



   public function logout(){
        session()->forget('username');
        return redirect()->route('login');
   }

}
