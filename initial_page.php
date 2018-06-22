<?php 
	session_start();
	include "classes/Notes.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- To use @media you have to insert this in the html file-->
	<title>Notes | Personal note application</title>
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
	</script>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<script src="javascript/main.js"></script>


</head>
<body>
	

	<?php 
		
		//Logout button
		if(isset($_GET['edit'])){ ?>

			<form method="POST" action="action/logout.php">
				<button class="logout" type="submit" name="submit">Logout</button>
			</form><br><?php

			$edit = new Notes;
			$edit->showEditNote($_GET['edit']);


		}
		else { //The page itself
			echo "<h1>Welcome, ".$_SESSION['first_name']."!</h1>";?><br>

			<form id="edit-logout-button" method="POST" action="action/logout.php">
				<button class="logout" type="submit" name="submit">Logout</button>
			</form><br>

			<div class="write">
				<form id="addNote-form" method="POST" action="action/addNote.php">
					<input id="addNote-title" name="note_title"placeholder="Note title"><br><br>
					<textarea id="addNote-content" spellcheck = "false" style="resize:none" rows="10" cols="60" name="note_content" class="index_write_note" placeholder="Write a new note..."></textarea><br> 
					<button id="addNote-submit" type="submit" name="submit"><img src="plus.png" width="70px"></button>
				</form>
			</div>
			<small id="small"></small>



	<div id="notes">
		<?php 
		$notes = new Notes;
		$notes->showNotes($_SESSION['id']);


	 }
	 	?>
	</div>


	<script>//When the add note button is clicked, the page loads the showNotes.php file without realoading itself and adds the title and content to the database behind the scenes.
		$(document).ready(function(){
			$("#notes").load("action/showNotes.php");
			$("#addNote-form").submit(function(){
				
				$("#notes").load("action/showNotes.php");
			});
		});


		function deleteNote(note_id){//delete notes using AJAX
			var confirmValue = confirm('Do you really want to delete this note?');
			if(confirmValue == true){
				$.post('action/deleteNote.php', { id: note_id }, function(){ //run the deleteNote.php file using AJAX.
					document.getElementById(note_id).parentNode.outerHTML = '';//Selects the parent node (the element the button is in) from the button that has the note's id and deletes it!	I created a button with an id that is equal to the note's id in the database. So, when I delete the note in the database using AJAX, I can also delete its content from the client webpage using the same id.
				});
			}
			

			

		}

		
	</script>
	
	

	


	
</body>
</html>