<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and update user profile information in the database
    $user_id = $_SESSION['user_id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];

    // Perform the update query using a prepared statement
    $stmt = $koneksi->prepare("UPDATE user SET nama_lengkap = ?, tanggal_lahir = ?, alamat = ?, email = ? WHERE user_id = ?");
    if ($stmt) {
        $stmt->bind_param("sssss", $nama_lengkap, $tanggal_lahir, $alamat, $email, $user_id);

        if ($stmt->execute()) {
            // Redirect to the profile page after updating
            header("Location: profile.php");
            exit();
        } else {
            echo "Terjadi kesalahan dalam eksekusi prepared statement: " . $stmt->error;
            exit();
        }

        $stmt->close();
    } else {
        echo "Terjadi kesalahan dalam pembuatan prepared statement.";
        exit();
    }
}
?>
