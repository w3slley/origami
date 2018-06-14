<?php 
	session_start();
	include "classes/Notes.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login system using OOP PHP</title>
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
	</script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script>
		$(document).ready(function(){//This will make the data from the form go to the addNote.php file without loading the page.
			$("#addNote-form").submit(function(event){//When the form is submited (button is clicked):
				event.preventDefault();//this makes the form not to go to the action site. It, instead, sets everything to default (do nothing).
				var note_title = $("#addNote-title").val();//data from the title
				var note_content = $("#addNote-content").val();//data from the content

				$.post("action/addNote.php", {//the js sends the data behind the scenes to the addNote.php file with the note_title and note_content!
					note_title: note_title,
					note_content: note_content
				}, function (){ //This will remove the data from the title and textarea when the note is added!
					$("#addNote-title").val("");
					$("#addNote-content").val("");
				});
			});
		});
	</script>


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
		//Logout button
		elseif(isset($_GET['edit'])){ ?>

			<form method="POST" action="action/logout.php">
				<button class="logout" type="submit" name="submit">Logout</button>
			</form><br><?php

			$edit = new Notes;
			$edit->showEditNote($_GET['edit']);


		}
		else { //The page itself
			echo "Welcome, ".$_SESSION['first_name']."!";?><br>

			<form id="edit-logout-button" method="POST" action="action/logout.php">
				<button class="logout" type="submit" name="submit">Logout</button>
			</form><br>

			<div class="write">
				<form id="addNote-form" method="POST" action="action/addNote.php">
					<input id="addNote-title" name="note_title"placeholder="Note title"><br><br>
					<textarea id="addNote-content" spellcheck = "false" style="resize:none" rows="10" cols="60" name="note_content" class="index_write_note" placeholder="Write a new note..."></textarea><br> 
					<button id="addNote-submit" type="submit" name="submit">Add note</button>
				</form>
			</div>
			<small id="small"></small>




	<script>//When the add note button is clicked, the page loads the showNotes.php file without realoading itself and adds the title and content to the database behind the scenes.
		$(document).ready(function(){
			$("#addNote-form").submit(function(){
				
				$("#notes").load("action/showNotes.php");
			});
		});
	</script>
	<div id="notes">
		<?php 
		$notes = new Notes;
		$notes->showNotes($_SESSION['id']);


	 }
	 	?>
	</div>
	

	


	

<script>

	$(document).ready(function(){
		$("#form-delete").submit(function(event){
			event.preventDefault();
			var note_id = $("#note_id").val();
			$.post("action/deleteNote.php", {note_id: note_id
			}, 
			function(){
				history.pushState("some string", 'title', '#home');
			});
		});
	})
</script>
</body>
</html>