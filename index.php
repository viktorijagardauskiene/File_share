<?php

/* namu darbai: 
1. mail send funkcija
2. max file size (check) 10 mb if funkcija $_FILE['file']['size']
3. alerts kad netinka failas..del dydzio, tipo ar pan
4. file type check (nereikia exe, zip, avi ir pan); susidarom masyva ir patikrinam ar yra toks masyve, jei yra tada neleidziam
5. downloads.php jeigu tai yra paveiksliukas jpg, png ar gif parodyti maza ikonele kad tai yra paveiksliukas, o jeigu mps sugeneruojam grotuva


*/
include 'classes/files.php';
include 'classes/db.php'; 

$files = new Files();

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
	<?= include 'inc/header.php'; ?>
	<div class="container">
		<div class="row">
			<form method="POST" enctype="multipart/form-data" action="upload.php"> <!-- paspaudus upload nukreips i upload.php puslapi -->
				<input type="file" name="file">
				<button type="submit">Upload file</button>
			</form>

		</div>
	</div>
	<?= include 'inc/cards.php'; ?>
</body>
</html>