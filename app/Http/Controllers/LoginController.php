<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        session(['thongbao'=>'1']);
      session(['key'=>'']);
      if(session('email')==null)
         return view('pages.login.index'); 
      else
        return redirect()->route('monan.index');
    }

    public function logout()
    {
      session(['key'=>'']);
      session(['email'=>""]);
      return view('pages.login.index'); 
    }

    public function login(Request $request)
    {
      if(session('email')==null)
      {
         $email = $request->email;
         $password = $request->password;
         
         $user =User::where('email','Like',$email)->get();
         //dd($user);
         if(!empty($user[0]->email))
         {
            if($user[0]->password==$password)
            {
                session(['thongbao'=>'1']);
               session(['key'=>'1']);
               session(['email'=>$user[0]->email]);   
               return redirect()->route('monan.index');
            }
            else
            {
                session(['thongbao'=>'2']);
                return view('pages.login.index');
            }
         }
         else
         {
            session(['thongbao'=>'2']);
            return view('pages.login.index');
         }
      }
      else{
            return redirect()->route('monan.index');
      }
    }
}
