<!DOCTYPE html>

<html>

  <head>

    <title>Register - Pelanggan</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="navbar-brand mr-1" href="index.php"><img src="Logo2.png" style="padding-right: 15px">SPB Company</a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
      <ul class="navbar-nav ml-auto ml-md-12">
      </ul>
    </nav>

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register - Pelanggan</div>

          <div class="card-body">

            <form>

              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="inputuname" class="form-control" placeholder="Username" required="required" name="usernameP">
                  <label for="inputuname">Username</label>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="passwordP">
                  <label for="inputPassword">Password</label>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="nama" class="form-control" placeholder="nama" required="required" name="namaP">
                  <label for="nama">Nama</label>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <input type="text" id="inputktp" class="form-control" placeholder="Nomor KTP" required="required" name="noktpP">
                      <label for="inputktp">Nomor KTP</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <input type="text" id="inputnohp" class="form-control" placeholder="Nomor Hp" required="required" name="nohpP">
                      <label for="inputnohp">Nomor Hp</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="almat" class="form-control" placeholder="Alamat" required="required" name="alamatP">
                  <label for="almat">Alamat</label>
                </div>
              </div>

              <!--
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
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
              -->

              <input type="submit" class="btn btn-success btn-block btn-lg" value="Register" name="submitklik">

            </form>

            <div class="text-center">
              <a class="d-block small mt-3" href="login.php">Halaman Login</a>
              <!--
              <a class="d-block small" href="forgot-password.php">Lupa Password?</a>
              -->
            </div>

        </div>

      </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>

<?php
  require 'RegisterFunction.php';
  if (isset($_POST['submitklik'])){
    $username     = $_POST['usernameP'];
    $password     = $_POST['passwordP'];
    $noktp        = $_POST['noktpP'];
    $nama         = $_POST['namaP'];
    $nohp         = $_POST['nohpP'];
    $alamat       = $_POST['alamatP'];

    $pelanggan    = new RegisterFunction();
    $add          = $pelanggan->addPelanggan($username, $password, $noktp, $nama, $nohp, $alamat);

    if($add = 'Success'){
      header('login.php');
    } else{
      echo "Error";
    }
  }
?>
