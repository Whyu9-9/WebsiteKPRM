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
                    <i class="material-icons">content_paste</i>
                  <h4 class="card-title ">  Data Pemilih</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <button class="btn btn-rose btn-round" onclick="location.href='/admin/pemilih/create'">
                     <i class="material-icons">add</i> Tambah Pemilih
                   </button> 
                   @if ($pemilih->isEmpty())
                        <div class="row">
                            <div class="col-md-12">
                              <div class="alert alert-danger">
							                  <div>Data kosong</div>
					                  	</div>
                            </div>
                        </div>
                  @else
                    <table class="table">
                      <thead class=" text-rose">
                        <th>
                          ID
                        </th>
                        <th>
                          Nama
                        </th>
                        <th>
                          Prodi
                        </th>
                        <th>
                          Password
                        </th>
                        <th>
                          Aksi
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
                              {{$i->prodi}}
                            </td>
                            <td>
                              {{$i->password}}
                            </td>
                            
                            <td class="td-actions text-left">
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm" onclick="location.href='../admin/pemilih/{{$i->id}}/edit'">
                                  <i class="material-icons">edit</i>
                                </button>
                                <form style="display:inline-block;" action="../admin/pemilih/{{$i->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                  <button type="submit" value="Delete"  rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                    <i class="material-icons">close</i>
                                  </button>
                                </form>
                                
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