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
	<title>High Security Searcher</title>
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
				<p>Dificultad : Alta</p>
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
	if(is_numeric( $id )) {
		$id = intval ($id);
		// Check database
		if(!$stmt   = $conn->prepare( 'SELECT first_name, last_name FROM users WHERE user_id = ? LIMIT 1;' )){
			echo mysqli_error($conn);
		}
		if(!$stmt->bind_param('i', $id)){
			echo mysqli_error($conn);
		}
		if(!$stmt->execute()){
			echo mysqli_error($conn);
		}

		$result = $stmt->get_result();
		if($row = $result->fetch_assoc()) {
			$first = $row[ 'first_name' ];
			$last  = $row[ 'last_name' ];
			echo '<i style="color:blue;font-size:20px;font-family:calibri ;"> Nombre:  </i> ';
			echo $first;
			echo "<br>";
			echo '<i style="color:blue;font-size:20px;font-family:calibri ;"> Apellido:  </i> ';
			echo $last;
		}
		else{
			echo '<i style="color:blue;font-size:20px;font-family:calibri ;"> No se ha encontrado a ningún usuario con ese ID  </i> ';
		}
		$stmt->close();
		mysqli_close($conn);
	}
	else {
		echo '<i style="color:red;font-size:20px;font-family:calibri ;"> El ID debe ser un número  </i> ';
	}
}
?>

<html>
<body>
	<p>
		<a href="http://localhost/tfgJuanCastaño/index.html">Exit</a>
	</p>
</body>
</html>
