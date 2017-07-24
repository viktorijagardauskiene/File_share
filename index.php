<?php




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
</body>
</html>