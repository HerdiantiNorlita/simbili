<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home1;
use App\Models\Home2;

class ApiSensorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $home1 = Home1::all();
        $waktu1 = Home1::where('status_bayar',0)->count();
        $id_home1 = Home1::max('home_id');
        $power = Home1::where('home_id',$id_home1)->where('power','>',0)->first()->power;
        // dd($power);
        $rp1 = $power * 1346;

        // $t = 0.010 * 1;
        dd($rp1);
         return response()->json([
            'data' => $pzem_r,
            'message' => 'Fetch all posts',
            'success' => true
        ]);
    }

    public function store(Request $request)
    {
        // R
        $voltage1 = trim($request->voltage1);
        $current1 = trim($request->current1);
        $power1 = trim($request->power1);
        $energy1 = trim($request->energy1);
        $frequency1 = trim($request->frequency1);
        $pf1 = trim($request->pf1);

        $voltage2 = trim($request->voltage2);
        $current2 = trim($request->current2);
        $power2 = trim($request->power2);
        $energy2 = trim($request->energy2);
        $frequency2 = trim($request->frequency2);
        $pf2 = trim($request->pf2);

      
      
        $data =  Home1::create([
            "voltage" => $voltage1,
            "current" => $current1,
            "power" => $power1,
            "energy" => $energy1,
            "frequency" => $frequency1,
            "pf" => $pf1
        ]);

        $data =  Home2::create([
            "voltage" => $voltage2,
            "current" => $current2,
            "power" => $power2,
            "energy" => $energy2,
            "frequency" => $frequency2,
            "pf" => $pf2
        ]);


        return response()->json(['status' => 'success']);
    }

}
