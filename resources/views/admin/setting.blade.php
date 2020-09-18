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
                    <i class="material-icons">settings_applications</i>
                  <h4 class="card-title ">  Pengaturan Waktu Pemilihan</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    
                   @if ($setting->isEmpty())
                        <div class="row">
                            <div class="col-md-12">
                              <div class="alert alert-danger">
							                  <div>Data kosong</div>
					                  	</div>
                            </div>
                        </div>
                  @else
                    <table class="table">
                      <thead class=" text-warning">
                        <th>
                          ID
                        </th>
                        <th>
                          Waktu Awal
                        </th>
                        <th>
                          Waktu Akhir
                        </th>
                        <th>
                          Aksi
                        </th>
                      </thead>
                      <tbody>
                        
                            @foreach ($setting as $i)
                              <tr>
                            <td>
                              {{$loop->iteration}}
                            </td>
                            <td>
                              {{$i->waktu_awal}}
                            </td>
                            <td>
                              {{$i->waktu_akhir}}
                            </td>
                            <td class="td-actions text-left">
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm" onclick="location.href='../admin/setting/edit/{{$i->id}}'">
                                  <i class="material-icons">edit</i>
                                </button>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
@endsection