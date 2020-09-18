<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pemilih</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Data Pemilih KPRM FISIP 2020</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
                 <th>No</th>
                 <th>NIM</th>
                 <th>Nama</th>
                 <th>Prodi</th>
				<th>Status </th>
                        
			</tr>
		</thead>
		<tbody>
			@foreach($pemilih as $i)
			<tr>
                <td>{{$loop->iteration}}</td>
                <td>
                              {{$i->nim}}
                            </td>
				 <td>
                              {{$i->nama}}
                            </td>
                            
                            <td>
                              {{$i->prodi}}
							</td>
							<td class="td-actions text-left">
                                @if ($i->id_pemilih==null)
                                    <p class="text-danger">Belum memilih</p>
                                @else
                                     <p class="text-success">Sudah memilih</p>
                                @endif
                                
                              </td>
                            
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>