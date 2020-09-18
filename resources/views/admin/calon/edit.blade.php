@extends('admin.app')
@section('title')
    Data Calon Ketua
@endsection
@section('nav-calon')
    active
@endsection
@section('content')
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                    <i class="material-icons">people_alt</i>
                  <h4 class="card-title "> Edit Calon Ketua</h4>
                </div>
                <div class="card-body">
                <form action="/admin/calon/{{$calon->id}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                <input type="text" hidden name="id" class="form-control" value="{{$calon->id}}" >
                                </div>
                            </div>
                        </div>
                      <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">NIM</label>
                                <input type="text" name="nim" class="form-control" value="{{$calon->nim}}" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"> Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{$calon->nama}}" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Angkatan</label>
                                    <input type="number" name="angkatan" class="form-control" value="{{$calon->angkatan}}" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Prodi</label>
                                    <input type="text" name="prodi" class="form-control" value="{{$calon->prodi}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="fileinput fileinput-new pull-left" data-provides="fileinput">
                                     <div class="fileinput-new thumbnail img-raised">
                                     <img src="{{asset('data_file/'.$file)}}" alt="..." style="width:300px;height:300px;">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                    <div>
                                        <span class="btn btn-raised btn-round btn-default btn-file">
                                            <span class="fileinput-new">Masukin foto</span>
                                            <span class="fileinput-exists"></span>
                                            <input type="file" name="foto" accept="image/png, image/jpeg"/>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Deskripsi</label>
                                    <br>
                                    <textarea class="form-control" name="deskripsi" id="deskripsi"  rows="3">{{$calon->deskripsi}}</textarea>
                                    <script>
                                    CKEDITOR.replace('deskripsi');
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label >Visi</label>
                                    <br>
                                    <textarea class="form-control" name="visi" id="visi"  rows="3">{{$calon->visi}}</textarea>
                                    <script>
                                    CKEDITOR.replace('visi');
                                    </script>
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Misi</label>
                                    <br>
                                    <textarea class="form-control" name="misi" id="misi"  rows="3">{{$calon->misi}}</textarea>
                                    <script>
                                    CKEDITOR.replace('misi');
                                    </script>
                                </div>
                            </div>
                        </div>
                        
                        <input type="submit" value="Simpan" class="btn btn-success pull-right">
                    </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
@endsection