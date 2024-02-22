<?php
  session_start();
  if (empty($_SESSION['user_id'])){
    header("location:../login.php");
  }
?>
<?php include "header.php"; ?>

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
                        <th>Pembayaran</th>
                        <th>Tindakan</th>
                    </tr> 
                </thead> 
                <tbody>
                    <?php
                    include "../koneksi.php";
                    
                    // Gunakan JOIN untuk mengambil data dari kedua tabel
                    $user_id = $_SESSION['user_id'];
                    $sql = $koneksi->query("SELECT pembelian.*, film.nama_film FROM pembelian
                    JOIN film ON pembelian.id_film = film.id_film");

                    while ($row = $sql->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['nama_film'] ?></td>
                            <td><?php echo $row['jumlah'] ?></td>
                            <td><?php echo $row['harga'] ?></td>
                            <td><?php echo $row['total'] ?></td>
                            <td><?php echo $row['waktu'] ?></td>
                            <td><?php echo $row['teater'] ?></td>
                            <td><?php echo $row['pembayaran'] ?></td>
                            <td>
                                <a href="hapusp.php?id=<?php echo $row['id_beli'] ?>" onclick=" return confirm('Anda yakin menghapus pesanan?')">
                                    <button class="btn btn-xs btn-warning glyphicon glyphicon-remove"></button>
                                </a>
                                <a href="lunas.php?id=<?php echo $row['id_beli'] ?>" onclick=" return confirm('Pastikan Pemyaran Telah Diterima?')">
                                    <button class="btn btn-xs btn-warning glyphicon glyphicon-ok"></button>
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

<br><?php include "footer.php"; ?>
