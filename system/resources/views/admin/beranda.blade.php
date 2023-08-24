@extends('admin.template.base')
@section('title')
BERANDA
@endsection

@section('content')

<div class="row items-align-baseline">

  <div class="col-md-12 col-lg-6" >
    <div class="card eq-card mb-4" id="head1">

      <div id="">
       @if($maxhome1->voltage == 'nan' )
       <div class="card-header text-center bg-danger">
         <h3 style="color:#ffffff">LISTRI MATI</h3>
       </div>
       @else
       <div class="card-header text-center bg-success">
         <h3 style="color:#ffffff">LISTRIK HIDUP</h3>
       </div>
       @endif
     </div>
     


     <div class="card-body mb-n3">

      <div class="row items-align-baseline h-100">
        <div class="col-md-6 my-3">
          <!-- <p class="mb-0"><strong class="mb-0 text-uppercase text-muted">Alamat</strong></p> -->
          <h3>Kamar 1 </h3>
          <p class="text-muted">{{ucwords($user1->nama)}}</p>
        </div>
        <div class="col-md-6 my-4 text-center">
          <div lass="chart-box mx-4">
           <h3 class="mt-5"> <div id="kamar1"><b style="font-size: 30pt">Rp. {{number_format($total_home1)}}</b></div></h3>
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
        <h4 class="mb-0"><div id="watt1">{{$daya1}}</div> W</h4>
        <p class="small text-muted mb-0"><span>Sekarang</span></p>
      </div> <!-- .col -->
      <div class="col-md-4 border-top py-3">
        <p class="mb-1"><strong class="text-muted">Arus</strong></p>
        <h4 class="mb-0">{{$arus1}} <br>Ampere</h4>
        <p class="small text-muted mb-0"><span>Sekarang</span></p>
      </div>  <!-- .col -->
    </div>
  </div> <!-- .card-body -->
</div> <!-- .card -->
</div> <!-- .col -->



<div class="col-md-12 col-lg-6" >
  <div class="card eq-card mb-4" id="head2">

    <div id="">
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


   <div class="card-body mb-n3">
    <div class="row items-align-baseline h-100">
      <div class="col-md-6 my-3">
        <!-- <p class="mb-0"><strong class="mb-0 text-uppercase text-muted">Alamat</strong></p> -->
        <h3>Kamar 2 </h3>
        <p class="text-muted">{{ucwords($user2->nama)}}</p>
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
        <h4 class="mb-0"><div id="watt1">{{$daya2}}</div> W</h4>
        <p class="small text-muted mb-0"><span>Sekarang</span></p>
      </div> <!-- .col -->
      <div class="col-md-4 border-top py-3">
        <p class="mb-1"><strong class="text-muted">Arus</strong></p>
        <h4 class="mb-0">{{$arus2}} <br>Ampere</h4>
        <p class="small text-muted mb-0"><span>Sekarang</span></p>
      </div>  <!-- .col -->
  </div>
</div> <!-- .card-body -->
</div> <!-- .card -->
</div> <!-- .col -->

</div>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">

// KAMAR 1 ===================
  function head1(){
    $('#head1').load("{{url('admin/beranda')}}" + ' #head1');
  }


// KAMAR 2 =======================
  function head2(){
    $('#head2').load("{{url('admin/beranda')}}" + ' #head2');
  }

  setInterval( ()=>{
    head1();
  }, 5000);

  setInterval( ()=>{
    head2();
  }, 5000);

</script>





<!-- END JS KU -->

@endsection