<?php
  session_start();
  if (empty($_SESSION['user_id'])){
    header("location:../login.php");
  }
?>
<?php
// Pastikan ID Film yang akan diedit tersedia di URL
if (isset($_GET['id_film'])) {
    $id_film = $_GET['id_film'];

    // Sambungkan ke database
    include('../koneksi.php');

    // Query untuk mendapatkan data film berdasarkan ID
    $query = "SELECT * FROM film WHERE id_film = '$id_film'";
    $result = $koneksi->query($query);

    if ($result) {
        $film = $result->fetch_assoc();
        if (!$film) {
            // Film tidak ditemukan, redirect atau tampilkan pesan kesalahan
            header("Location: index.php");
            exit();
        }
    } else {
        // Query gagal, tampilkan pesan kesalahan atau redirect
        echo "Query error: " . $koneksi->error;
        exit();
    }

    // Proses form submission jika tombol 'Simpan' ditekan
    if (isset($_POST['simpan'])) {
        // Ambil data dari form
        $nama_film = mysqli_real_escape_string($koneksi, $_POST['nama_film']);
        $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
        $sinopsis = mysqli_real_escape_string($koneksi, $_POST['sinopsis']);
        $trailer = mysqli_real_escape_string($koneksi, $_POST['trailer']);

        // Update data film ke database
        $update_query = "UPDATE film SET nama_film = '$nama_film', harga = '$harga', sinopsis = '$sinopsis', trailer = '$trailer' WHERE id_film = '$id_film'";
        $update_result = $koneksi->query($update_query);

        if ($update_result) {
            // Redirect ke halaman index setelah berhasil diupdate
            header("Location: index.php");
            exit();
        } else {
            // Tampilkan pesan kesalahan jika update gagal
            echo "Update error: " . $koneksi->error;
        }
    }
} else {
    // ID Film tidak tersedia di URL, redirect atau tampilkan pesan kesalahan
    header("Location: index.php");
    exit();
}
?>

<?php include "header.php"; ?>

<div class="container">
    <h3 class="text-center mt-3 mb-5">EDIT DAFTAR FILM</h3>
    <div class="card p-5 mb-5">
        <form method="POST" action="">
            <div class="form-group">
                <label for="film1">Nama Film</label>
                <input type="text" class="form-control" id="film1" name="nama_film" value="<?php echo $film['nama_film']; ?>" required>
            </div>
            <div class="form-group">
                <label for="harga1">Harga</label>
                <input type="text" class="form-control" id="harga1" name="harga" value="<?php echo $film['harga']; ?>" required>
            </div>
            <div class="form-group">
                <label for="sinopsis">Sinopsis</label>
                <textarea class="form-control" id="sinopsis" name="sinopsis" required><?php echo $film['sinopsis']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="trailer">Trailer</label>
                <input type="text" class="form-control" id="trailer" name="trailer" value="<?php echo $film['trailer']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="simpan">Simpan Perubahan</button>
        </form>
    </div>
</div>

<?php include "footer.php"; ?>
