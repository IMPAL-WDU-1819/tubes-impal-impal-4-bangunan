

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
          <li class="nav-item active">
          <a class="nav-link" href="daftarakun.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Daftar Akun</span>
          </a>
        </li>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="registerp.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Sign Up Pegawai</span>
          </a>
        </li>
        
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">
        <!-- /.container-fluid -->

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Daftar akun</div>
            <div class="card-body">
              <div class="table-responsive">

              

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="opacity=0.9;">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Role</th>
                      <th>No HP</th>
                      

                      
                    </tr>
                  </thead>
                  <?php
                    include "class/koneksi.php";
                    
                    $sql = "SELECT * FROM akun WHERE Role!='admin'";
                    $query=$conn->query($sql);
                    ?>
                    
                  <tbody>
                  <?php while ($data= $query->fetch_assoc()) {
                    $usr = $data['Username'];
                    if ($data['Role'] == 'pelanggan'){
                      
                      $sql1 = "SELECT noHP_P FROM pelanggan WHERE Username = '$usr' ";
                      $query1=$conn->query($sql1);
                      $data1= $query1->fetch_assoc();
                      $HP = $data1['noHP_P'];
                    }
                    else if ($data['Role'] == 'arsitek'){
                      $sql1 = "SELECT noHP_Ar FROM arsitek WHERE Username = '$usr' ";
                      $query1=$conn->query($sql1);
                      $data1= $query1->fetch_assoc();
                      $HP = $data1['noHP_Ar'];
                    }
                    else if ($data['Role'] == 'mandor'){
                      $sql1 = "SELECT noHP_M FROM mandor WHERE Username = '$usr' ";
                      $query1=$conn->query($sql1);
                      $data1= $query1->fetch_assoc();
                      $HP = $data1['noHP_M'];
                    }

                    
                    
                    ?>
                    <tr>
                      <td><?php echo $data['Username'] ?></td>
                      <td><?php echo $data['Password'] ?></td>
                      <td><?php echo $data['Role'] ?> </td>
                      <td><?php echo $HP ?></td>
                      
                      
                    </tr>
    
                <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>

        </div>
        </div>
      </section>

    </div>

        <!-- Sticky Footer -->
       <!-- <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © SPB Company 2018</span>
            </div>
          </div>
        </footer>

      </div> -->
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
