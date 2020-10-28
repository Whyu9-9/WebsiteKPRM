@extends('admin.app')
@section('title')
    Data Pemilih
@endsection
@section('nav-pemilih')
    active
@endsection
@section('content')
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose">
                    <i class="material-icons">people_alt</i>
                  <h4 class="card-title "> Edit Pemilih</h4>
                </div>
                 <div class="card-body">
                 <form action="/admin/pemilih/{{$pemilih->id}}" method="POST">
                      @csrf
                      @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <input type="text" name="id" hidden value="{{$pemilih->id}}" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"> NIM</label>
                                    <input type="text" name="nim" value="{{$pemilih->nim}}" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"> Nama</label>
                                    <input type="text" name="nama" value="{{$pemilih->nama}}" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"> Angkatan</label>
                                    <input type="text" name="angkatan" value="{{$pemilih->angkatan}}" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Edit" class="btn btn-success pull-right">
                    </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
@endsection