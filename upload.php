<?php


include 'classes/db.php';
include 'classes/files.php';
define("SITEURL", "//localhost/viktorijag/file_share/");

$files = new Files();
$files->uploadFile($_FILES["file"]);


?>


<!DOCTYPE html>
<html>
<head>
	<title>File share</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<h1>File share</h1>
			
		</div>
	</div>
	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	    <h1 class="display-3">Dokumentų pasikeitimo serveris</h1>
	    <p class="lead">Štai nuoroda</p>
	  </div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Tavo dokumentas buvo įkeltas</h2>
				<P>Dokumento pavadinimas: <?= $files->file_name; ?> </P>
				<P>Dokumento dydis: <?= $files->file_size; ?> </P>
				<P>Dokumento nuoroda: <a href="<?= SITEURL; ?>/download.php?crypt=<?= $files->crypt ?>"> Spausk ir keliauk i download </a> </P> <!-- SITEURL yra sukurtas virsuje su define funkcija-->
			</div>
		</div>
	</div>
	<?= include 'inc/cards.php'; ?>
</body>
</html>