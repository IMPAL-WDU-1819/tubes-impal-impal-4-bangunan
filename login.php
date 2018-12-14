<?php
    include 'class/akun.php';
    if (isset($_POST['login'])){
      $inputuname = $_POST['inputuname'];
      $inputPassword = $_POST['inputPassword'];
      
      $masuk = new akun($inputuname,$inputPassword);
      if ($masuk->login() == 'Pelanggan'){
        session_start();
        $_SESSION['uname'] = $inputuname;
        header('Refresh: 1; url=pelanggan.php');
      }
      else if ($masuk->login() == 'Admin'){
        session_start();
        $_SESSION['uname'] = $inputuname;
        header('Refresh: 1; url=admin.php');
      }
      else if ($masuk->login() == 'Arsitek'){
        session_start();
        $_SESSION['uname'] = $inputuname;
        header('Refresh: 1; url=arsitek.php');
      }
      else if ($masuk->login() == 'Mandor'){
        session_start();
        $_SESSION['uname'] = $inputuname;
        header('Refresh: 1; url=mandor.php');
      }      
      
    }
  ?>
<html >

  <head>

    

    <title><b>Sistem Pembuatan Bangunan</title>

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
    include "Navbarlogout";
    ?>

    <div id="wrapper">

      <!-- Sidebar -->
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
          <div class="card card-login mx-auto mt-5">
            <div class="card-header">Sign in</div>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="" id="inputuname" name="inputuname" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
                    <label for="inputuname">Username</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required="required">
                    <label for="inputPassword">Password</label>
                  </div>
                </div>
                <input class="btn btn-primary btn-block" type="submit" name="login" value="Login">
              </form>
                <div class="text-center">
                  <a class="d-block small mt-3" href="register.php">Register</a>
                  
                </div>
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
    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <!--<script src="vendor/jquery-easing/jquery.easing.min.js"></script>-->

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
