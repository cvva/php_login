<?php 
	session_start();

	if (isset($_SESSION['user_id'])) {
		header('Location:/php_login');
	}

	require_once 'conexion.php';
	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$sql = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
		$sql = bindParam(':email', $_POST['email']);
		$sql->excute();
		$result = $sql->fetch(PDO::FETCH_ASSOC);
		$message = "";
		if (count($result) > 0 && password_verify($_POST['password'], $result['password'])) {
			$_SESSION['user_id'] = $result['id'];
			header('Location:/php_login');
		}else{
			$message = "Sorry, those credentials don not match";
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<a href="/php_login"><h2>Your App Name</h2></a>
	</header>
	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>
	<h1>Login</h1>
	<span> or <a href="singup.php">SignUP</a></span>
	<form action="login.php" method="POST">
		<input type="text" name="email" placeholder="Enter your email">
		<input type="password" name="password" placeholder="Enter your password">
		<input type="submit" value="Submit">
	</form>
</body>
</html>