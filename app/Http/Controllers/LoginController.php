<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\pemilih;

class LoginController extends Controller
{
    public function login_admin(Request $request)
    {
       $user = $request->username;
       $password = $request->password;

       if(!$request->session()->has('user')){
            $data = User::where('username','=',$user)
            ->where('password','=',$password)
            ->first();
                if($data){
                      $request->session()->put('user',$data);
                        $get = $request->session()->get('user'); 
                        return redirect()->route('admin.home');   
                }else{
                   return redirect('/admin/login')->with('alert','password atau username salah');    
                }
        }else{
            return redirect()->route('admin.home');
        }
    }

    public function logout_admin(Request $request)
    {
        $request->session()->flush();
        return redirect('/admin/login');
    }

    public function login_pemilih(Request $request)
    {
       $user = $request->username;
       $password = $request->password;

       if(!$request->session()->has('pemilih')){
            $data = pemilih::where('email','=',$user)
            ->where('password','=',$password)
            ->first();
                if($data){
                      $request->session()->put('pemilih',$data);
                        $get = $request->session()->get('pemilih'); 
                        return redirect('/');   
                }else{
                   return redirect('/pemilih/login')->with('alert','password atau username salah');    
                }
        }else{
            return redirect('/');
        }
    }

    public function logout_pemilih(Request $request)
    {
        $request->session()->flush();
        return redirect('/pemilih/login');
    }
}
