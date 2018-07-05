<!DOCTYPE html>
<html>
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- To use @media you have to insert this in the html file-->
	<title>Notes | Signup </title>
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
	</script>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Quicksand|Open+Sans+Condensed:300" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="css/index-signup.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> <!-- This is how you display the favicon icon in the website! Fucking awesome!! -->
	<script src="javascript/signup.js"></script>
</head>
<body>
	<div id="signup-form">
		<h1>Join the club!</h1>
		<form class="signup-form" method="POST" action="action/signup.php">
			<input class="first_name" type="text" name="first_name" placeholder="First name"><br>
			<input class="last_name" type="text" name="last_name" placeholder="Last name"><br>
			<input class="user_name" type="text" name="user_name" placeholder="Your username"><small id="small-username"></small><br>
			<input class="email" type="email" name="email" placeholder="Your e-mail"><small id="small-email"></small><br>
			<input class="password" type="password" name="password"  placeholder="Your password"><br>
			<input class="password2" type="password" name="password2"  placeholder="Repeat your password"><br>
			<button type="submit" name="submit">Sign up</button>

		</form>
	</div>
	
</body>
</html>

