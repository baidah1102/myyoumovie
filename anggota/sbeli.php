<?php
// Pastikan pengguna sudah login
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

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

    // Hitung total
    $harga = $film['harga'];
    $total = $jumlah * $harga;

    // Ambil user_id dari sesi
    $user_id = $_SESSION['user_id'];
    $teater = $film['teater'];

    // Simpan pesanan ke dalam tabel pembelian (gunakan prepared statement)
    $stmt = $koneksi->prepare("INSERT INTO pembelian (id_beli, user_id, id_film, harga, teater, waktu, jumlah, total) 
                               VALUES (CONCAT('120', LPAD(LAST_INSERT_ID()+1, 3, '0')), ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssss", $user_id, $id_film, $harga, $teater, $waktu, $jumlah, $total);

    if ($stmt->execute()) {
        echo '<script>alert("Pesanan berhasil disimpan!"); window.location.href = "pesanan.php";</script>';
        exit();
    } else {
        echo '<script>alert("Terjadi kesalahan. Silakan coba lagi."); window.location.href = "pesan.php?id_film=' . $id_film . '";</script>';
        exit();
    }

    $stmt->close();
}
?>
