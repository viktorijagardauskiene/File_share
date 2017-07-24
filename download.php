<pre>
<?php
include "classes/db.php";
define("SITEURL", "//localhost/viktorijag/file_share/");

$result = DB::query("SELECT * FROM files WHERE crypt = '". $_GET['crypt']. "' ")[0];
print_r($result);


?>
</pre>

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
	    <p class="lead">Štai nuoroda - spausk ir parsisiųsk</p>
	  </div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Jau gali parsisiųsti savo dokumentą: <?= $result->original_file_name; ?></h2>
				<P>Dokumento dydis: <?= $result->file_size; ?> </P>
				<P>Dokumento nuoroda: <a download href="<?= SITEURL; ?>files/<?= $result->encoded_file_name ?>"> Spausk ir parsisiųsk </a> </P> <!-- SITEURL yra sukurtas virsuje su define funkcija-->
			</div>
		</div>
	</div>
</body>
</html>