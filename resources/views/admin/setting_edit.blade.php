@extends('admin.app')
@section('title')
    Setting
@endsection
@section('nav-pengaturan')
    active
@endsection
@section('content')
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                    <i class="material-icons">people_alt</i>
                  <h4 class="card-title "> Edit Setting</h4>
                </div>
                 <div class="card-body">
                 <form action="/admin/setting/{{$setting->id}}" method="POST">
                      @csrf
                      @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <input type="text" name="id" hidden value="{{$setting->id}}" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Awal</label>
                                    <input type="datetime" name="waktu_awal" value="{{$setting->waktu_awal}}" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"> Akhir</label>
                                    <input type="datetime" name="waktu_akhir" value="{{$setting->waktu_akhir}}" class="form-control" id="">
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