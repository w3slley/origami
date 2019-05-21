<?php 
	session_start();
	include "classes/Notes.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- To use @media you have to insert this in the html file-->
	<title>Notes | Welcome!</title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
	</script>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Quicksand" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/welcome.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> <!-- This is how you display the favicon icon in the website! Fucking awesome!! -->
	<link href="https://fonts.googleapis.com/css?family=IM+Fell+English+SC|Poor+Story|Ubuntu|Amatic+SC|Righteous|Kaushan+Script|Cardo|Poiret+One" rel="stylesheet">
	

</head>
<body>

	<?php if(!isset($_SESSION['id'])){ 
		?>
	<!-- Code for the nav bar. I will still add the javascript effects to change collors and stuff. -->
	<nav class="nav-bar">
		<ul>
			<li><a class="item-nav" href="#">Home</a></li>
			<li><a class="item-nav" href="#first-text">About</a></li>
			<li><a class="item-nav" href="#second-text">Pricing</a></li>
			<li><a class="item-nav" href="#second-text">Contact</a></li>
		</ul>
	</nav>
	
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

	<div class="container main">
		<div class="row" id="first-text" >
			<div class="col-md-6 col-ms-6">
				<img src="icons/note.svg">
			</div>
			<div class="col-md-6 col-ms-6">
				<h1>Write what you want, whenever you want!</h1>
				<p>With Notes, you can store whatever pops up in your head without any effort. In the plataform, it's very easy and intuitive to add new thoughts. Give it a try!</p>
			</div>
			
		</div>
		<div class="row"  id="second-text">
			<div class="col-md-6 col-ms-6">
				<img src="icons/note4.svg">
			</div>
			<div class="col-md-6 col-ms-6">
				<h1>No more complications!</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
			
		</div>
	</div>
	<div class="container container2">	
         <div class="row">
              <div class="col-md-6">
                <img id="img-left" src="http://www.freeiconspng.com/uploads/cd-icon-flat-multimedia-29.png">
                <h3>Start today!</h3>
                <p>You can start using Notes today without paying anything. If you want to access new features, we have a monthly package that will fit your needs.</p>
              </div>
              <div class="col-md-6">
                <img id="img-center" src="https://forwardjump.com/wp-content/uploads/2017/02/design-icon.png">
                <h3>Are you a company? </h3>
                <p>If so, you can use Notes to increase productivity in the office and deliver more for your customers.</p>
              </div>      
           </div>    
      </div>
    <footer>
    	<ul>
    		<li><a href="#">About</a></li>
    		<li><a href="#">Pricing</a></li>
    		<li><a href="#">Contact</a></li>
    	</ul>
    	<p class="trademark">Created by Weslley. 2018-2019. All rights reserved. </p>
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