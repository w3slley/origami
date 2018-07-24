<?php 
	session_start();
	include "classes/Notes.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- To use @media you have to insert this in the html file-->
	<title>Notes | Welcome!</title>
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
	</script>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Quicksand" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/welcome.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> <!-- This is how you display the favicon icon in the website! Fucking awesome!! -->
	<script src="java-script/main.js"></script>
	<link href="https://fonts.googleapis.com/css?family=IM+Fell+English+SC|Poor+Story|Ubuntu|Amatic+SC|Righteous|Kaushan+Script|Cardo" rel="stylesheet">


</head>
<body>

	<?php if(!isset($_SESSION['id'])){ 
		?>
	

	<div id="signin-form">
		<h1>Login</h1>
		<form method="POST" action="action/login.php">
			<input id="signin-email" type="text" name="email_username" placeholder="E-mail or username"><br>
			<input id="signin-password" type="password" name="password" placeholder="Password"><br>
			<button id="signin-submit" type="submit" name="submit">Login</button><br>
		</form>

		<p id="text-signup">Don't have an account yet? <a href="signup.php">Click here</a> to sign up!</p>
	</div>

	<div class="welcome">
		<img id="logo" src="favicon.ico">
		<h1 id="welcome-header">Notes</h1>
		<p id="welcome-text">Your new personal notebook! Write what you think and store important moments of your life. </p>
	</div>

	<video id="background-video" loop autoplay >
		<source src="videos/background-video.mov" type="video/mp4">
	</video>

	

	<?php 
		}
		else {
			header("Location: initial_page.php");
		}
	?>
	
</body>
</html>
