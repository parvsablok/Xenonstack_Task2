<?php 
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<h1>This is the index page</h1>

	<br>
	Hello, <?php echo $user_data['user_name']; ?>

	<!-- Add login and sign-in buttons -->
	<div>
		<h2>Choose an option:</h2>
		<ul>
			<li><a href="login.php">Log In</a></li>
			<li><a href="signin.php">Sign In</a></li>
		</ul>
	</div>

</body>
</html>
