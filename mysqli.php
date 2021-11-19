<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MySQLi</title>
	<style>
		table{
			border-collapse: collapse;
			width: 100%;
		}
		td, th{
			border: 1px solid blue;
			text-align: left;
			padding: 8px;
		}
	</style>
</head>
<body>
	<h1>Conexion a BD - MySQLi</h1>
	<?php 
		$servidor="localhost";
		$username="root";
		$password="";
		$dbname="dbventas";
		// $conexion = new mysqli("localhost","root","","dbventas");
		$conexion = new mysqli($servidor,$username,$password,$dbname);
		if ($conexion->connect_errno > 0) {
			echo "No se ha podido establece la conexion<br>";
			die("Error: ".$conexion->connect_error);
		}else{
			// echo "Se ha establecido la conexion";
			// $sql = $conexion->query('SELECT * FROM persona WHERE id = 2');
			// $persona = $sql->fetch_object();
			// echo "Nombre : ".$persona->nombres."<br>";
			// echo "Apellidos : ".$persona->apellidos."<br>";
			// echo "Edad : ".$persona->edad."<br>";
			$sql = $conexion->query('SELECT * FROM persona'); ?>
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>NOMBRES</th>
						<th>APELLIDOS</th>
						<th>EDAD</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($per = $sql->fetch_object()) { ?>
					
					<tr>
						<td><?=$per->id?></td>
						<td><?=$per->nombres?></td>
						<td><?=$per->apellidos?></td>
						<td><?=$per->edad?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		<?php }
	 ?>
</body>
</html>