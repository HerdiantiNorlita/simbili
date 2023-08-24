<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Home1;
use App\Models\Home2;
use DB;
use Auth;

class IndexController extends Controller
{
    function index(){
        return view('index');
    }


    function prosesCek(){
        $pin = request('pin');
        $cek_user = User::where('notlp',$pin)->first();

        $user = User::where('id_kamar',$cek_user->id_kamar)->first();
        $last_pembayaran_id = Transaksi::where('id_kamar',$cek_user->id_kamar)->max('transaksi_id');

        $penggunaa_terakhir = DB::table('home_'.$cek_user->id_kamar)->max('home_id');

        $energy2 = DB::table('home_'.$cek_user->id_kamar)->where('home_id',$penggunaa_terakhir)->where('energy','>',0)->first();



        $get_pembayaran = Transaksi::where('transaksi_id',$last_pembayaran_id)->first()->jumlah_energy;

        $total_energy = $energy2->energy - $get_pembayaran;
        $biaya= $total_energy * 1445;


        $pesan = "Haii ".$cek_user->nama.", Biaya tagihan listrik anda sebesar Rp.".number_format($biaya)." ,Segera lakukan pembayaran demi kenyamanan bersama.";

        $userkey = '4888efcfc685';
        $passkey = '467fd9ba6c1d7673de1cfc9b';
        $telepon = $cek_user->notlp;
        $message = $pesan;
        $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);

        return back();
    }

    function beranda(){
        $cek_user = Auth::user();
        // dd($cek_user);


        $user = User::where('id_kamar',$cek_user->id_kamar)->first();

        $maxhome = DB::table('home_'.$cek_user->id_kamar)->max('home_id');;
        $data['maxhome'] = DB::table('home_'.$cek_user->id_kamar)->where('home_id',$maxhome)->first();


        $last_pembayaran_id = Transaksi::where('id_kamar',$cek_user->id_kamar)->max('transaksi_id');

         $data['pembayaran_terakhir'] = Transaksi::where('id_kamar',$cek_user->id_kamar)
         ->where('transaksi_id',$last_pembayaran_id)->first();

        $data['list_transaksi'] = Transaksi::where('id_kamar',$cek_user->id_kamar)->get();

        $penggunaa_terakhir = DB::table('home_'.$cek_user->id_kamar)->where('energy','!=','nan')->max('home_id');

        $data['sensor'] = $energy2 = DB::table('home_'.$cek_user->id_kamar)->where('home_id',$penggunaa_terakhir)->where('energy','>',0)->first();
        $data['user2'] = Auth::user();



        $get_pembayaran = Transaksi::where('transaksi_id',$last_pembayaran_id)->first()->jumlah_energy;

        $total_energy = $energy2->energy - $get_pembayaran;
        $data['total_home2'] = $biaya= $total_energy * 1445;


        $data['total_home1'] = $total_energy * 1445;
        $data['energy_home1'] = $energy2->energy;
        $data['daya2'] = $energy2->power;
        $data['arus2'] = $energy2->current;
        return view('beranda',$data);
    }

    function hapus(){
        DB::table('home_1')->where('home_id','>',1)->delete();
        DB::table('home_2')->where('home_id','>',1)->delete();
        return back();
    }
}
