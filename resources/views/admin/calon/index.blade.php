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
                  <h4 class="card-title ">  Data Calon Ketua</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <button class="btn btn-primary btn-round" onclick="location.href='/admin/calon/create'">
                     <i class="material-icons">add</i> Tambah calon
                   </button> 
                   @if ($calon->isEmpty())
                        <div class="row">
                            <div class="col-md-12">
                              <div class="alert alert-danger">
							                  <div>Data kosong</div>
					                  	</div>
                            </div>
                        </div>
                  @else
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          No.
                        </th>
                        <th>
                          Nama
                        </th>
                        <th>
                          Angkatan
                        </th>
                        <th>
                          Aksi
                        </th>
                      </thead>
                      <tbody>
                        
                            @foreach ($calon as $i)
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
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm" onclick="location.href='../admin/calon/{{$i->id}}/edit'">
                                  <i class="material-icons">edit</i>
                                </button>
                                <form style="display:inline-block;" action="../admin/calon/{{$i->id}}" method="post">
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
                    @endif
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
@endsection