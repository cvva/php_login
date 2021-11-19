<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PDO</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<h1>Conexion a BD - PDO</h1>
	<?php 
		try {
			$conexion = new PDO("mysql:host=localhost;dbname=dbventas","root","");
			echo "Se ha establecido la conexion al servidor";
		} catch (PDOException $e) {
			echo "No se ha establecido la conexion<br>";
			die("Error : ".$e->getMessage());
		}
		$consulta = $conexion->query("SELECT id, nombres, apellidos, edad FROM persona"); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>NOMBRES</th>
					<th>APELLIDOS</th>
					<th>EDAD</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($per = $consulta->fetchObject()) { ?>
				
				<tr>
					<td><?=$per->id?></td>
					<td><?=$per->nombres?></td>
					<td><?=$per->apellidos?></td>
					<td><?=$per->edad?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	
</body>
</html>