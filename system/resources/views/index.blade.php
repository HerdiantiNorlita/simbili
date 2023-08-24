<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIMBILI-KOS</title>
    <link rel="icon" type="image/x-icon" href="{{url('public/website')}}/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{url('public/website')}}/css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Monitoring Listrik</a>
           
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h2 class="mx-auto my-0 text-uppercase" style="font-size: 60pt;color: #fff;font-weight: bold;">MONITORING LISTRIK</h2>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Cek tagihan anda disini wahay anak anak kos ku, bayar tepat waktu demi kenyamanan bersama</h2>
                    <center>
                        <form action="{{url('cek')}}" method="post">
                            @csrf
                            <input type="text" name="pin" required class="form-control" style="width:50%" placeholder="Masukan No Telp. Anda">
                            <button class="btn btn-primary mt-2 btn-sm">Cek Tagihan</button> <b style="color:#ffffff !important"> Atau</b>

                            <a href="{{url('login')}}" class="btn btn-primary mt-2 btn-sm">Masuk</a>
                        </form>

                    </center>

                </div>
            </div>
        </div>
    </header>
   
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Politeknik Negeri Ketapang 2023</div></footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
