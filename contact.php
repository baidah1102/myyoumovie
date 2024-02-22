<?php include "header.php"; ?>
		
		<!-- Awal Page -->
		<div class="container">
		<!-- Awal baris -->
		<div class="row">
			<div class="col-md-12"><!-- Awal Kolom Pertama -->
			<div class="panel panel-default">
				<div class="panel-body">
				<h2 style="text-muted"><span class="glyphicon glyphicon-earphone"></span> Contact</h2>
				<?php 

					if(@$_GET['pesan']=="inputBerhasil"){

					?>
									<div class="alert alert-success">
									Terima kasih, pesan anda sudah terkirim!
									</div>
					<?php

					}

					?>
					<form action="proses-komentar.php" method="post">
						<table class="table table-hover">
							<tr>
								<td>Nama Lengkap
								<input type="text" name="nama" class="form-control input-md" placeholder="Isikan nama anda dengan lengkap" required>
								</td>
							</tr>
							<tr>
								<td>Alamat Email
								<input type="email" name="email" class="form-control input-md" placeholder="Isikan alamat email yang masih aktif" required>
								</td>
							</tr>
							<tr>
								<td>Pesan Dan Saran
								<textarea name="pesan" class="form-control input-md" required> </textarea>
								</td>
							</tr>
							<p> Silahkan hubungi kami melalui Email, No-Telp serta alamat yang tertera dibawah ini:
							<ul>
						<li>Email : MyYouMoviee@gmail.com</li>
						<li>No-Telp : +643498765</li>
						<li>Alamat : Jakarta Selatan Blok M Baru </li>
						</ul>
						Dan isikan formulir dibawah ini agar kami bisa menerima saran pembaruan dari anda.
						Terima Kasih </P>
							<tr>
								<td>
								<input type="submit" value="Kirim" class="btn btn-lg btn-info"> <input type="reset" value="Batal" class="btn btn-lg btn-primary">
								</td>
							</tr>
						</table>
					</form>
				</div>
      </div>
			</div><!-- Akhir Kolom Pertama -->
		</div><!-- Akhir Baris -->
		</div><!--  Akhir Page -->
		
<?php include "footer.php"; ?>