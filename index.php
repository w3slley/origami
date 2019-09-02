<?php 
	session_start();
	include "classes/Notes.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- To use @media you have to insert this in the html file-->
	<title>Origami | Welcome!</title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
	</script>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Quicksand|Anton|Ubuntu|Rajdhani" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/welcome.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> <!-- This is how you display the favicon icon in the website! Fucking awesome!! -->
	<link href="https://fonts.googleapis.com/css?family=IM+Fell+English+SC|Poor+Story|Ubuntu|Amatic+SC|Righteous|Kaushan+Script|Cardo|Poiret+One" rel="stylesheet">
	

</head>
<body>

	<?php if(!isset($_SESSION['id'])){ 
		?>
	<!-- Code for the nav bar. I will still add the javascript effects to change collors and stuff. -->
	
	<nav class="nav-bar">
		<div class="logo-nav">
			<img src="icons/logo.svg" class="nav-img">
			<p id="welcome-header">Origami</p>
		</div>

		<img class="sidebar-icon" src="images/side.png">
		
		<ul>
			<li><a class="item-nav home" href="#">Home</a></li>
			<li><a class="item-nav" href="#">About</a></li>
			<li><a class="item-nav" href="#">Contact</a></li>
			<li><a class="item-nav signup" href="signup.php">Sign up</a></li>
		</ul>
	</nav>

	<div class="blur">
		
		<div class="header-left">
			<div class="welcome">
				<p id="welcome-text">Welcome to Origami, your new personal notebook! </p>
			</div>
		</div>

		<div class="header-right">
		<div id="signin-form">
				
				<form method="POST" action="action/login.php">
					<input autofocus id="signin-email" type="text" name="email_username" placeholder="E-mail or username"><br>
					<input id="signin-password" type="password" name="password" placeholder="Password"><br>
					<button id="signin-submit" type="submit" name="submit">Login</button><br>
				</form>

				<p id="text-signup">Don't have an account yet? <a href="signup.php">Click here</a> to sign up!</p>
			</div>
		</div>
	</div>
	<div class="sidebar">
		<ul>
			<li><a class="item-nav" href="#">About</a></li>
			<li><a class="item-nav" href="#">Contact</a></li>
			<li><a class="item-nav" href="#">Sign up</a></li>
			<li><a class="item-nav" href="#">Log in</a></li>
		</ul>
		<span class="close">&times;</span>
	</div>

	<div class="container main">
		<div class="row" id="first-text" >
			<div class="col-md-6 col-ms-6">
				<img src="icons/starbucks.png">
			</div>
			<div class="col-md-6 col-ms-6">
				<h1>Write what you want, whenever you want!</h1>
				<p>With Origami, you can store whatever pops up in your head without any effort. In the plataform, it's very easy and intuitive to add new thoughts. Give it a try!</p>
			</div>
			
		</div>
		<div class="row"  id="second-text">
			<div class="col-md-6 col-ms-6">
				<img src="icons/typewriter_shot.png">
			</div>
			<div class="col-md-6 col-ms-6">
				<h1>No complications!</h1>
				<p>Just create an account and you are ready to start creating new things.</p>
			</div>
			
		</div>
	</div>
	<div class="container container2">	
         <div class="row">
              <div class="col-md-6">
                <img id="img-left" src="icons/note5.svg">
                <h3>Start today!</h3>
                <p>You can start using Origami today without paying anything. It's completely free!</p>
              </div>
              <div class="col-md-6">
                <img id="img-center" src="icons/note2.svg">
                <h3>Are you a company? </h3>
                <p>If so, you can use Origami to increase productivity in the office and deliver more for your customers.</p>
              </div>      
           </div>    
      </div>
    <footer>
    	<ul>
    		<li><a href="#">About</a></li>
    		<li><a href="#">Contact</a></li>
    	</ul>
    	<p class="trademark">Created by Weslley. 2018-2019. All rights reserved. </p>
		<p class="trademark">Illustrations by Alex Kunchevsky.</p>
    </footer>
	<?php 
		}
		else {
			header("Location: initial_page.php");
		}
	?>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="javascript/welcome.js"></script>
</body>
</html>