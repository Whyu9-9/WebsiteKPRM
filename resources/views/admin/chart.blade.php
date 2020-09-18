@extends('admin.app')
@section('title')
    Hasil Pemilihan
@endsection
@section('nav-chart')
    active
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
          @if (!$calons==null && !$hasil==null)
              <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">how_to_vote</i>
                  </div>
                  <p class="card-category">Suara Masuk</p>
                  <h3 class="card-title">{{$count_pemilihan}}
                    <small>Suara</small>
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
            @foreach ($data_suara as $i)
                <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">how_to_vote</i>
                  </div>
                <p class="card-category">Suara {{$i['nama']}}</p>
                  <h3 class="card-title"> {{$i['suara']}}<small> Suara</small></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons"></i>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            
          </div>
          <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <canvas id="Canvass" style="color:aliceblue"></canvas>
                </div>
                          <div class="card-body">
                          <h4 class="card-title">Statistik Hasil Pemilihan</h4>
                          </div>
                          <div class="card-footer">
                          <div class="stats">
                              <i class="material-icons">access_time</i> <div id="txt">time stamp</div>
                          </div>
                          </div>
                      
                      </div>
                      
            </div>
          </div>
          @else
              
          @endif
      </div>
        </div>
      </div>
      
@endsection
@section('timer')
<script type="text/javascript">
  function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var session = "AM"
    if(h==0){
      h=12;
    }
    if(h>12){
      h=h-12;
      session="PM";
    }
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s + " " + session;
    var t = setTimeout(startTime, 500);
  }
  function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
  }
  startTime();
  </script>
    <script>
   Chart.defaults.global.defaultFontColor = "#fff";
		var color = Chart.helpers.color;
		var barChartData = {
			labels: JSON.parse({!! json_encode($calons) !!}),
			datasets: [{
                        label: 'Jumlah Pemilih',
                        barPercentage: 0.5,
                        barThickness: 100,
                        maxBarThickness: 100,
                        minBarLength: 2,
                        data: JSON.parse({!! json_encode($hasil) !!}),
                        backgroundColor: [
                        'rgba(141, 2, 31, 3)',
                        'rgba(128, 0, 0, 1)',
                        'rgba(194, 24, 7, 1)'
                        
                        ]
                    }]

		};

		window.onload = function() {
			var ctx = document.getElementById('Canvass').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					legend: {
						position: 'top',
					},
                    scaleFontColor: "#FFFFFF",
					title: {
						display: true,
						text: 'Hasil pemilihan'
					},
                    scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true
                            }
                        }],
                    yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                steps: 10,
                                stepValue: 5,
                               
                            }
                        }]
                    }
				}
			});

		};
  </script>
@endsection