<?php

/* namu darbai: 
1. mail send funkcija
2. max file size (check) 10 mb if funkcija $_FILE['file']['size']
3. alerts kad netinka failas..del dydzio, tipo ar pan
4. file type check (nereikia exe, zip, avi ir pan); susidarom masyva ir patikrinam ar yra toks masyve, jei yra tada neleidziam
5. downloads.php jeigu tai yra paveiksliukas jpg, png ar gif parodyti maza ikonele kad tai yra paveiksliukas, o jeigu mps sugeneruojam grotuva


*/
include 'classes/files.php';

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
	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	    <h1 class="display-3">Dokumentų pasikeitimo serveris</h1>
	    <p class="lead">Čia gali įkelti dokumentą</p>
	  </div>
	</div>
	<div class="container">
		<div class="row">
			<form method="POST" enctype="multipart/form-data" action="upload.php"> <!-- paspaudus upload nukreips i upload.php puslapi -->
				<input type="file" name="file">
				<button type="submit">Upload file</button>
			</form>

		</div>
	</div>
	<div class = "container">
	<div class="row">
	<div class ="col-md-4">
		<h1><?= $files->total_size;  ?></h1>
	</div>
	<div class ="col-md-4">
		<h1><?= $files->total_files;  ?></h1>
	</div>
	<div class ="col-md-4">
		<h1><?= $files->last_upload;  ?></h1>
	</div>
		
	</div>
	</div>
</body>
</html>