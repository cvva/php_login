<?php 
	require_once 'conexion.php';
	$message = "";
	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':email', $_POST['email']);
		$pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$stmt->bindParam(':password', $pass);
		if ($stmt->execute()) {
			$message = "Succefully created new user";
		}else{
			$message = "Sorry there must have been an ussue creating your account";
		} 
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign Up</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<a href="/php_login"><h2>Your App Name</h2></a>
	</header>
	<?php if (!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>
	<h1>Sign Up</h1>
	<span> Or <a href="login.php">Login</a></span>

	<form action="signup.php" method="POST">
		<input type="text" name="email" placeholder="Enter your email">
		<input type="password" name="password" placeholder="Enter your password">
		<input type="password" name="confirm_password" placeholder="Enter your password">
		<input type="submit" value="Submit">
	</form>
</body>
</html>