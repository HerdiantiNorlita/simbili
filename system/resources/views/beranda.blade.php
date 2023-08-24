
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MONITORING BIAYA LISTRIK</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="favicon.ico">
	<title>ADMIN - @yield('title')</title>
	<!-- Simple bar CSS -->
	<link rel="stylesheet" href="{{url('public')}}/admin/css/simplebar.css">
	<!-- Fonts CSS -->
	<link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<!-- Icons CSS -->
	<link rel="stylesheet" href="{{url('public')}}/admin/css/feather.css">
	<!-- Date Range Picker CSS -->
	<link rel="stylesheet" href="{{url('public')}}/admin/css/daterangepicker.css">
	<!-- App CSS -->
	<link rel="stylesheet" href="{{url('public')}}/admin/css/app-light.css" id="lightTheme">
	<link rel="stylesheet" href="{{url('public')}}/admin/css/app-dark.css" id="darkTheme" disabled>
	<link rel="stylesheet" href="{{url('public')}}/fa/css/font-awesome.min.css">
</head>
<body>
	

	<div class="container">
		<div class="row items-align-baseline">

			<div class="col-md-12 mt-3 mb-3">
				<div class="card">
					<div id="head2">
						@if($maxhome->voltage == 'nan' )
						<div class="card-header text-center bg-danger">
							<h3 style="color:#ffffff">LISTRIK MATI</h3>
						</div>
						@else
						<div class="card-header text-center bg-success">
							<h3 style="color:#ffffff">LISTRIK HIDUP</h3>
						</div>
						@endif
					</div>
				</div>
			</div>


			<div class="col-md-12 col-lg-6 ">
				<div class="card eq-card items-align-baseline h-100" >

					<div class="card-header">
						<center>
							<h3>Profil User</h3>
						</center>

					</div>
					<div class="row">
						<div class="col-md-1">
							<!-- <img src="" alt=""> -->
						</div>
						<div class="col-md-qw">

							<table class="table">
								<tr>
									<th>Nama </th>
									<td>: {{ucwords($user2->nama)}}/({{$user2->pin}})</td>
								</tr>
								<tr>
									<th>Asal </th>
									<td>: {{ucwords($user2->asal)}}</td>
								</tr>
								<tr>
									<th>No Telp. </th>
									<td>: {{$user2->notlp}}</td>
								</tr>
								<tr>
									<th>Pembayaran Terakhir. </th>
									<td>: {{$pembayaran_terakhir->created_at}}</td>
								</tr>
							</table>
						</div>
					</div>
				</div> <!-- .card -->
			</div> <!-- .col -->

			<div class="col-md-6 card">
				<div class=" card-body row items-align-baseline h-100" id="body2">
					<div class="col-md-6 my-3">
						<!-- <p class="mb-0"><strong class="mb-0 text-uppercase text-muted">Alamat</strong></p> -->
						<h3>Tagihan Kamar Anda </h3>
					</div>
					<div class="col-md-6 my-4 text-center">
						<div lass="chart-box mx-4">
							<h3 class="mt-5"> <div id="kamar2"><b style="font-size: 30pt">Rp. {{number_format($total_home2)}}</b></div></h3>
							<!-- <div id="radialbarWidget"></div> -->
						</div>
					</div>
					<div class="col-md-4 border-top py-3">
						<p class="mb-1"><strong class="text-muted">Energy</strong></p>
						<h4 class="mb-0"><div id="energy2"> {{$energy_home1}}</div> kWh</h4>
						<p class="small text-muted mb-0"><span>Sekarang</span></p>
					</div> <!-- .col -->
					<div class="col-md-4 border-top py-3">
						<p class="mb-1"><strong class="text-muted">Daya</strong></p>
						<h4 class="mb-0"><div id="watt1">{{$daya2}}</div> W</h4>
						<p class="small text-muted mb-0"><span>Sekarang</span></p>
					</div> <!-- .col -->
					<div class="col-md-4 border-top py-3">
						<p class="mb-1"><strong class="text-muted">Arus</strong></p>
						<h4 class="mb-0">{{$arus2}} <br>Ampere</h4>
						<p class="small text-muted mb-0"><span>Sekarang</span></p>
					</div>  <!-- .col -->
				</div>
			</div>

			<div class="col-lg-12 mt-3">
				<div class="card">
					<div class="card-body">
						<h3>Rekap Pembayaran</h3>
						<table class="table">
							<tr>
								<th>No</th>
								<th>Tgl. Transaksi</th>
								<th>Jumlah kWh</th>
								<th>Jumlah Dibayar</th>
							</tr>
							@foreach($list_transaksi as $t)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$t->created_at}}</td>
								<td>{{$t->jumlah_energy}}</td>
								<td>Rp. {{number_format($t->jumlah_uang)}}</td>
								
							</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<a href="{{url('logout')}}" onclick="return confirm('yakin untuk keluar?')" class="btn btn-danger btn-block mt-3 mb-3"><b><i class="fa fa-sign-out"></i> KELUAR</b></a>
			</div>

		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript">

// KAMAR 1 ===================
		function head2(){
			$('#head2').load("{{url('user/beranda')}}" + ' #head2');
		}

		function body2(){
			$('#body2').load("{{url('user/beranda')}}" + ' #body2');
		}

		function form2(){
			$('#form2').load("{{url('user/beranda')}}" + ' #form2');
		}


		setInterval( ()=>{
			head2();
		}, 2000);

		setInterval( ()=>{
			body2();
		}, 1000);

		setInterval( ()=>{
			form2();
		}, 2000);



	</script>
	<script>
		const ctx = document.getElementById('myChart');

		new Chart(ctx, {
			type: 'line',
			data: {
				labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
				datasets: [{
					label: '# of Votes',
					data: [12, 29, 3, 5, 2, 3],
					borderWidth: 2
				}]
			},
			options: {
				scales: {
					y: {
						beginAtZero: true
					}
				}
			}
		});
	</script>




	<!-- JS -->
	<script src="{{url('public')}}/admin/js/jquery.min.js"></script>
	<script src="{{url('public')}}/admin/js/popper.min.js"></script>
	<script src="{{url('public')}}/admin/js/moment.min.js"></script>
	<script src="{{url('public')}}/admin/js/bootstrap.min.js"></script>
	<script src="{{url('public')}}/admin/js/simplebar.min.js"></script>
	<script src="{{url('public')}}/admin/js/daterangepicker.js"></script>
	<script src="{{url('public')}}/admin/js/jquery.stickOnScroll.js"></script>
	<script src="{{url('public')}}/admin/js/tinycolor-min.js"></script>
	<script src="{{url('public')}}/admin/js/config.js"></script>
	<script src="{{url('public')}}/admin/js/d3.min.js"></script>
	<script src="{{url('public')}}/admin/js/topojson.min.js"></script>
	<script src="{{url('public')}}/admin/js/datamaps.all.min.js"></script>
	<script src="{{url('public')}}/admin/js/datamaps-zoomto.js"></script>
	<script src="{{url('public')}}/admin/js/datamaps.custom.js"></script>
	<script src="{{url('public')}}/admin/js/Chart.min.js"></script>
	<script>
      /* defind global options */
		Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
		Chart.defaults.global.defaultFontColor = colors.mutedColor;
	</script>
	<script src="{{url('public')}}/admin/js/gauge.min.js"></script>
	<script src="{{url('public')}}/admin/js/jquery.sparkline.min.js"></script>
	<script src="{{url('public')}}/admin/js/apexcharts.min.js"></script>
	<script src="{{url('public')}}/admin/js/apexcharts.custom.js"></script>
	<script src="{{url('public')}}/admin/js/jquery.mask.min.js"></script>
	<script src="{{url('public')}}/admin/js/select2.min.js"></script>
	<script src="{{url('public')}}/admin/js/jquery.steps.min.js"></script>
	<script src="{{url('public')}}/admin/js/jquery.validate.min.js"></script>
	<script src="{{url('public')}}/admin/js/jquery.timepicker.js"></script>
	<script src="{{url('public')}}/admin/js/dropzone.min.js"></script>
	<script src="{{url('public')}}/admin/js/uppy.min.js"></script>
	<script src="{{url('public')}}/admin/js/quill.min.js"></script>
</body>
</html>



