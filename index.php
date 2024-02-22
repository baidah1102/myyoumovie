<?php include "header.php"; ?>		
		<!-- Awal Page -->
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
          <h1 class="display4"><span class="font-weight-bold">MY YOU MOVIE</span></h1>
          <hr>
          <p class="lead font-weight-bold">Dengan Menonton Film Bisa Membuatmu Terasa Lebih Hidup <br> 
          Enjoy Your Movie Time</p>
        </div>
      </div>
		<br><div class="container">
		<!-- Awal Panel -->
        <p><p> <b><h1 class="text-center">NOW SHOWING</h1></p></b></p>
        <p><p> <b><h1 class="text-center">CHOOSE YOUR MOVIE</h1></p></b></p> <br>
        
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
                        <a href="login.php" class="btn btn-success btn-sm">BELI</a>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#sinopsisModal<?php echo $result['id_film']; ?>">SINOPSIS</a>
                        <a href="<?php echo $result['trailer']; ?>" class="btn btn-info btn-sm">TRAILER</a>
                    </div>
                </div>
                <?php include('sinopsis.php'); ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Akhir Panel -->
		</div><!--  Akhir Page -->
<br><?php include "footer.php"; ?>