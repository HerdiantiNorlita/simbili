@extends('admin.template.base')
@section('title')
Rekap Penggunaan Listrik
@endsection

@section('content')
<div class="row items-align-baseline">

	<div class="col-md-12 mt-3 mb-3">
		<div class="card">
			<div class="card-body bg-success">
				<div class="text-center">
					<h3 style="color:#ffffff">PENGATURAN</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h3 class="text-success">Ganti Password Admin</h3>
				<form action="{{url('admin/update-password')}}" method="post">
					@csrf
					<input type="hidden" name="id_user" class="form-control" value="{{Auth::user()->user_id}}">
					<input type="password" name="new_password" class="form-control" placeholder="Buat Password Baru">
					<a href="" onclick="return confirm('Yakin ingin mengubah password?')">
					<button class="btn btn-success text-white mt-3">Ubah Password</button>
					</a>
				</form>
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