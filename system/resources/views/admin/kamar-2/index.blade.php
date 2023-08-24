@extends('admin.template.base')
@section('title')
Kamar 2
@endsection

@section('content')
<div class="row items-align-baseline">

	<div class="col-md-12 mt-3 mb-3">
		<div class="card">
			<div id="head2">
				@if($maxhome2->voltage == 'nan' )
				<div class="card-header text-center bg-danger">
					<h3 style="color:#ffffff">LISTRI MATI</h3>
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
					<h3>Detail Kamar 2</h3>
				</center>
				<button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#exampleModal">
					Update
				</button>



				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Update </h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('admin/kamar-2/user/2')}}" method="post" enctype="multipart/form-data">
									@csrf
									
									<div class="row">
										<div class="col-md-6">
											<input type="text" placeholder="Nama" name="nama" required value="{{ucwords($user2->nama)}}" class="form-control mt-3">
										</div>
										<div class="col-md-6">
											<input type="text" placeholder="PIN" name="pin" required value="{{ucwords($user2->pin)}}" class="form-control mt-3">
										</div>

										<div class="col-md-6">
											<input type="text" placeholder="Asal" name="asal" required value="{{ucwords($user2->asal)}}" class="form-control mt-3">
										</div>
										<div class="col-md-6">
											<input type="text" placeholder="No. Telp" name="notlp" required value="{{$user2->notlp}}" class="form-control mt-3">
										</div>

										<div class="col-md-12">
											<center>
												<button type="submit" class="btn text-white mt-3 mb-3 btn-success">Save changes</button>
											</center>
											
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
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
							<td>: {{$terakhir->created_at}}</td>
						</tr>
						<tr>
							<td colspan="2">
								<form action="{{url('admin/kamar-2/bayar')}}" method="post">
									@csrf
									<div id="form2">
										<input type="text" value="{{$energy_home2}}" name="jumlah_energy" hidden>
										<input type="text" value="{{$total_home2}}" name="jumlah_uang" hidden>
									</div>
									
									<div class="row">
										<a href="" onclick="return confirm('Yakin melakukan pembayaran?')">
											
											<button class="btn btn-success text-white mr-3" type="submit">Pembayaran</button>
										</a>
										<a href="{{url('admin/kamar-2/bayar')}}" class="btn btn-warning text-white ">Kirim Tagihan</a>
									</div>
								</form>
								
							</td>
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
				<h3>Tagihan Kamar 2 </h3>
			</div>
			<div class="col-md-6 my-4 text-center">
				<div lass="chart-box mx-4">
					<h3 class="mt-5"> <div id="kamar2"><b style="font-size: 30pt">Rp. {{number_format($total_home2)}}</b></div></h3>
					<!-- <div id="radialbarWidget"></div> -->
				</div>
			</div>
			<div class="col-md-4 border-top py-3">
				<p class="mb-1"><strong class="text-muted">Energy</strong></p>
				<h4 class="mb-0"><div id="energy2"> {{$energy_home2}}</div> kWh</h4>
				<p class="small text-muted mb-0"><span>Sekarang</span></p>
			</div> <!-- .col -->
			<div class="col-md-4 border-top py-3">
				<p class="mb-1"><strong class="text-muted">Daya</strong></p>
				<h4 class="mb-0"><div id="watt1">{{number_format($daya2)}}</div> W</h4>
				<p class="small text-muted mb-0"><span>Sekarang</span></p>
			</div> <!-- .col -->
			<div class="col-md-4 border-top py-3">
				<p class="mb-1"><strong class="text-muted">Arus</strong></p>
				<h4 class="mb-0">{{$arus2}} <br>Ampere</h4>
				<p class="small text-muted mb-0"><span>Sekarang</span></p>
			</div>  <!-- .col -->
		</div>
	</div>

	<div class="col-lg-6 mt-3">
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
						<td> {{$t->jumlah_energy}}</td>
						<td>Rp. {{number_format($t->jumlah_uang)}}</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">

// KAMAR 1 ===================
	function head2(){
		$('#head2').load("{{url('admin/kamar-2')}}" + ' #head2');
	}

	function body2(){
		$('#body2').load("{{url('admin/kamar-2')}}" + ' #body2');
	}

	function form2(){
		$('#form2').load("{{url('admin/kamar-2')}}" + ' #form2');
	}


	setInterval( ()=>{
		head2();
	}, 2000);

	setInterval( ()=>{
		body2();
	}, 2000);

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



@endsection