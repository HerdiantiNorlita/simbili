 @php

 function checkRouteActive($route){
  if(Route::current()->uri == $route) return 'aktip';
}
@endphp

<style>
  .aktip{
    color: blue !important;
  }
</style>

<nav class="vertnav navbar navbar-light">
  <!-- nav bar -->
  <div class="w-100 mb-4 d-flex">
    <a class="navbar-brand mx-auto mt-2 flex-fill" href="#">
      <h3 class="ml-3">SIMBILI <br> KOS</h3>
    </a>
  </div>

  <ul class="navbar-nav flex-fill w-100 mb-2">
    <li class="nav-item dropdown {{checkRouteActive('admin/beranda')}}">
      <a href="{{url('admin/beranda')}}" class="nav-link  active">
        <i class="fe fe-home fe-16"></i>
        <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
      </a>
    </li>
  </ul>

  <p class="text-muted nav-heading mt-4 mb-1">
    <span>Monitoring Listrik Kamar</span>
  </p>
  <ul class="navbar-nav flex-fill w-100 mb-2">
    <li class="nav-item dropdown  {{checkRouteActive('admin/sensor-1')}}  {{checkRouteActive('admin/sensor-2')}}" >
      <a href="#sensor" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle active nav-link">
        <i class="fa fa-bed fe-16"></i>
        <span class="ml-3 item-text">Data Kamar</span>
      </a>
      <ul class="collapse list-unstyled pl-4 w-100" id="sensor">
        <li class="nav-item  {{checkRouteActive('admin/kamar-1')}}">
          <a class="nav-link pl-3" href="{{url('admin/kamar-1')}}"><span class="ml-1 item-text">Kamar 1</span>
          </a>
        </li>
        <li class="nav-item  {{checkRouteActive('admin/kamar-2')}}">
          <a class="nav-link pl-3" href="{{url('admin/kamar-2')}}"><span class="ml-1 item-text"> Kamar 2</span></a>
        </li><li class="nav-item  {{checkRouteActive('admin/kamar-2')}}">
        </li>

      </ul>
    </li>

    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown {{checkRouteActive('admin/rekap')}}">
        <a href="{{url('admin/rekap')}}" class="nav-link">
          <i class="fa fa-file fe-16"></i>
          <span class="ml-3 item-text">Rekap Pemakaian</span><span class="sr-only">(current)</span>
        </a>
      </li>
    </ul>

    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown {{checkRouteActive('admin/pengatuan')}}">
        <a href="{{url('admin/pengaturan')}}" class="nav-link">
          <i class="fa fa-cogs fe-16"></i>
          <span class="ml-3 item-text">Pengaturan</span><span class="sr-only">(current)</span>
        </a>
      </li>
    </ul>
  </nav>