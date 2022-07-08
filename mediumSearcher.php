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
	<title>Medium Security Searcher</title>
	<link rel="stylesheet" type="text/css"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-10">
				<div class="page-header">
					<h2>Buscador de ID con PHP</h2>
				</div>
				<p>Por favor rellene el siguiente campo</p>
				<p>Dificultad : Media</p>
				<form method="GET" id="form-login" onsubmit="check()">
					<div class="form-group ">
						<label>id</label>
						<input type="id" name="id" class="form-control" value="" maxlength="200" required="">
					<input type="submit" class="btn btn-primary" name="login" value="Acceder">
					<br>
				</form>
			</div>
		</div>
	</div>
</body>

</html>


<?php
if(isset($_GET['id'])){
	// Get input
	$id = $_REQUEST[ 'id' ];
	$id = mysqli_real_escape_string($conn, $id);

	// Check database
	if(!$query  = "SELECT first_name, last_name FROM users WHERE user_id = $id;"){
		echo mysqli_error($conn);
	}
	if(!$result = mysqli_query($conn,  $query )){
		echo mysqli_error($conn);
	} // Removed 'or die' to suppress mysql errors

	else{
		$numRows = $result->num_rows;
		while( $row = mysqli_fetch_assoc( $result ) ) {
			// Get values
			
			$first = $row["first_name"];
			$last  = $row["last_name"];
			// Feedback for end user
			echo "<br>";
			echo '<i style="color:blue;font-size:20px;font-family:calibri ;"> Nombre:  </i> ';
			echo $first;
			echo "<br>";
			echo '<i style="color:blue;font-size:20px;font-family:calibri ;"> Apellido:  </i> ';
			echo $last;
		}
		if($numRows==0){
			echo '<i style="color:blue;font-size:20px;font-family:calibri ;"> No se ha encontrado a ningún usuario con ese ID  </i> ';
		}
	}
	mysqli_close($conn);
}
?>

<html>
<body>
	<p>
		<a href="http://localhost/tfgJuanCastaño/index.html">Exit</a>
	</p>
</body>
</html>