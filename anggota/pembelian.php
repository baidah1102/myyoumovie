<?php include "header.php"; ?>

<?php
// Ambil ID film dari parameter URL
$id_film = $_GET['id_film'];

// Ambil informasi film dari database
$sql_film = $koneksi->query("SELECT * FROM film WHERE id_film = '$id_film'");
$film = $sql_film->fetch_assoc();

// Tangkap data dari formulir jika disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi formulir
    $jumlah = filter_input(INPUT_POST, 'jumlah', FILTER_VALIDATE_INT);
    $waktu = $_POST['waktu'];

    if (!$jumlah || $jumlah <= 0) {
        echo '<script>alert("Jumlah pesanan tidak valid!"); window.location.href = "pesan.php?id_film=' . $id_film . '";</script>';
        exit();
    }

    // Hitung total setelah validasi
    $harga = $film['harga'];
    $total = $jumlah * $harga;

    // Ambil user_id dari sesi
    $user_id = $_SESSION['user_id'];
    $teater = $film['teater'];

    // Simpan pesanan ke dalam tabel pembelian (gunakan prepared statement)
    $stmt = $koneksi->prepare("INSERT INTO pembelian (user_id, id_film, harga, teater, waktu, jumlah, total) 
                               VALUES (?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("sssssss", $user_id, $id_film, $harga, $teater, $waktu, $jumlah, $total);

        if ($stmt->execute()) {
            header("location:pesanan.php?pesan=Pesanan Berhasil");
        } else {
            echo '<script>alert("Error in prepared statement: ' . $koneksi->error . '");</script>';
        }

        $stmt->close();
    } else {
        echo '<script>alert("Error in prepared statement: ' . $koneksi->error . '");</script>';
    }
}
?>

<div class="container">
    <h2>Detail Pembelian Film</h2>
    <table class="table">
        <tr>
            <td><strong>Nama Film:</strong></td>
            <td><?php echo $film['nama_film']; ?></td>
        </tr>
        <tr>
            <td><strong>Harga:</strong></td>
            <td>Rp. <?php echo number_format($film['harga']); ?></td>
        </tr>
        <tr>
            <td><strong>Teater:</strong></td>
            <td><?php echo $film['teater']; ?></td>
        </tr>
    </table>

    <!-- Formulir untuk memilih waktu -->
    <form method="post" action="">
        <table class="table">
            <tr>
                <td><label for="jumlah">Jumlah Tiket:</label></td>
                <td>
                    <input type="number" name="jumlah" id="jumlah" min="1" required>
                </td>
            </tr>
            <tr>
                <td><label for="waktu">Pilih Waktu:</label></td>
                <td>
                    <select name="waktu" id="waktu" required>
                        <option value="08:00">08:00</option>
                        <option value="12:00">12:00</option>
                        <option value="16:00">16:00</option>
                        <!-- Tambahkan opsi waktu sesuai kebutuhan Anda -->
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary">Simpan Pesanan</button>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php include "footer.php"; ?>
