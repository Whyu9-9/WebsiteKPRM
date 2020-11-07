<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setting_waktu;
use App\Calon;
use App\pemilihan;
use App\pemilih;
use DB;
use PDF;

class AdminController extends Controller
{
    public function home(Request $request)
    {
        if(!$request->session()->has('user')){
           return redirect('/admin/login');
        }else{
            $count_pemilih = DB::table('pemilihs')->count()?? 0;
            $count_pemilihan = DB::table('pemilihans')->count()?? 0;
            $count_calon = DB::table('calons')->count()?? 0;
            $data_pem = DB::table('pemilihs')->limit(5) ->orderBy('created_at', 'desc')->get();
            $data_calon = DB::table('calons')->limit(5)->get();
            return view('admin.home',compact('count_pemilih','count_pemilihan','count_calon','data_pem','data_calon'));
        }
    }

     public function setting(Request $request)
    {
        if(!$request->session()->has('user')){
           return redirect('/admin/login');
        }else{
            
             $setting = setting_waktu::all();
            return view('admin.setting',compact('setting'));
        }
    }

     
    public function chart(Request $request) {
            $sql = db::table('pemilihans')->select('id_calon', 'id_pemilih')->get();
              $sqlcalons = db::table('calons')->select('id', 'nama')->get();
    
              foreach($sqlcalons as $index => $sqlcalon){
                $temp = db::table('pemilihans')->select('id_calon', 'id_pemilih')->where('id_calon', $sqlcalon->id)->get();
                $count = count($temp);
                $data[$index] = $count;
                $calon[$index] = $sqlcalon->nama;
                $temp_suara[$index] = [
                    'nama' => $sqlcalon->nama,
                    'suara' => $count
                ];
              }
                
            $data_suara = $temp_suara;
            $count_pemilihan = count($sql);
              $hasil = json_encode($data);
              $calons = json_encode($calon);
            return view('admin.chart',compact('hasil','calons','data_suara','count_pemilihan'));
        
       
    }

      public function edit_setting(setting_waktu $setting,$id)
    {
        $data = DB::table('setting_waktus')->where('id','=',$id)->limit(1)->get();
        $setting = $data[0];
        
        return view('admin.setting_edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function update_setting(Request $request, setting_waktu $setting)
    {   
        $setting->id = $request->id;
        $setting->waktu_awal = $request->waktu_awal;
        $setting->waktu_akhir = $request->waktu_akhir; 
        // $setting->save();
        
        DB::update('update setting_waktus set waktu_awal = ?,waktu_akhir = ? where id = ?', [$setting->waktu_awal,$setting->waktu_akhir,$setting->id ]);
        return redirect('admin/setting/');
    }

    public function pemilihan()
    {   
       
        $pemilih = DB::table('pemilihans')->rightJoin('pemilihs','pemilihans.id_pemilih','=','pemilihs.id')->paginate(15);
        return view('admin.pemilihan',compact('pemilih'));
    }

    public function pdf_pemilih()
    {
         $pemilih = DB::table('pemilihans')->rightJoin('pemilihs','pemilihans.id_pemilih','=','pemilihs.id')->get();
         $pdf = PDF::loadview('admin.pemilih_pdf',compact('pemilih'));
         return $pdf->download('pemilih.pdf');
    }
}
