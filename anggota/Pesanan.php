<?php include "header.php"; ?>

<?php 

if(@$_GET['pesan']=="Pesanan Berhasil"){

?>
        <div class="alert alert-success">
        Pesanan Berhasil!
        </div>
<?php

}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Data Pembelian Film</h1>

            <table id="dataTables" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Judul Film</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Waktu</th>
                        <th>Teater</th>
                        <th>Tindakan</th>
                    </tr> 
                </thead> 
                <tbody>
                    <?php
                    include "../koneksi.php";
                    
                    // Gunakan JOIN untuk mengambil data dari kedua tabel
                    $user_id = $_SESSION['user_id'];
                    $sql = $koneksi->query("SELECT pembelian.*, film.nama_film FROM pembelian
                    JOIN film ON pembelian.id_film = film.id_film
                    WHERE pembelian.user_id = '$user_id'");

                    while ($row = $sql->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['nama_film'] ?></td>
                            <td><?php echo $row['jumlah'] ?></td>
                            <td><?php echo $row['harga'] ?></td>
                            <td><?php echo $row['total'] ?></td>
                            <td><?php echo $row['waktu'] ?></td>
                            <td><?php echo $row['teater'] ?></td>
                            <td>
                                <a href="hapusp.php?id=<?php echo $row['id_beli'] ?>" onclick=" return confirm('Anda yakin menghapus pesanan?')">
                                    <button class="btn btn-xs btn-warning glyphicon glyphicon-remove"></button>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#paymentModal">
                                    <button class="btn btn-xs btn-warning glyphicon glyphicon-primary">Bayar</button>
                                </a>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Bootstrap untuk Pilihan Metode Pembayaran -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Pilih Metode Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Tambahkan opsi metode pembayaran di sini -->
                <p><strong>Dana:</strong> <a href="https://link.dana.id/minta/2tpl0a562uc" target="_blank">Bayar dengan Dana</a></p>
                <!-- Tambahkan opsi metode pembayaran lain jika diperlukan -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<br><?php include "footer.php"; ?>
