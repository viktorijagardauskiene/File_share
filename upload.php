<pre>
<?php

include 'classes/db.php';
define("SITEURL", "//localhost/viktorijag/file_share/");

print_r($_FILES);

$file_name = explode(".", $_FILES["file"]['name']); // iskaido fialo pavadinima i pavadinima ir pletini

$encoded_file_name = MD5($file_name[0]); // MD5 funkcija uzkoduoja tai ka irasom i skliaustelius, siuo atveju failo pavadinima be pletinio
$target_file = "files/" . $encoded_file_name . "." .$file_name[1];

move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

$crypt = md5($file_name[0] . rand(1,100000));

$db = new DB();
$db->store("INSERT INTO files (original_file_name, encoded_file_name, file_size, crypt) VALUES ('".$_FILES["file"]["name"]."', '".$encoded_file_name.".".$file_name[1]."', '".$_FILES["file"]["size"]."', '".$crypt."')");

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
	    <p class="lead">Štai nuoroda</p>
	  </div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Tavo dokumentas buvo įkeltas</h2>
				<P>Dokumento pavadinimas: <?= $_FILES['file']['name']; ?> </P>
				<P>Dokumento dydis: <?= $_FILES['file']['size']; ?> </P>
				<P>Dokumento nuoroda: <a href="<?= SITEURL; ?>/download.php?crypt=<?= $crypt ?>"> Spausk ir parsisiųsk </a> </P> <!-- SITEURL yra sukurtas virsuje su define funkcija-->
			</div>
		</div>
	</div>
</body>
</html>