
<?php
session_start();
include('koneksi.php');

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika belum login, arahkan ke halaman login
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentukan Film Anda Hari Ini</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bootstrap/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<link href="../bootstrap/css/styles.css" rel="stylesheet">
        <link href="../DataTables/datatables.min.css" rel="stylesheet">
		<style>
      .jumbotron {
	background-image: url(background/bg1.jpg);
	background-size: cover;
	height: 450px;
	width: 100%;
	color: white;
}
.jumbotron .display-4 {
	margin-top: 30px;
}

.jumbotron p {
	font-size: 23px;
}

.jumbotron hr {
	border-color: white;
	width: 400px;
	border-width: 3px;
}
.card-img:hover {
	box-shadow: 2px 2px 10px rgba(0,0,0,0.4);	
}

      .header {
      background-color: black;
      color: #fff;
      padding: 20px;
      text-align: center;
    }
      body {
        padding-top: 60px;
      }
		</style>
  </head>
  <body>


<!-- Awal script Navbar -->
<nav class="navbar navbar-default navbar-fixed-top" id="scrollspy">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle Nav</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php
            // Cek apakah pengguna sudah login
            if (isset($_SESSION['user_id'])) {
                // Jika sudah login, tampilkan navbar dengan menyapa pengguna
                echo '<a class="navbar-brand" href="index.php">Hello, ' . $_SESSION['username'] . '</a>';
            } else {
                // Jika belum login, tampilkan navbar dengan menyapa tamu
                echo '<a class="navbar-brand" href="index.php">Hello, Guest</a>';
            }
            ?>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
        <li class="active">
            <a href="index.php"><span class="glyphicon glyphicon-home"></span> Home <span class="sr-only">(current)</span></a>
        </li>
        <li>
            <a href="about.php"><span class="glyphicon glyphicon-user"></span> About</a>
        </li>
        <li>
            <a href="contact.php"><span class="glyphicon glyphicon-earphone"></span> Contact Us</a>
        </li>
        <li>
            <a href="pesanan.php"><span class="glyphicon glyphicon-film"></span> Pesanan</a>
        </li>
        <?php
        // Jika sudah login, tampilkan dropdown profil
        if (isset($_SESSION['username'])) {
            echo '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> Profil <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php">Profil</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>';
        }
        ?>
    </ul>
</div>

</nav><!-- Akhir script Navbar -->
