<?php
include('../koneksi.php');

if (isset($_GET['id_film'])) {
    $id_film = $_GET['id_film'];

    // Lakukan query DELETE ke database sesuai dengan $id_film
    $hapus_query = $koneksi->query("DELETE FROM film WHERE id_film = '$id_film'");

    if ($hapus_query) {
        header("location: index.php");;
    } else {
        echo "Gagal menghapus film.";
    }
} else {
    echo "ID film tidak valid.";
}
?>
