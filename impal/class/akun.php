<?php

class akun {
  private $Username;
  private $Password;
  public $akn;
  function __construct($Username, $Password)
  {
    $this->Username = $Username;
    $this->Password = $Password;
  
    //$this->akn =new mysqli($this->Username, $this->Password) or die (mysqli_error());
    //if ($this->akn) {
      //return false;
   // }else {
      //return true;
  }
  
  function login(){ 
    include "koneksi.php";

    $sql = "SELECT * FROM akun WHERE username = '$this->Username' AND password = '$this->Password'";

    $query = $conn->query($sql);
    $data = $query->fetch_assoc();
    
      if ($query->num_rows == 1) {
        #$sql = "SELECT Role from akun where Username = '$this->Username' AND password = '$this->Password'";
        #result = $conn->query($sql);
          
        if ($data['Role'] == 'mandor'){
         # session_start();
         # $_SESSION['uname'] = $this->Username;
          return 'Mandor';
        }   
        else if ($data['Role'] == 'admin'){
          #session_start();
          #$_SESSION['uname'] = $this->Username;
          return 'Admin';
        } 
        else if ($data['Role'] == 'pelanggan'){
          
          #$_SESSION['uname'] = $this->Username;
          return 'Pelanggan';
        }
        else if ($data['Role'] == 'arsitek'){
          
          #$_SESSION['uname'] = $this->Username;
          return 'Arsitek';
        }      
         
      }
      else if ($query->num_rows != 1)  {
        $message = "Username atau password salah";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script> location.replace('login.php'); </script>";
      }


    $conn->close();

  }
}

?>