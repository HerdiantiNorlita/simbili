@extends('admin.template.base')
@section('title')
Rekap Pembayaran Listrik
@endsection

@section('content')

<div class="row">
	<div class="col-md-12 mt-3 mb-3">
		<div class="card">
			<div class="card-body bg-success">
				<div class="text-center">
					<h3 style="color:#ffffff">Rekap Pembayaran Listrik</h3>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-lg-6 mt-3">
		<div class="card">
			<div class="card-body">
				<h3>Rekap Pembayaran Kamar No 1</h3>
				<table class="table">
					<tr>
						<th>No</th>
						<th>Tgl. Transaksi</th>
						<th>Jumlah kWh</th>
						<th>Jumlah Dibayar</th>
					</tr>
					@foreach($transaksi1->sortByDesc('transaksi_id') as $t)
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


	<div class="col-lg-6 mt-3">
		<div class="card">
			<div class="card-body">
				<h3>Rekap Pembayaran Kamar No 2</h3>
				<table class="table">
					<tr>
						<th>No</th>
						<th>Tgl. Transaksi</th>
						<th>Jumlah kWh</th>
						<th>Jumlah Dibayar</th>
					</tr>
					@foreach($transaksi2->sortByDesc('transaksi_id') as $t)
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
</div>





<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	const ctx = document.getElementById('myChart');

	new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
			datasets: [{
				label: '# of Votes',
				data: [12, 19, 3, 5, 2, 3],
				borderWidth: 1
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