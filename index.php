<?php 
	session_start();
	include "classes/Notes.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login system using OOP PHP</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<?php if(!isset($_SESSION['id'])){ ?>
	<h1>Login</h1>
	<form method="POST" action="action/login.php">
		<input type="text" name="email_username" placeholder="E-mail or username"><br>
		<input type="password" name="password" placeholder="Password"><br>
		<button type="submit" name="submit">Login</button><br>
	</form>



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

	<?php 
		}
		elseif(isset($_GET['edit'])){ ?>

			<form method="POST" action="action/logout.php">
				<button class="logout" type="submit" name="submit">Logout</button>
			</form><br><?php

			$edit = new Notes;
			$edit->showEditNote($_GET['edit']);


		}
		else {
			echo "Welcome, ".$_SESSION['first_name']."!";?><br>

			<form method="POST" action="action/logout.php">
				<button class="logout" type="submit" name="submit">Logout</button>
			</form><br>

			<div class="write">
				<form method="POST" action="action/addNote.php">
					<input name="note_title"placeholder="Note title"><br><br>
					<textarea spellcheck = "false" style="resize:none" rows="15" cols="60" name="note_content" class="index_write_note" placeholder="Write a new note..."></textarea><br> 
					<button type="submit" name="submit">Add post</button>
				</form>
			</div>





	<?php
		$notes = new Notes;
		$notes->showNotes($_SESSION['id']);


	 }

	?>	
</body>
</html>