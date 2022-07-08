<?php
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'juan');
	define('DB_PASSWORD', '1234');
	define('DB_DATABASE', 'test');
	define('DB_PORT', '3307');
	$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE,DB_PORT);

	if($conn->connect_error){
		die("Fallo en la conexión: " . $conn->connect_error);
	}
?>







<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Low Security Login</title>
	<link rel="stylesheet" type="text/css"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-10">
				<div class="page-header">
					<h2>Login PHP con Validacion - Dificultad : Baja</h2>
				</div>
				<p>Por favor rellene los siguientes campos</p>
				<form method="GET" id="form-login" onsubmit="check()">
					<div class="form-group ">
						<label>userID</label>
						<input type="userID" name="userID" class="form-control" value="" maxlength="200" required="">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" value="" maxlength="200">
					</div>
					<input type="submit" class="btn btn-primary" name="login" value="Acceder">
					<br>
					<p>
						<a href="http://localhost/tfgJuanCastaño/index.html">Exit</a>
					</p>
				</form>
			</div>
		</div>
	</div>
</body>
</html>


<?php
if(isset($_GET['userID'])){
	// Get input
	$id = $_REQUEST[ 'userID' ];
	$pass = $_REQUEST[ 'password' ];
	$exists = false;

	// Check database
	$query  = "SELECT * FROM users WHERE user = '$id' AND password = '$pass';";
	$result = mysqli_query($conn,  $query ); // Removed 'or die' to suppress mysql errors

	$exists = false;
	if ($result !== false) {
		try {
			$exists = (mysqli_num_rows( $result ) > 0);
		} catch(Exception $e) {
			$exists = false;
		}
	}

	if ($exists) {
		// Feedback for end user
		echo '<i style="color:green;font-size:25px;font-family:calibri ;"> Acceso PERMITIDO  </i> ';
		echo "<br>";
		echo 'bienvenido, ';
		echo $id;
	} else {

		echo '<i style="color:red;font-size:25px;font-family:calibri ;"> Acceso DENEGADO  </i> ';

		// Feedback for end user
		
	}
}
?>
