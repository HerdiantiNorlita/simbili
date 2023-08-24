<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use bcrypt;

class PengaturanController extends Controller
{
     function index(){
        return view('admin.pengaturan.index');
    }   

    function gantiPassword(){
      $id = request('id_user');
      $new = request('new_password');
      DB::table('user')->where('user_id',$id)->update([
         'password' => bcrypt($new)
      ]);
      return redirect('logout')->with('success','Password telah diganti, silahkan masuk kembali');
    }

}
