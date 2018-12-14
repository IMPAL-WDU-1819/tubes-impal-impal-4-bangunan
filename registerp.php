<?php
    include 'class/RegisterFunction.php';
    if (isset($_POST['submit'])){
      $role = $_POST['role'];
      $nama = $_POST['nama'];
      $inputktp = $_POST['inputktp'];
      $inputnohp = $_POST['inputnohp'];
      $inputuname = $_POST['inputuname'];
      $inputPassword = $_POST['inputPassword'];
      $almat = $_POST['almat'];
      
      $regis = new RegisterFunction();
      $regis->addPegawai($role,$inputuname,$inputPassword,$inputktp,$nama,$inputnohp,$almat);


    }
  ?>
<!DOCTYPE html>
<html lang="en">

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

    <!-- Navbar admin -->
    <?php 
    include 'Navbar.php';
     ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="admin.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Daftar Pemesanan</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="daftarakun.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Daftar Akun</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="registerp.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Sign Up pegawai</span>
          </a>
        </li>

      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">
        <!-- /.container-fluid -->

    <div class="container-fluid p-0">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" required="required">
                <label for="nama">Nama</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="inputktp" name="inputktp" class="form-control" placeholder="Nomor KTP" required="required">
                    <label for="inputktp">Nomor KTP</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="inputnohp" name="inputnohp" class="form-control" placeholder="Nomor Hp" required="required">
                    <label for="inputnohp">Nomor Hp</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="inputuname" name="inputuname" class="form-control" placeholder="Username" required="required">
                    <label for="inputuname">Username</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select id="role" name="role">
                      <option value="">---pilih peran---</option>
                      <option value="arsitek">Arsitek</option>
                      <option value="mandor">Mandor</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required="required">
                    <label for="inputPassword">Password</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                    <label for="confirmPassword">Confirm password</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="almat" name="almat" class="form-control" placeholder="Alamat" required="required">
                <label for="alamat">Alamat</label>
              </div>
            </div>
            <input class="btn btn-primary btn-block" type="submit" name="submit" value="Register">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="admin.php">Admin Page</a>
          </div>
        </div>
      </div>
    </div>


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
