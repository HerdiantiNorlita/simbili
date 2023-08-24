<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class AuthController extends Controller
{
    function login(){
        return view('login');
    }

    function loginProses(Request $request){

        if(Auth::attempt(['notlp' => request('notlp'), 'password' => request('password')])){
            $user =  Auth::User();

            if($user->id_kamar > 0 ){
               return redirect('user/beranda')->with('success','Login Berhasil sebagai pimpinan');

           }elseif($user->id_kamar == 0){
            return redirect('admin/beranda')->with('success','Login Berhasil sebagai pimpinan');
           }
           else{
            return back();
        }
    }else{
        return back()->with('danger','No. Tlp/Password salah');
    }
}
    

    function logout(){
     Auth::logout();
     return redirect('login')->with('danger','Berhasil keluar');
 }
}
