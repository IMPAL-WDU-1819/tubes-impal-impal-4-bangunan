<?php
class admin {
  private $noKTP_Ad;
  private $Username;
  private $noHP_Ad;
  private $nama_Ad;
  public $adm;
  function __construct($noKTP_Ad, $Username, $noHP_Ad, $nama_Ad)
  {
    $this->noKTP_Ad = $noKTP_Ad;
    $this->Username = $Username;
    $this->noHP_Ad = $noHP_Ad;
    $this->nama_Ad = $nama_Ad;

    //$this->adm =new mysqli($this->noKTP_Ad, $this->Username, $this->noHP_Ad, $this->nama_Ad) or die (mysqli_error());
    //if ($this->adm) {
    //  return false;
    //}else {
     // return true;
  }

  function __construct($conn){
    $this->mysqli = $conn;
  }

  public function getnoKTP_Ad(){
    return $this->noKTP_Ad;
  }
  public function getUsername(){
    return $this->Username;
  }
  public function getnoHP_Ad(){
    return $this->noHP_Ad;
  }
  public function getnama_Ad(){
    return $this->nama_Ad;
  }

  public function showAdmin(){
    $db=$this->mysqli->conn;
    $sql="SELECT * FROM admin";
    $squery = $db->query($sql) or die($db->error);
    return $squery;
  }

}

?>
