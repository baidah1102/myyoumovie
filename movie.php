<?php include "header.php"; ?>	
<div class="container">
    <div class="row mt-3">

        <?php
        include('koneksi.php');

        $sql = $koneksi->query("SELECT * FROM film");
        $results = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        ?>

<?php foreach ($results as $result) : ?>
            <div class="col-md-4 mt-3" style="margin-bottom: 30px;">
                <div class="card border-dark">
                    <img src="images/<?php echo $result['gambar'] ?>" width="200" height="300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold"><?php echo $result['nama_film'] ?></h5>
                        <label class="card-text harga"><strong>Rp.</strong> <?php echo number_format($result['harga']); ?></label><br>
                        <a href="pesanan_pembeli.php?id_film=<?php echo $result['id_film']; ?>" class="btn btn-success btn-sm">BELI</a>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#sinopsisModal<?php echo $result['id_film']; ?>">SINOPSIS</a>
                        <a href="<?php echo $result['trailer']; ?>" class="btn btn-info btn-sm">TRAILER</a>
                    </div>
                </div>
                <?php include('sinopsis.php'); ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>






<br><?php include "footer.php"; ?>