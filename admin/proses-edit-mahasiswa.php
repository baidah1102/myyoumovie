<?php
  session_start();
  if (empty($_SESSION['user_id'])){
    header("location:../login.php");
  }
?>
<?php

include "../koneksi.php";

$id=$_POST['mahasiswa_id'];
$nim=$_POST['nim'];
$nama=$_POST['nama'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$alamat=$_POST['alamat'];

$ubah=$koneksi->query("update mahasiswa set nim='$nim', nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat' where mahasiswa_id='$id'");

if($ubah==true){

    header("location:tampil-mahasiswa.php?pesan=editBerhasil");
} else{
    echo "Error";
}

?>