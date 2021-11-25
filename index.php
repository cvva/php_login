<?php 
	session_start();
	require_once 'conexion.php';
	if (isset($_SESSION['user_id'])) {
		$sql = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
		$sql -> bindParam(":id",$_SESSION['user_id']);
		$sql -> execute();
		$result = $sql->fetch(PDO::FETCH_ASSOC);
		$user = null;
		if (count($result) > 0) {
			$user = $result;
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<a href="/php_login"><h2>Your App Name</h2></a>
	</header>
	<?php if (!empty($user)):?>
		<br>Welcome <?= $user['email']; ?>
		<br>You are successfully Logged In
		<a href="logout.php">Logout</a>
	<?php else: ?>
		<h1>Please Login or SignUP</h1>
		<a href="login.php">Login</a> Or
		<a href="signup.php">SignUP</a>
	<?php endif; ?>
</body>
</html>