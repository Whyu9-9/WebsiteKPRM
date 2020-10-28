<?php

namespace App\Http\Controllers;

use App\Calon;
use File;
use Illuminate\Http\Request;

class CalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calon = Calon::all();
        return view('admin.calon.index',compact('calon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.calon.add');
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
            'deskripsi' => 'required',
            'visi' => 'required',
            'misi' => 'required',
			'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        //simpan file
        $file = $request->file('foto');
 
        $nama_file = time()."_".$file->getClientOriginalName();
        
        //isi dengan nama folder
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);
        
        $calon = new Calon();
        $calon->nim = $request->nim;
        $calon->nama = $request->nama;
        $calon->angkatan = $request->angkatan;
        $calon->deskripsi = $request->deskripsi;
        $calon->visi = $request->visi;
        $calon->misi = $request->misi;
        $calon->foto = $nama_file;

        if(file_exists('data_file/'.$nama_file)){
             $calon->save();
            return redirect('admin/calon');
        } else{
            return redirect('admin/calon/create')->with('alert','gambar gagal upload');
        } 
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function show(Calon $calon)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function edit(Calon $calon)
    {
        $file = $calon->foto;
        return view('admin.calon.edit',compact('calon','file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calon $calon)
    {  
        $nama_file = null;
        $this->validate($request, [
            'nim' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'visi' => 'required',
            'misi' => 'required'
        ]);


        if($request->file('foto')){
               //simpan file
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $calon->foto = $nama_file;
            
        }
        
        $calon->id = $request->id;
        $calon->nim = $request->nim;
        $calon->nama = $request->nama;
        $calon->angkatan = $request->angkatan;
        $calon->deskripsi = $request->deskripsi;
        $calon->visi = $request->visi;
        $calon->misi = $request->misi;

        if($calon->save()){

            if(is_null($nama_file)){
                return redirect('admin/calon');
            }
            
            //isi dengan nama folder
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$nama_file); 

            if(file_exists('data_file/'.$nama_file)){
                
             return redirect('admin/calon');
            } else{
                return redirect('admin/calon/create')->with('alert','gambar gagal upload');
            } 
        }else{
             return redirect('admin/calon/create')->with('alert','gagal nambah data');
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calon $calon)
    {
        File::delete('data_file/'.$calon->foto);
 
        $calon->delete();
        return redirect('admin/calon');
    }
}
