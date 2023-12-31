<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title>Login</title>
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
</head>
<body class="light ">
  <div class="wrapper vh-100">
    <div class="row align-items-center h-100">
      <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="{{url('login')}}" method="post">
        @csrf
        <img src="{{url('public/logo-pln.png')}}" width="100px" alt="">
        <h1 class="h6 mb-3">Sign in</h1>
        @include('utils.notif')
        <div class="form-group">
          <label for="inputEmail" class="sr-only">No Tlp.</label>
          <input type="text"  name="notlp" class="form-control form-control-lg" placeholder="No Telp." required="" autofocus="">
        </div>
        <div class="form-group">
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required="">
        </div>
        <div class="checkbox mb-3">

        </div>
        <button class="btn btn-lg btn-success text-white btn-block" type="submit">MASUK</button>
        <p class="mt-5 mb-3 text-muted">© {{date('Y')}}</p>
      </form>
    </div>
  </div>
  <script src="{{url('public')}}/admin/js/jquery.min.js"></script>
  <script src="{{url('public')}}/admin/js/popper.min.js"></script>
  <script src="{{url('public')}}/admin/js/moment.min.js"></script>
  <script src="{{url('public')}}/admin/js/bootstrap.min.js"></script>
  <script src="{{url('public')}}/admin/js/simplebar.min.js"></script>
  <script src='js/daterangepicker.js'></script>
  <script src='js/jquery.stickOnScroll.js'></script>
  <script src="{{url('public')}}/admin/js/tinycolor-min.js"></script>
  <script src="{{url('public')}}/admin/js/config.js"></script>
  <script src="{{url('public')}}/admin/js/apps.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag()
    {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
  </script>
</body>
</html>
</body>
</html>