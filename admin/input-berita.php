<?php
  session_start();
  if (empty($_SESSION['user_id'])){
    header("location:../login.php");
  }
?>
<?php include "header.php";?>
<div class="container">
		<div class="row">
			<div class="col-md-8">	
				<form action="proses-input-berita.php" method="post">
					<div class="form-group">
						<h3>Input Artikel</h3>
						<label for="judul">Judul:</label>
						<input type="text" class="form-control" name="judul" placeholder="Isikan judul berita">
					</div>
					<div class="form-group">
						<label for="artikel">Isi:</label>
						<textarea name="isi" id="editor"></textarea>
            <script>
    CKEDITOR.replace('editor', {
      removePlugins: 'easyimage',
      removeButtons: 'PasteFromWord',
     
      
      filebrowserUploadUrl: 'upload-image-berita.php',
      filebrowserUploadMethod: 'form'
    });
  </script>
						
					</div>
					<button type="submit" class="btn btn-info">Simpan</button>
					<button type="reset" class="btn btn-danger">Batal</button>
				</form>
		</div>
	</div>
</div>
<?php include "footer.php";?>