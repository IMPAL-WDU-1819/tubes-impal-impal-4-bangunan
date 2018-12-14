
      <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

<?php 


include 'class/pesan.php';

if (isset($_POST['edit'])) {
    $id_P = $_POST['id_P'];
    $id_B = $_POST['id_B'];
    $Konfirmasi_Ar = $_POST['Konfirmasi_Ar'];
    $image = basename($_FILES["fileToUpload"]["name"]);
    //echo "<script type='text/javascript'>alert('$image');</script>";
    //$update = new pesan();
    //$update->edt_ad($id,$Konfirmasi_Ad,$status_bayar);

    


    //Ini uplaod
        $target_dir = "Arsitek/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                
                $uploadOk = 1;
            } else {
                //echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            //echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
           // echo "the file you are attempting to upload is larger than the permitted size.";
            $uploadOk = 0;
        }
                // Allow certain file formats
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " Upload berhasil!";
            } else {
                //echo "Sorry, there was an error uploading your file.";
            }
    }
    $update = new pesan();
    $update->upd_ar($id_P,$id_B,$Konfirmasi_Ar,$image);
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
          <a class="nav-link" href="arsitek.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Daftar Pemesanan</span>
          </a>
        
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
                      
                    </tr>
                  </thead>
                  <?php
                    include "class/koneksi.php";
                    
                    $sql = "SELECT * FROM pesan WHERE Konfirmasi_Ad = 'sudah'";
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
                              <form method="POST" action="" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">ID Pesanan</label>
                                    <input type="text" class="form-control" name="id_P" readonly="readonly" value="<?php echo $data['id_P'] ?>">


                                      <!-- Create hidden input here to post id Users-->
                                      <input type="text" style="display: none;" name="id_P" value="<?php echo $data['id_P'] ?>">

                                      <input type="text" style="display: none;" name="id_B" value="<?php echo $data['id_B'] ?>">
                                    
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Konfirmasi Arsitek</label>
                                   <select type="text" class="form-control" name="Konfirmasi_Ar" >
                                  
                                  <option value="<?php echo $data['Konfirmasi_Ar'] ?>">---pilih status---</option>
                                  <option value="sudah">Sudah</option>
                                  <option value="belum">Belum</option>
                                  </select>
                                    <!-- Create hidden input here to post id Users-->
                                      
                                  </div>
                                   <div class="form-group">
                                    <label for="exampleInputPassword1">Upload Gambar</label>
                                    <br/>
                                   <input type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this);"><br/><br/>
    <img id="blah" src="#" alt="" /> <br/><br/>

                                  </div>
                                  <button type="submit" name="edit" class="btn btn-primary btn-block">Submit</button>
                                </form>                        
                            </div>      
                    </div>
                  </div>
                </div>
                <!-- end edit-->

                 


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
