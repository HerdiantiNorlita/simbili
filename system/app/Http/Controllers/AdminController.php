<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Pengaturan;
use App\Models\Home1;
use App\Models\Home2;

class AdminController extends Controller
{
	function beranda(){

		if(Home1::count() > 100){
        Home1::where('home_id','>',1)->delete();
      }

       if(Home2::count() > 100){
        Home2::where('home_id','>',1)->delete();
      }

      $pengaturan = Pengaturan::first();


		// kamar 1
      $maxhome1 = Home1::max('home_id');
      $data['maxhome1'] = Home1::where('home_id',$maxhome1)->first();

		$home1 = Home1::all();
		$waktu1 = Home1::where('status_bayar',0)->count();
		// $id_home1 = Home1::max('home_id');
		$id_home1 = Home1::where('energy','!=','nan')->max('home_id');
		$data['home1'] = $energy1 = Home1::where('home_id',$id_home1)->where('energy','>',0)->first();
		$data['total_home1'] = $energy1->energy * $pengaturan->tarif_dasar;
		$data['energy_home1'] = $energy1->energy;
		$data['daya1'] = $energy1->power;
		$data['arus1'] = $energy1->current;
		$data['user1'] = User::where('id_kamar',1)->first();

		$home1 = Home1::all();
		$waktu1 = Home1::where('status_bayar',0)->count();
		
		$data['home1'] = $energy1 = Home1::where('home_id',$id_home1)->where('energy','>',0)->first();
		
		$data['user1'] = User::where('id_kamar',1)->first();


		$last_pembayaran_id = Transaksi::where('id_kamar',1)->max('transaksi_id');
		$get_pembayaran = Transaksi::where('transaksi_id',$last_pembayaran_id)->first()->jumlah_energy;

		$total_energy = $energy1->energy - $get_pembayaran;
		
		$data['total_home1'] = $total_energy * 1445;
		$data['energy_home1'] = $energy1->energy;


        // kamar2
        $maxhome2 = Home2::max('home_id');
      	$data['maxhome2'] = Home2::where('home_id',$maxhome2)->first();
      	
		$home2 = Home2::all();
		$waktu2 = Home2::where('status_bayar',0)->count();
		$id_home2 = Home2::where('energy','!=','nan')->max('home_id');
		$data['home2'] = $energy2 = Home2::where('home_id',$id_home2)->first();
		$data['daya2'] = $energy2->power;
		$data['arus2'] = $energy2->current;
		$data['user2'] = User::where('id_kamar',2)->first();


		$last_pembayaran_id = Transaksi::where('id_kamar',2)->max('transaksi_id');
		$get_pembayaran = Transaksi::where('transaksi_id',$last_pembayaran_id)->first()->jumlah_energy;

		$total_energy = $energy2->energy - $get_pembayaran;
		
		$data['total_home2'] = $total_energy * 1445;
		$data['energy_home2'] = $energy2->energy;

		return view('admin.beranda',$data);
	}
}
