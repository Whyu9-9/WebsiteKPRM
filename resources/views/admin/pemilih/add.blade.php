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
                  <h4 class="card-title "> Tambah Pemilih</h4>
                </div>
                <div class="card-body">
                    <form action="/admin/pemilih" method="POST">
                      @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"> NIM</label>
                                    <input type="text" name="nim" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"> Nama</label>
                                    <input type="text" name="nama" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"> Angkatan</label>
                                    <input type="text" name="angkatan" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Tambah" class="btn btn-success pull-right">
                    </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
@endsection