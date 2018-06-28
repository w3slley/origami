<!DOCTYPE html>
<html>
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- To use @media you have to insert this in the html file-->
	<title>Notes | Signup </title>
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
	</script>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Quicksand" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/welcome.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> <!-- This is how you display the favicon icon in the website! Fucking awesome!! -->
	<script src="javascript/main.js"></script>
</head>
<body>
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
</body>
</html>

