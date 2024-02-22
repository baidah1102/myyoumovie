<?php
  session_start();
  if (empty($_SESSION['user_id'])){
    header("location:../login.php");
  }
?>
<?php

$id=$_GET['id'];

include "../koneksi.php";

$hapus=$koneksi->query("delete from mahasiswa where mahasiswa_id='$id'");

if($hapus==true){

    header("location:tampil-mahasiswa.php?pesan=hapusBerhasil");

} else{
    echo "Error";
}


?>