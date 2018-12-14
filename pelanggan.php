<?php 
session_start();
if(isset($_SESSION['uname']))
{
  $sesi= $_SESSION['uname'];
  //echo "<script type='text/javascript'>alert('$sesi');</script>";
}
else
{
  #header("location:login.php");
}
?>

<html>




  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><b>Sistem Pembuatan Bangunan</b></title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <?php 
    include 'Navbar.php';
     ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="pelanggan.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="pesan.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pesan Bangunan</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="cekstatuspesan.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Cek Status Pemesanan</span>
          </a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <!-- <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol> -->

        </div>
        <!-- /.container-fluid -->

    <div class="container-fluid p-0">
          <div class="container text-center">
              <h2>The Best Building</h2>
          </div>
          <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
            <div class="container" id="top">
              <div class="row">
                <div class="col-md-4">
                  <img class="you" src="1.jpg">
                </div>
                <div class="col-sm-4">
                  <p class="me">Type </p>
                  <p class="me">Tingkat </p>
                  <p class="me">Deskripsi </p>
                </div>
                <div class="col-sm-4">
                  <p class="me">64</p>
                  <p class="me">2 Lantai</p>
                  <p class="me">Rumah ini adalah rumah dengan ukuran taman 2X2</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <img class="you"src="2.jpg">
                </div>
                <div class="col-sm-4">
                  <p class="me">Type </p>
                  <p class="me">Tingkat </p>
                  <p class="me">Deskripsi </p>
                </div>
                <div class="col-sm-4">
                  <p class="me">128</p>
                  <p class="me">3 Lantai</p>
                  <p class="me">Rumah ini adalah rumah dengan ukuran taman 3X3 dan ada kolam renang</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <img class="you" src="3.jpg">
                </div>
                <div class="col-sm-4">
                  <p class="me">Type </p>
                  <p class="me">Tingkat </p>
                  <p class="me">Deskripsi </p>
                </div>
                <div class="col-sm-4">
                  <p class="me">128</p>
                  <p class="me">3 Lantai</p>
                  <p class="me">Rumah ini adalah rumah dengan ukuran taman 3X3 dan ada kolam renang desain sangat mewah </p>
                </div>
              </div> 
            </div>
          </section>

        </div>

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © SPB Company 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php 
    include 'logoutmodal.php';
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
