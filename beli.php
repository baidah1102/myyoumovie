<?php 
session_start();

$id = $_GET['id_film'];

if (isset($_SESSION['pesanan'][$id]))
{
	$_SESSION['pesanan'][$id]+=1;
}

else 
{
	$_SESSION['pesanan'][$id]=1;
}

echo "<script>alert('Produk telah masuk ke pesanan anda');</script>";
echo "<script>location= 'pesanan_pembeli.php'</script>";

 ?>