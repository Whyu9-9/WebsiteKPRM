@extends('admin.app')
@section('title')
    Rekap Pemilihan
@endsection
@section('nav-pemilihan')
    active
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                    <i class="material-icons">content_paste</i>
                  <h4 class="card-title ">  Data Pemilih</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    
                   @if ($pemilih->isEmpty())
                        <div class="row">
                            <div class="col-md-12">
                              <div class="alert alert-danger">
							                  <div>Data kosong</div>
					                  	</div>
                            </div>
                        </div>
                  @else
                      <button class="btn btn-info btn-round" onclick="location.href='/admin/pemilihan_pdf'">
                     <i class="material-icons">content_paste</i>  Print Data
                   </button> 
                    <table class="table">
                      <thead class=" text-info">
                        <th>
                          ID
                        </th>
                        <th>
                          Nama
                        </th>
                        <th>
                          Angkatan
                        </th>
                        <th>
                          Status
                        </th>
                      </thead>
                      <tbody>
                        
                            @foreach ($pemilih as $i)
                              <tr>
                            <td>
                              {{$loop->iteration}}
                            </td>
                            <td>
                              {{$i->nama}}
                            </td>
                            <td>
                              {{$i->angkatan}}
                            </td>
                           
                            
                            <td class="td-actions text-left">
                                @if ($i->id_calon==null)
                                    <p class="text-danger">Belum</p>
                                @else
                                     <p class="text-success">Sudah</p>
                                @endif
                                
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                     {{$pemilih->links()}}
                    @endif
                  </div>
                  
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
@endsection