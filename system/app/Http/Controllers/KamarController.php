<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Home1;
use App\Models\Home2;
use DB;

class KamarController extends Controller
{
	function index1(){
		$maxhome1 = Home1::max('home_id');
      	$data['maxhome1'] = Home1::where('home_id',$maxhome1)->first();

		$home1 = Home1::all();
		$waktu1 = Home1::where('status_bayar',0)->count();
		$id_home1 = Home1::where('energy','!=','nan')->max('home_id');
		$data['home1'] = $energy1 = Home1::where('home_id',$id_home1)->where('energy','>',0)->first();
		
		$user1 = $data['user1'] = User::where('id_kamar',1)->first();


		$last_pembayaran_id = Transaksi::where('id_kamar',1)->max('transaksi_id');
		$data['terakhir'] = Transaksi::where('transaksi_id',$last_pembayaran_id)->first();
		$get_pembayaran = Transaksi::where('transaksi_id',$last_pembayaran_id)->first()->jumlah_energy;

		$total_energy = $energy1->energy - $get_pembayaran;
		
		$data['total_home1'] = $total_energy * 1445;
		$data['energy_home1'] = $energy1->energy;
		$data['daya1'] = $energy1->power;
		$data['arus1'] = $energy1->current;


		// $data['list_transaksi'] = Transaksi::where('created_at','>',$user1->updated_at)->get();
		$data['list_transaksi'] = Transaksi::where('id_kamar',1)->where('jumlah_uang','>',0)->get();
		
		return view('admin.kamar-1.index',$data);
	}

	function bayar1(){
		$bayar = new Transaksi;
		$bayar->id_kamar = 1;
		$bayar->jumlah_energy = request('jumlah_energy');
		$bayar->jumlah_uang = request('jumlah_uang');
		$bayar->save();

		DB::table('home_1')->where('home_id','>',1)->delete();

		return back()->with('success','Pembayaran telah dilakukan');
	}


	function tagih1(){

		$user1 = User::where('id_kamar',1)->first();
		$last_pembayaran_id = Transaksi::where('id_kamar',1)->max('transaksi_id');
		$id_home1 = Home1::max('home_id');
		$energy1 = Home1::where('home_id',$id_home1)->where('energy','>',0)->first();
		$get_pembayaran = Transaksi::where('transaksi_id',$last_pembayaran_id)->first()->jumlah_energy;

		$total_energy = $energy1->energy - $get_pembayaran;
		$biaya= $total_energy * 1445;

		$pesan = "Haii ".$user1->nama.", Biaya tagihan listrik sebesar Rp.".number_format($biaya)." ,Segera lakukan pembayaran demi kenyamanan bersama.";

		$userkey = '4888efcfc685';
		$passkey = '467fd9ba6c1d7673de1cfc9b';
		$telepon = $user1->notlp;
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

		return back()->with('success','Tagihan telah dikirim');
	}

	function update1(User $user){
		$user->nama = request('nama');
		$user->notlp = request('notlp');
		$user->pin = request('pin');
		$user->asal = request('asal');
		$user->password = bcrypt(request('pin'));
		$user->handleUploadFoto();
		$user->save();
		return back()->with('success','Berhasil diupdate');
	}


	// KAMAR 2 ==============================

	function index2(){
		$maxhome2 = Home2::max('home_id');
      	$data['maxhome2'] = Home2::where('home_id',$maxhome2)->first();

		$home2 = Home2::all();
		$waktu2 = Home2::where('status_bayar',0)->count();
		$id_home2 = Home2::where('energy','!=','nan')->max('home_id');
	    $data['home2'] = $energy2 = Home1::where('home_id',$id_home2)->where('energy','>',0)->first();



		$last_pembayaran_id = Transaksi::where('id_kamar',2)
		->max('transaksi_id');
		$get_pembayaran = Transaksi::where('transaksi_id',$last_pembayaran_id)->first()->jumlah_energy;
		$data['terakhir'] = Transaksi::where('transaksi_id',$last_pembayaran_id)->first();

		$total_energy = $energy2->energy - $get_pembayaran;
		
		$data['total_home2'] = $total_energy * 1445;
		$data['energy_home2'] = $energy2->energy;

			$data['home2'] = $energy2 = Home2::where('home_id',$id_home2)->where('energy','>',0)->first();
		$data['daya2'] = $energy2->power;
		$data['arus2'] = $energy2->current;
		$data['user2'] = User::where('id_kamar',2)->first();

		$data['list_transaksi'] = Transaksi::where('id_kamar',2)->where('jumlah_uang','>',0)->get();
		return view('admin.kamar-2.index',$data);
	}

	function bayar2(){
		$bayar = new Transaksi;
		$bayar->id_kamar = 2;
		$bayar->jumlah_energy = request('jumlah_energy');
		$bayar->jumlah_uang = request('jumlah_uang');
		$bayar->save();

		DB::table('home_2')->where('home_id','>',1)->delete();

		return back();
	}


	function tagih2(){

		$user2 = User::where('id_kamar',2)->first();
		$last_pembayaran_id = Transaksi::where('id_kamar',2)->max('transaksi_id');
		$id_home2 = Home2::where('energy','!=','nan')->max('home_id');
		$energy2 = Home2::where('home_id',$id_home2)->where('energy','>',0)->first();
		$get_pembayaran = Transaksi::where('transaksi_id',$last_pembayaran_id)->first()->jumlah_energy;

		$total_energy = $energy2->energy - $get_pembayaran;
		$biaya= $total_energy * 1445;

		$pesan = "Haii ".$user2->nama.", Biaya tagihan listrik sebesar Rp.".number_format($biaya)." ,Segera lakukan pembayaran demi kenyamanan bersama.";

		$userkey = '4888efcfc685';
		$passkey = '467fd9ba6c1d7673de1cfc9b';
		$telepon = $user2->notlp;
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

		return back()->with('success','Tagihan telah dikirim');
	}

	function update2(User $user){
		$user->nama = request('nama');
		$user->notlp = request('notlp');
		$user->pin = request('pin');
		$user->asal = request('asal');
		$user->password = bcrypt(request('pin'));
		$user->handleUploadFoto();
		$user->save();
		return back()->with('success','Berhasil diupdate');
	}
}
