<?php
include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $user_id = $_SESSION['user_id'];
    $new_role = $_POST['role'];

    // Menggunakan prepared statement untuk menghindari SQL injection
    $stmt = $koneksi->prepare("UPDATE user SET role = ? WHERE user_id = ?");

    // Periksa apakah prepared statement berhasil dibuat
    if ($stmt) {
        $stmt->bind_param("ss", $new_role, $user_id);

        // Eksekusi prepared statement
        if ($stmt->execute()) {
            // Redirect ke halaman profil setelah pembaruan berhasil
            header("location: profile.php");
            exit();
        } else {
            echo "<p>Terjadi kesalahan saat melakukan pembaruan role: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Terjadi kesalahan dalam pembuatan prepared statement.</p>";
    }
} else {
    // Jika tidak ada data POST, kembalikan pengguna ke halaman profil
    header("location: profile.php");
    exit();
}
?>
