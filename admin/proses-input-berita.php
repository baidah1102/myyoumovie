<?php
  session_start();
  if (empty($_SESSION['user_id'])){
    header("location:../login.php");
  }
?>
<?php

$judul=$_POST['judul'];
$isi=$_POST['isi'];
$user_id=$_SESSION['user_id'];

include "../koneksi.php";

$simpan=$koneksi->query("insert into berita(judul,isi,input_by) 
                        values ('$judul', '$isi', '$user_id')");

if($simpan==true){

    header("location:tampil-berita.php?pesan=inputBerhasil");
} else{
    echo "Error";
}




?>