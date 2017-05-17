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

    public function loginCheck(Request $request){
      $email = $request->email;
      $password = $request->password;
      $check =
      DB::table('pengguna')
      ->join('fungsi', 'fungsi.kode_fungsi', '=', 'pengguna.kode_fungsi')
      ->where([
          ['email_pengguna', '=', $email],
          ['password_pengguna', '=', $password]
        ])
      ->get();

      if(count($check) > 0){
        return $check;
      }
      else{
        return "not found";
      }      
    }

    public function insertPengguna(Request $request){
      $insert =
      DB::table('pengguna')
      ->insert([
        'kode_fungsi'=> $request->kode,
        'email_pengguna' => $request->email,
        'password_pengguna' => $request->password,
        'nama_pengguna' => $request->nama,
        'saldo_pengguna' => 0
      ]);
      if($insert) return "success";
      else return "failed";
    }
}