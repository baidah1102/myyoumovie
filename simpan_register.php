<?php
include "koneksi.php";

$username = $_POST["username"];
$password = md5($_POST['password']); // menggunakan md5 sesuai ketentuan
$nama_lengkap = $_POST["nama_lengkap"];
$jenis_kelamin = $_POST["jenis_kelamin"];
$tanggal_lahir = $_POST["tanggal_lahir"];
$alamat = $_POST["alamat"];
$email = $_POST["email"];
$token = md5($username . $password);

// Menggunakan CONCAT untuk user_id
$ambil = $koneksi->query("INSERT INTO user (username, password, nama_lengkap, jenis_kelamin, tanggal_lahir, alamat, email, role, last_login) 
                        VALUES ('$username', '$password', '$nama_lengkap', '$jenis_kelamin', '$tanggal_lahir', '$alamat', '$email', 'anggota', NOW())");

if ($ambil) {
    echo "<script>
            alert('Anda Berhasil Registrasi!');
            document.location='login.php';
          </script>";
} else {
  $errorMessage = mysqli_error($koneksi);
echo "<script>
        alert('Registrasi Gagal. Terjadi kesalahan: " . $errorMessage . "');
        document.location='register.php';
      </script>";
}
?>
