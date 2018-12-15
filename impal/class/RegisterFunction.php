<?php

class RegisterFunction{

	public function __construct(){
		$this->db = new PDO('mysql:host=localhost; dbname=impal', 'root');
	}

	public function addPelanggan($username, $password, $noktp, $nama, $nohp, $alamat){
		include 'koneksi.php';

		$sql1 = " INSERT INTO pelanggan (Username, noKTP_P, nama_P, noHP_P, alamat_P) 
				  VALUES ('$username', '$noktp', '$nama', '$nohp', '$alamat') ";
		$sql2 = " INSERT INTO akun (Username, Password,Role)
				  VALUES ('$username', '$password','pelanggan') ";
		#$query 	= $this->db->query($sql1);
		#$queryp	= $this->db->query($sql2);

		if ($conn->query($sql2)=== TRUE) {
			if ($conn->query($sql1) === TRUE) {
				$message = "Berhasil daftar , silahkan login";
				echo "<script type='text/javascript'>alert('$message');</script>";
				echo "<script> location.replace('login.php'); </script>";
			}
			else {
				$message = "Gagal daftar . KTP sudah terdaftar,silahkan daftar ulang";
				$del = "DELETE FROM akun WHERE Username ='$username'";
				$conn->query($del);
				echo "<script type='text/javascript'>alert('$message');</script>";
				echo "<script> location.replace('register.php'); </script>";
			}
		} else{
			$message = "Gagal daftar . Username sudah terdaftar,silahkan daftar ulang";
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo "<script> location.replace('register.php'); </script>";
		}
	}

	public function addPegawai($role, $username, $password, $noktp, $nama, $nohp, $alamat){
		include 'koneksi.php';

		if ($role == 'arsitek') {
			$sql1 = " INSERT INTO $role (Username, noKTP_Ar, nama_Ar, noHP_Ar, alamat_Ar) 
				  VALUES ('$username', '$noktp', '$nama', '$nohp', '$alamat') ";
			$message = "Berhasil mendaftarkan arsitek";
		}
		else if ($role == 'mandor'){
			$sql1 = " INSERT INTO $role (Username, noKTP_M, nama_M, noHP_M, alamat_M) 
				  VALUES ('$username', '$noktp', '$nama', '$nohp', '$alamat') ";
			$message = "Berhasil mendaftarkan mandor";
		}
		
		$sql2 = " INSERT INTO akun (Username, Password,Role)
				  VALUES ('$username', '$password','$role') ";


		if ($conn->query($sql2)=== TRUE) {
			if ($conn->query($sql1) === TRUE) {
				
				echo "<script type='text/javascript'>alert('$message');</script>";
				echo "<script> location.replace('registerp.php'); </script>";
			}
			else {
				$message = "Gagal daftar . KTP sudah terdaftar,silahkan daftar ulang";
				$del = "DELETE FROM akun WHERE Username ='$username'";
				$conn->query($del);
				echo "<script type='text/javascript'>alert('$message');</script>";
				echo "<script> location.replace('registerp.php'); </script>";
			}
		} else{
			$message = "Gagal daftar . Username sudah terdaftar,silahkan daftar ulang";
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo "<script> location.replace('registerp.php'); </script>";
		}

	}
	/* Dipaka	i Jika Diperlukan */
	public function showPelanggan(){
		$sql = " SELECT * FROM pelanggan ";
		$query = $this->db->query($sql);
		return $query;
	}
}