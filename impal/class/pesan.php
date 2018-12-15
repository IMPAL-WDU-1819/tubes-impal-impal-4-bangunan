<?php

class pesan{


	function memesan($tipe,$lantai,$desc,$harga,$sesi){
		include 'koneksi.php';
		
		$i = 100;
		$sql = "SELECT * FROM bangunan";
		$query = $conn->query($sql);
    	while ($data = $query->fetch_assoc()) {
    		$i = $i+1;
    	}
        

    	$sql1 = "INSERT INTO bangunan (id_B,tipe,lantai,Deskripsi,Harga,nama_Bangunan,Nama_arsitek)
    			VALUES ('$i','$tipe','$lantai','$desc','$harga','belum.jpg','belum.jpg')";


    	if ($conn->query($sql1)=== TRUE) {
    		$message = 'Berhasil memesan Dengan harga';
    		echo "<script type='text/javascript'>alert('$message');</script>";
    		
    	}

    	$j = 100;
		$sql = "SELECT * FROM pesan";
		$query = $conn->query($sql);
    	while ($data = $query->fetch_assoc()) {
    		$j = $j+1;
    	}

    	
        
    	$sql3 = "SELECT noKTP_P FROM pelanggan WHERE Username ='$sesi'";
    	
    	$query = $conn->query($sql3);
    	$data = $query->fetch_assoc();
    	$ktp = $data['noKTP_P'];
    	
    	


    	$sql2 = "INSERT INTO pesan (id_P,id_B,noKTP_P,Konfirmasi_Ad,Konfirmasi_M,Konfirmasi_Ar,status_bayar)
    			VALUES ('$j','$i','$ktp','belum','belum','belum','belum')";
    	if ($conn->query($sql2)=== TRUE) {
    		
    		echo "<script type='text/javascript'>alert('$harga');</script>";
    		echo "<script> location.replace('pesan.php'); </script>";
    	}


		#$sql1 = " INSERT INTO pelanggan (Username, noKTP_P, nama_P, noHP_P, alamat_P) 
		#		  VALUES ('$username', '$noktp', '$nama', '$nohp', '$alamat') ";		


	}

    function edt_ad($id,$Konfirmasi_Ad,$status_bayar){
        include 'koneksi.php';
        $sql = "UPDATE pesan SET Konfirmasi_Ad ='$Konfirmasi_Ad' , status_bayar = '$status_bayar' WHERE id_P = '$id'";
         /*Insert Your Query to Edit User*/
         if ($conn->query($sql) === TRUE) {
            header("Location: admin.php");
                die();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
       
    }

    function del_ad($id_P,$id_B){
        include 'koneksi.php';
        $sql = "DELETE FROM pesan WHERE id_P = '$id_P'";
        /* Insert Your Query to Delete User*/
        if ($conn->query($sql) === TRUE) {
            $sql = "DELETE FROM bangunan WHERE id_B = '$id_B'";
            if ($conn->query($sql) === TRUE){
                header("Location: admin.php");
                die();
            }
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
    }

    function upd_ar($id_P,$id_B,$Konfirmasi_Ar,$image){
        include 'koneksi.php';
        $sql = "UPDATE pesan SET Konfirmasi_Ar ='$Konfirmasi_Ar' WHERE id_P = '$id_P'";
        
        $sql1 = "UPDATE bangunan SET Nama_arsitek ='$image' WHERE id_B = '$id_B'";
        

        if ($conn->query($sql) === TRUE) {
            if ($conn->query($sql1) === TRUE){
                header("Location:arsitek.php");
                die();
            }
            
        }


    }

    function upd_m($id_P,$id_B,$Konfirmasi_M,$image){
        include 'koneksi.php';
        $sql = "UPDATE pesan SET Konfirmasi_M ='$Konfirmasi_M' WHERE id_P = '$id_P'";
        
        $sql1 = "UPDATE bangunan SET nama_Bangunan ='$image' WHERE id_B = '$id_B'";
        

        if ($conn->query($sql) === TRUE) {
            if ($conn->query($sql1) === TRUE){
                header("Location:mandor.php");
                die();
            }
            
        }


    }


}


?>