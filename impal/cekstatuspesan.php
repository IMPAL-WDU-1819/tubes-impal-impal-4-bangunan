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
          <a class="nav-link" href="pesan.php">
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

    <div id="content-wrapper">

        <div class="container-fluid">
        <!-- /.container-fluid -->

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Pemesanan Pelanggan</div>
            <div class="card-body">
              <div class="table-responsive">

              

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="opacity=0.9;">
                  <thead>
                    <tr>
                      <th>ID Pesanan</th>
                     <!-- <th>ID Pelanggan</th> -->
                      <th>ID Bangunan</th>
                      <th>Konfirmasi Admin</th>
                      <th>Konfirmasi Arsitek</th>
                      <th>Konfirmasi Mandor</th>
                      <th>Status Bayar</th>
                      <th>Lihat Bangunan</th>
                    </tr>
                  </thead>
                  <?php
                    include "class/koneksi.php";
                    $sql3 = "SELECT noKTP_P FROM pelanggan WHERE Username = '$sesi'";
                    $query = $conn->query($sql3);
                    $data = $query->fetch_assoc();
                    $ktp = $data['noKTP_P'];
                    $sql = "SELECT * FROM pesan WHERE noKTP_P = '$ktp'";
                    $query=$conn->query($sql);
                    ?>
                    
                  <tbody>
                  <?php while ($data= $query->fetch_assoc()) {
                    ?>
                    <tr>
                      <td><?php echo $data['id_P'] ?></td>
                      <!-- <td><?php echo $data['noKTP_P'] ?></td> -->
                      <td><?php echo $data['id_B'] ?> </td>
                      <td><?php echo $data['Konfirmasi_Ad'] ?></td>
                      <td><?php echo $data['Konfirmasi_Ar'] ?></td>
                      <td><?php echo $data['Konfirmasi_M'] ?></td>
                      <td><?php echo $data['status_bayar'] ?></td>
                      <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $data['id_B'] ?>">View</button>
                      </td>
                    </tr>
                    <?php
                    $id_B = $data['id_B'];
                    $sql4 = "SELECT * FROM bangunan WHERE id_B = '$id_B'";
                    $query4 = $conn->query($sql4);
                    $data4 = $query4->fetch_assoc();

                    ?>

                    <!-- View nya-->

                    <div class="modal fade" id="edit<?php echo $data['id_B'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bangunan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <h5 class="modal-title" id="exampleModalLabel">ID Bangunan  <?php echo $data['id_B'] ?></h5>
                              <!-- Insert Form here -->
                              <form method="" action="">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">ID Bangunan</label>
                                    <input type="text" class="form-control" name="id_P" readonly="readonly" value="<?php echo $data['id_B'] ?>">


                                      <!-- Create hidden input here to post id Users-->
                                      <input type="text" style="display: none;" name="id_P" value="<?php echo $data['id_P'] ?>">
                                    
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Tipe</label>
                                   <input type="text" class="form-control" name="Tipe" readonly="readonly" value="<?php echo $data4['tipe'] ?>">
                                    <!-- Create hidden input here to post id Users-->
                                      
                                  </div>
                                   <div class="form-group">
                                    <label for="exampleInputPassword1">Lantai</label>
                                   <input type="text" class="form-control" name="Lantai" readonly="readonly" value="<?php echo $data4['lantai'] ?>">

                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Deskripsi bangunan</label>
                                   <textarea type="text" class="form-control" name="Deskripsi" readonly="readonly" value=""><?php echo $data4['Deskripsi'] ?></textarea>

                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Harga</label>
                                   <input type="text" class="form-control" name="Harga" readonly="readonly" value="<?php echo $data4['Harga'] ?>">
                                  <div class="form-group">

                                    <a class="nav-link" target="_blank" href="Arsitek/<?php echo $data4['Nama_arsitek'] ?>">
                                    
                                    <span>Rancangan Bangunan</span>
                                    </a>

                                    <a class="nav-link" target="_blank" href="Mandor/<?php echo $data4['nama_Bangunan'] ?>">
                                    
                                    <span>Bangunan</span>
                                    </a>

                                  </div>

                                  
                                </form>                        
                            </div>      
                    </div>
                  </div>
                </div>
                    <!-- end of view-->



                    <?php } ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
