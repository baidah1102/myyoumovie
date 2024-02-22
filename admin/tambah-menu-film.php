<?php
  session_start();
  if (empty($_SESSION['user_id'])){
    header("location:../login.php");
  }
?>
<?php include "header.php"; ?>
<?php include "../koneksi.php"; ?>
<div class="container">
    <h3 class="text-center mt-3 mb-5">SILAHKAN TAMBAH DAFTAR FILM</h3>
    <div class="card p-5 mb-5">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="film1">Nama Film</label>
                <input type="text" class="form-control" id="film1" name="nama_film" required>
            </div>
            <div class="form-group">
                <label for="harga1">Harga</label>
                <input type="text" class="form-control" id="harga1" name="harga" required>
            </div>
            <div class="form-group">
                <label for="sinopsis">Sinopsis</label>
                <textarea class="form-control" id="sinopsis" name="sinopsis" required></textarea>
            </div>
            <div class="form-group">
                <label for="trailer">Trailer</label>
                <input type="text" class="form-control" id="trailer" name="trailer" required>
            </div>
            <div class="form-group">
                <label for="gambar">Upload Foto</label>
                <input type="file" class="form-control-file border" id="gambar" name="gambar" required>
            </div><br>
            <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
            <button type="reset" class="btn btn-danger" name="reset">Hapus</button>
        </form>

        <?php
        if (isset($_POST['tambah'])) {
            $nama = mysqli_real_escape_string($koneksi, $_POST['nama_film']);
            $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
            $sinopsis = mysqli_real_escape_string($koneksi, $_POST['sinopsis']);
            $trailer = mysqli_real_escape_string($koneksi, $_POST['trailer']);

            $nama_file = $_FILES['gambar']['name'];
            $source = $_FILES['gambar']['tmp_name'];
            $folder = '../images/';

            if (move_uploaded_file($source, $folder . $nama_file)) {
                $insert = mysqli_query($koneksi, "INSERT INTO film (nama_film, harga, gambar, sinopsis, trailer) VALUES ('$nama','$harga', '$nama_file','$sinopsis','$trailer')");

 
        }
    }
        ?>


    </div>
</div>
<?php
ob_start(); // mulai output buffering

// kode PHP Anda yang sudah ada di sini

ob_end_flush(); // flush output
?>