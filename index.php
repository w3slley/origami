<?php 
	session_start();
	include "classes/Notes.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- To use @media you have to insert this in the html file-->
	<title>Note | Welcome!</title>
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
	</script>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Quicksand" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> <!-- This is how you display the favicon icon in the website! Fucking awesome!! -->
	<script src="javascript/main.js"></script>


</head>
<body>

	<?php if(!isset($_SESSION['id'])){ ?>
	
	<div id="signin-form">
		<h1>Login</h1>
		<form method="POST" action="action/login.php">
			<input id="signin-email" type="text" name="email_username" placeholder="E-mail or username"><br>
			<input id="signin-password" type="password" name="password" placeholder="Password"><br>
			<button id="signin-submit" type="submit" name="submit">Login</button><br>
		</form>
	</div>


	<div id="signup-form">
		<h1>Sign up</h1>
		<form method="POST" action="action/signup.php">
			<input type="text" name="first_name" placeholder="First name"><br>
			<input type="text" name="last_name" placeholder="Last name"><br>
			<input type="text" name="user_name" placeholder="Your username"><br>
			<input type="email" name="email" placeholder="Your e-mail"><br>
			<input type="password" name="password"  placeholder="Your password"><br>
			<input type="password" name="password2"  placeholder="Repeat your password"><br>
			<button type="submit" name="submit">Sign up</button>

		</form>
	</div>

	<?php 
		}
		else {
			header("Location: initial_page.php");
		}
	?>
</body>
</html>