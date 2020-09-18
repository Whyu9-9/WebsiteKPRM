@extends('admin.app')
@section('title')
    Dashboard Admin
@endsection
@section('nav-dashboard')
    active
@endsection
@section('content')
     
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Jumlah Pemilih</p>
                  <h3 class="card-title">{!! $count_pemilih !!}
                    <small>Orang</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger"></i>
                    <a href="#pablo"> </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Suara masuk</p>
                  <h3 class="card-title">{!! $count_pemilihan !!}  <small>Suara</small></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Kandidat Calon</p>
                  <h3 class="card-title">{{ $count_calon }} <small>Orang</small></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons"></i>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Pemilih</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    @if ($data_pem->isEmpty())
                        <div class="row">
                            <div class="col-md-12">
                              <div class="alert alert-danger">
							                  <div>Data kosong</div>
					                  	</div>
                            </div>
                        </div>
                  @else
                    <thead class="text-info">
                      <th>
                          ID
                        </th>
                        <th>
                          Nama
                        </th>
                        <th>
                          Prodi
                        </th>
                    </thead>
                    <tbody>
                      @foreach ($data_pem as $i)
                      <tr>
                        <td>
                              {{$loop->iteration}}
                            </td>
                            <td>
                              {{$i->nama}}
                            </td>
                            <td>
                              {{$i->prodi}}
                            </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                     @endif
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Calon Kandidat</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    @if ($data_calon->isEmpty())
                        <div class="row">
                            <div class="col-md-12">
                              <div class="alert alert-danger">
							                  <div>Data kosong</div>
					                  	</div>
                            </div>
                        </div>
                  @else
                    <thead class="text-info">
                      <th>
                          ID
                        </th>
                        <th>
                          Nama
                        </th>
                        <th>
                          Prodi
                        </th>
                    </thead>
                    <tbody>
                      @foreach ($data_calon as $i)
                      <tr>
                        <td>
                              {{$loop->iteration}}
                            </td>
                            <td>
                              {{$i->nama}}
                            </td>
                            <td>
                              {{$i->prodi}}
                            </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                     @endif
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection