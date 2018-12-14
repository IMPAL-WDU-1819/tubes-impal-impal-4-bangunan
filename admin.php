<?php 


include 'class/pesan.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id_P'];
    $Konfirmasi_Ad = $_POST['Konfirmasi_Ad'];
    $status_bayar = $_POST['status_bayar'];
    $update = new pesan();
    $update->edt_ad($id,$Konfirmasi_Ad,$status_bayar);

  }
if (isset($_POST['delete'])) {
    $id_P = $_POST['id_P'];
    $id_B = $_POST['id_B'];
    $del = new pesan();
    $del->del_ad($id_P,$id_B);

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
              Data Pemesanan Pelanggan</div>
            <div class="card-body">
              <div class="table-responsive">

              

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="opacity=0.9;">
                  <thead>
                    <tr>
                      <th>ID Pesanan</th>
                      <th>Username</th>
                      <th>ID Bangunan</th>
                      <th>Status Bayar</th>
                      <th>Konfirmasi Admin</th>
                      
                      <th>Konfirmasi Arsitek</th>
                      <th>Konfirmasi Mandor</th>
                      <th>Action</th>
                      <th>Del</th>
                    </tr>
                  </thead>
                  <?php
                    include "class/koneksi.php";
                    
                    $sql = "SELECT * FROM pesan";
                    $query=$conn->query($sql);
                    ?>
                    
                  <tbody>
                  <?php while ($data= $query->fetch_assoc()) {

                    $ktp = $data['noKTP_P'];
                    $sql1 = "SELECT Username FROM pelanggan WHERE noKTP_P ='$ktp' ";
                    $query1=$conn->query($sql1);
                    $data1= $query1->fetch_assoc();
                    ?>
                    <tr>
                      <td><?php echo $data['id_P'] ?></td>
                      <td><?php echo $data1['Username'] ?></td>
                      <td><?php echo $data['id_B'] ?> </td>
                      <td><?php echo $data['status_bayar'] ?></td>
                      <td><?php echo $data['Konfirmasi_Ad'] ?></td>
                      
                      <td><?php echo $data['Konfirmasi_Ar'] ?></td>
                      <td><?php echo $data['Konfirmasi_M'] ?></td>
                      
                      <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $data['id_P'] ?>"><i class="">Act</i></button>
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del<?php echo $data['id_P'] ?>"><i class="">D</i></button>
                      </td>
                    </tr>
                    
                    <!-- edit nya-->
                     <div class="modal fade" id="edit<?php echo $data['id_P'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Action Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <h5 class="modal-title" id="exampleModalLabel">Data dengan id pesanan <?php echo $data['id_P'] ?></h5>
                              <!-- Insert Form here -->
                              <form method="POST" action="">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">ID Pesanan</label>
                                    <input type="text" class="form-control" name="id_P" readonly="readonly" value="<?php echo $data['id_P'] ?>">


                                      <!-- Create hidden input here to post id Users-->
                                      <input type="text" style="display: none;" name="id_P" value="<?php echo $data['id_P'] ?>">
                                    
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Konfirmasi Admin</label>
                                   <select type="text" class="form-control" name="Konfirmasi_Ad" >
                                  
                                  <option value="<?php echo $data['Konfirmasi_Ad'] ?>">---pilih status---</option>
                                  <option value="sudah">Sudah</option>
                                  <option value="belum">Belum</option>
                                  </select>
                                    <!-- Create hidden input here to post id Users-->
                                      
                                  </div>
                                   <div class="form-group">
                                    <label for="exampleInputPassword1">Status Bayar</label>
                                   <select type="text" class="form-control" name="status_bayar" >
                                   <option value="<?php echo $data['status_bayar'] ?>">---pilih status---</option>
                                  <option value="sudah">Sudah</option>
                                  <option value="cicilan">Cicilan</option>
                                  <option value="belum">Belum</option>
                                  </select>

                                  </div>
                                  <button type="submit" name="edit" class="btn btn-primary btn-block">Submit</button>
                                </form>                        
                            </div>      
                    </div>
                  </div>
                </div>
                <!-- end edit-->

                 <!-- start delete-->
                <div class="modal fade" id="del<?php echo $data['id_P'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                         <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin mendelete pesanan dengan id <?php echo $data['id_P'] ?> ?</h5>
                      </div>
                      <div class="modal-footer">
                              <form method="POST" action="">
                              <input type="text" style="display: none;" name="id_P" value="<?php echo $data['id_P'] ?>">
                              <input type="text" style="display: none;" name="id_B" value="<?php echo $data['id_B'] ?>">

                                  <!-- Create hidden input here to post id Users-->

                                <button type="submit" name="delete" class="btn btn-danger">YA</a>
                              </form>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
                 <!-- end delete-->


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
