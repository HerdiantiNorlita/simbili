<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class RekapController extends Controller
{
    function index(){
        $data['transaksi1'] = Transaksi::where('id_kamar',1)->where('jumlah_uang','>',0)->get();
        $data['transaksi2'] = Transaksi::where('id_kamar',2)->where('jumlah_uang','>',0)->get();
        return view('admin.rekap.index',$data);
    }
}
