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

<?php
  include 'class/pesan.php';
    if (isset($_POST['pesan'])){
      //echo "<script type='text/javascript'>alert('$sesi');</script>";
      $tipe = $_POST['tipe'];
      $lantai = $_POST['lantai'];
      $desc = $_POST['desc'];
      $harga = 0;
      if ($tipe == 'tipe 36'){
        $harga = 300000000;
      }
      else if($tipe == 'tipe 45'){
        $harga = 400000000;
      }
      else if ($tipe == 'tipe 54'){
        $harga = 500000000;
      }
      else if ($tipe == 'tipe 120'){
        $harga = 700000000;
      }

      if ($lantai == '1 Lantai'){
        $harga = $harga * 1;
      }      
      else if ($lantai == '2 Lantai'){
        $harga = $harga *2;
      }
      else if ($lantai == '3 Lantai'){
        $harga = $harga *3;
      }

      //$cek = 'if';
      //echo "<script type='text/javascript'>alert('$cek');</script>";
      
      $bangunan = new pesan();
      $bangunan->memesan($tipe,$lantai,$desc,$harga,$sesi);

      #echo "<script type='text/javascript'>alert('$tipe');</script>";
      #echo "<script type='text/javascript'>alert('$lantai');</script>";
      #echo "<script type='text/javascript'>alert('$desc');</script>";
      #echo "<script type='text/javascript'>alert('$harga');</script>";
      
      #$masuk = new akun($inputuname,$inputPassword);
      #$masuk->login();
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

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Pesan Bangunan</div>
        <div class="card-body">
          <form action="" method="post">
            
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-label-group">
                    Tipe Rumah 
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-label-group">
                    :
                  </div>
                </div>
                <div class="col-md-6">
                  <select id="tipe" name="tipe">
                      <option value="">---pilih tipe---</option>
                      <option value="tipe 36">Tipe 36 = 300jt</option>
                      <option value="tipe 45">Tipe 45 = 400jt</option>
                      <option value="tipe 54">Tipe 54 = 500jt</option>
                      <option value="tipe 120">Tipe 120 = 700</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-label-group">
                    Tingkat
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-label-group">
                    :
                  </div>
                </div>
                <div class="col-md-6">
                  <select id="lantai" name="lantai">
                      <option value="">---pilih lantai---</option>
                      <option value="1 Lantai">1 Lantai = x 1 harga tipe</option>
                      <option value="2 Lantai">2 Lantai = x 2 harga tipe</option>
                      <option value="3 Lantai">3 Lantai = x 3 harga tipe</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-label-group">
                    Permintaan
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-label-group">
                    :
                  </div>
                </div>
                <div class="col-md-6">
                  <textarea id="permintaan" name="desc" ></textarea>
                </div>
              </div>
            </div>
            <!-- <div class="form-group">
                  <div class="form-label-group">
                    <input type="" id="biaya" name="biaya" class="form-control" placeholder="Biaya" required="required" readonly="readonly">
                    <label for="biaya">Estimasi biaya</label>
                  </div>
                </div>
                -->
            <input class="btn btn-primary btn-block" type="submit" name="pesan" value="Pesan">
          </form>
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
