<?php

namespace App\Http\Controllers;

use App\pemilih;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PemilihController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pemilih = DB::table('pemilihs')->paginate(15);
        return view('admin.pemilih.index',compact('pemilih'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pemilih.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'nim' => 'required',
            'nama' => 'required',
            'angkatan' => 'required'
        ]);

        $pemilih = new pemilih();
        $pemilih->nim = $request->nim;
        $pemilih->nama = $request->nama;
        $pemilih->email = $request->email;
        $pemilih->angkatan = $request->angkatan;
        $pemilih->password = $request->nim;    
        $pemilih->save();
        
        return redirect('admin/pemilih/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function show(pemilih $pemilih)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function edit(pemilih $pemilih)
    {
        return view('admin.pemilih.edit',compact('pemilih'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pemilih $pemilih)
    {   
        $pemilih->id = $request->id;
        $pemilih->nim = $request->nim;
        $pemilih->nama = $request->nama;
        $pemilih->email = $request->email;
        $pemilih->angkatan = $request->angkatan;    
        $pemilih->save();
        
        return redirect('admin/pemilih/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function destroy(pemilih $pemilih)
    {
        $pemilih->delete();
        return redirect('admin/pemilih/');
    }
}
