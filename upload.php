<pre>
<?php

include 'classes/db.php';

print_r($_FILES);

$file_name = explode(".", $_FILES["file"]['name']); // iskaido fialo pavadinima i pavadinima ir pletini

$encoded_file_name = MD5($file_name[0]); // MD5 funkcija uzkoduoja tai ka irasom i skliaustelius, siuo atveju failo pavadinima be pletinio
$target_file = "files/" . $encoded_file_name . "." .$file_name[1];

move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

$db = new DB();
$db->store("INSERT INTO files (original_file_name, encoded_file_name, file_size) VALUES ('".$_FILES["file"]["name"]."', '".$encoded_file_name."', '".$_FILES["file"]["size"]."')");

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
	    <p class="lead">Spausk nuorodą ir parsisiųsk</p>
	  </div>
	</div>
	<div class="container">
		<div class="row">
			

		</div>
	</div>
</body>
</html>