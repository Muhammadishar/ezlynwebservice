<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenumpangController extends Controller{

    public function getAllHalte(){
      $halte =
      DB::table('halte')
      ->join('rute', 'rute.kode_rute', '=', 'halte.kode_rute')
      ->get();
      return $halte;
    }

    public function buyTicket(Request $request){
      $insert =
      DB::table('transaksi')
      ->insert([
        'kode_halte' => $request->kode_halte,
        'kode_pengguna' => $request->kode_pengguna,
        'kode_rute' => $request->kode_rute,
        'jml_pembelian' => 5000
      ]);
      if($insert) return "success";
      else return "failed";
    }
}
