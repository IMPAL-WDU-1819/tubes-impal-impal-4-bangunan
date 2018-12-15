<!--

Note : File gambar disimpan di folder css

-->

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sistem Pembuatan Bangunan</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">

    <style type="text/css">
      #selamatdatang{
        font-family: "Arial Black", Gadget, sans-serif;
        color: white;
        text-shadow: 2px 2px 2px black;
      }
      #spbcomp{
        font-family: "Arial Black", Gadget, sans-serif;
        font-size: 30px;
        color: orange;
        text-shadow: 2px 2px 2px black;
      }
      #deskripsi{
        height: 100px;
        border-radius: 10px;
        background-color: #F0E68C;
        padding: 23px 10px 10px 10px;
        text-align: center;
        font-weight: bold;
        font-size: 15px;
        font-family: Verdana, Geneva, sans-serif;
        color: #2F4F4F;
        border: 3px solid #FFE4B5;
      }
      .mp-kotakdf{
        float: left;
        margin-left: 3px;
        margin-right: 10px;
        margin-top: 30px;
        width: 170px;
        height: 150px;
        background-color: #F08080;
        border: 3px solid white;
        border-radius: 10px;
        box-shadow: 4px 4px #888888;
      }
      #k1{
        background-image: url("css/lg1.jpg");
      }
      #k2{
        background-image: url("css/lg2.jpg");
      }
      #k3{
        background-image: url("css/lg3.jpg");
      }
      #k4{
        background-image: url("css/lg4.jpg");
      }
      #k5{
        background-image: url("css/lg5.jpg");
      }
      .#bersih{
        clear: both;
      }
      .mp-kotakdfteks{
        float: left;
        margin-left: 3px;
        margin-right: 10px;
        margin-top: 10px;
        width: 170px;
        height: 50px;
        background-color: transparent;
        text-align: center;
        font-family: "Arial Black", Gadget, sans-serif;
        font-size: 20px;
        color: white;
        text-shadow: 2px 2px 5px black;
      }
      .tombol{
        float: center;
        font-family: "Arial Black", Gadget, sans-serif;
        font-size: 20px;
        color: white;
        text-shadow: 2px 2px 10px black;
        box-shadow: 3px 3px black;
        margin-top: 10px;
      }
    </style>

  </head>

  <body id="page-top">

    <?php 
    include "Navbarlogout";
    ?>

    

      <!-- Sidebar -->
      
    <div id="wrapper">

      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="login.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Sign In</span>
          </a>
        </li>
      </ul>

      <div id="content-wrapper">
        <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
          <div class="my-auto">
            <h1 class="mb-0">
              <span id="selamatdatang">Selamat Datang!</span>
            </h1>
            <div class="subheading mb-5" id="spbcomp">di SPB Company</div>
            <div id="deskripsi">
            Kami merupakan Perusahaan penyedia layanan jasa pembuatan bangunan. Kualitas bangunan terjamin! Dengan Arsitek Profesional! Dan proses yang cepat dan mudah! Tunggu apa lagi? Pesan sekarang.
            </div>
              <div class="mp-kotakdf bersih" id="k1"></div>
              <div class="mp-kotakdf" id="k2" style="margin-left: 31px;"></div>
              <div class="mp-kotakdf" id="k3" style="margin-left: 31px;"></div>
              <div class="mp-kotakdf" id="k4" style="margin-left: 31px;"></div>
              <div class="mp-kotakdf" id="k5" style="margin-left: 31px;"></div>

              <div class="mp-kotakdfteks">Daftar</div>
              <div class="mp-kotakdfteks" style="margin-left: 31px;">Pesan</div>
              <div class="mp-kotakdfteks" style="margin-left: 31px;">Proses</div>
              <div class="mp-kotakdfteks" style="margin-left: 31px;">Bayar</div>
              <div class="mp-kotakdfteks" style="margin-left: 31px;">Selesai</div>

              <div style="clear: both">
              <hr>

              <center>
                <a href="register.php" type="button" class="btn btn-success tombol" style="margin-right: 10px;">Daftar Sekarang</a>
                
              </center>
          </div>
        </section>
      </div>

      <footer class="sticky-footer" style="background-color: transparent;">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span style="color: white; font-size: 20px; text-shadow: 2px 2px 4px black;">Copyright © SPB Company 2018</span>
          </div>
        </div>
      </footer>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="js/sb-admin.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>