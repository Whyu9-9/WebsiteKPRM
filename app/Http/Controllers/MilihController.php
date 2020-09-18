<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calon;
use App\pemilihan;
use DB;
class MilihController extends Controller
{
     public function index(Request $request) {
          if(!$request->session()->has('pemilih')){
           return redirect('/pemilih/login');
        }else{
            $calon = Calon::all();
            $pemilih = $request->session()->get('pemilih');

            $pemilihan = pemilihan::where('id_pemilih','=',$pemilih->id)->get();
            $waktu_akhir = DB::table('setting_waktus')->pluck('waktu_akhir');
            $waktu_awal = DB::table('setting_waktus')->pluck('waktu_awal');
            $today = date("M d, Y H:i:s");
            $new = date("M d, Y H:i:s",strtotime($waktu_akhir[0]));
            $new_awal = date("M d, Y H:i:s",strtotime($waktu_awal[0]));
            //'Sep 30, 2020 00:00:00'
            //dd($new);
            if($today<=$new && $today>=$new_awal){
                $inRange=false;
            }else{
                 $inRange=true;
                 //dd($new);
            }
            $new = "'".$new."'";
            
            return view('pemilih.home',compact('calon','pemilihan','new','inRange'));
        }
    }   

     public function kandidat(Request $request,$id) {
          if(!$request->session()->has('pemilih')){
           return redirect('/pemilih/login');
        }else{
            $pemilih = $request->session()->get('pemilih');
            $pemilihan = pemilihan::where('id_pemilih','=',$pemilih->id)->get();
            $data = Calon::where('id','=',$id)->get();
            $calon = $data[0];
           
           
            return view('pemilih.kandidat',compact('calon','pemilih','pemilihan'));
        }
       
    }

    public function vote(Request $request,$id) {
          if(!$request->session()->has('pemilih')){
           return redirect('/pemilih/login');
        }else{
            $pemilihan =  new pemilihan();
            $pemilihan->id_calon = $id;
            $pemilihan->id_pemilih = $request->pemilih;
             $pemilihan->save();
            return redirect('/');
        }
       
    }

   

    
public function hasil(Request $request) {
    if(!$request->session()->has('pemilih')){
        return redirect('/pemilih/login');
 }else{
     $sqlcalons = db::table('calons')->get();

     foreach($sqlcalons as $index => $sqlcalon){
         $temp = db::table('pemilihans')->select('id_calon', 'id_pemilih')->where('id_calon', $sqlcalon->id)->get();
         $count = count($temp);
         $data[$index] = $count;
         $calon[$index] = $sqlcalon->nama;
     }
     
     $hasil = json_encode($data);
     $calons = json_encode($calon);

       return view('pemilih.hasil_vote',compact('hasil','calons'));
 }

}

    public function login() {
        return view('pemilih.login');
    }
    
}
