<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentukan Film Anda Hari Ini</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/styles.css" rel="stylesheet">
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
          <a class="navbar-brand" href="index.php">Hello, Guest</a>
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
							<a href="movie.php"><span class="glyphicon glyphicon-film"></span> Movies</a>
						</li>
            <li>
							<a href="login.php"><span class="glyphicon glyphicon-lock"></span> Login</a>
						</li>
          </ul>
        </div>
      </div>
    </nav><!-- Akhir script Navbar -->