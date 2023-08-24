@foreach(['success','primary', 'warning', 'danger'] as $status)
@if (session($status))
<div class="col-md-12 lg-12 sm-12 xs-12 alert alert-{{$status}} alert-dismissable custom-{{$status}}-box" style="width: 81vw; margin: 0 0 5px 0;">
	<a href="#" class="close mr-3" data-dismiss="alert" aria-label="close">&times;</a>
	<strong> {{ session($status) }}</strong>
</div>
@endif
@endforeach