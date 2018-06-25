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

			<form method="POST" action="action/logout.php">
				<button class="logout" type="submit" name="submit">Logout</button>
			</form>

			<div class="write">
				<form id="addNote-form" method="POST" action="action/addNote.php">
					<input id="addNote-title" name="note_title"placeholder="Note title"><br><br>
					<textarea id="addNote-content" spellcheck = "false" style="resize:none" rows="10" cols="60" name="note_content" class="index_write_note" placeholder="Write a new note..."></textarea><br> 
					<button id="addNote-submit" type="submit" name="submit"><img src="plus.png" width="70px"></button>
				</form>
			</div>
			<small id="small"></small>

			<!-- Modal -->
		<div id="myModal" class="modal"> <!-- The modal -->
			<div class="modal-content"> <!-- Modal's content-->
				<span class="close">&times;</span> <!-- close button -->
				<p id="data">You shouldn't see me. Some error have occured.</p> 

			</div>
		</div>

		<div id="notes">
			<?php 
			$notes = new Notes;
			$notes->showNotes($_SESSION['id']);
		 }
		 	?>
		</div>
	
	<script>
		
		$(document).ready(function(){/*This will make the data from the form go to the addNote.php 
			file without loading the page.*/
			$("#addNote-form").submit(function(event){//When the form is submited (button is clicked):
				event.preventDefault();/*this makes the form not to go to the action site. It, instead, 
				sets everything to default (do nothing).*/
				var note_title = $("#addNote-title").val();//data from the title
				var note_content = $("#addNote-content").val();//data from the content
				$.post("action/addNote.php", {/*the js sends the data behind the scenes to the
				 addNote.php file with the note_title and note_content!*/
					note_title: note_title,
					note_content: note_content
				}, function (){ /*This will remove the data from the title and textarea when the
				 note is added!*/
					$("#addNote-title").val("");
					$("#addNote-content").val("");
				});
			});
		});

		//When the add note button is clicked, the page loads the showNotes.php file without realoading itself and adds the title and content to the database behind the scenes.
		$(document).ready(function(){
			$("#notes").load("action/showNotes.php");
			$("#addNote-form").submit(function(){
				
				$("#notes").load("action/showNotes.php");
			});
		});


		var modal = document.getElementById('myModal');//getting the element of the modal
		var close = document.getElementsByClassName("close")[0];//getting the close button element

		function deleteNote(note_id){//delete notes using AJAX
			var confirmValue = confirm('Do you really want to delete this note?');
			if(confirmValue == true){
				$.post('action/deleteNote.php', { id: note_id }, function(){ //run the deleteNote.php file using AJAX.
					modal.style.display = 'none';
					var x = document.getElementById(note_id).parentNode.outerHTML = '';//Selects the parent node (the element the button is in) from the button that has the note's id and deletes it!	I created a button with an id that is equal to the note's id in the database. So, when I delete the note in the database using AJAX, I can also delete its content from the client webpage using the same id.


				});
			}
		}	

		//EDIT NOTE 
		var a = document.getElementsByClassName('div-note');

		console.log(a);
		function editNote(note_id){ //When the note is clicked, the modal is shown.
			modal.style.display = "block";

			$.post('action/editNote-modal.php', {id: note_id}, function (data){
			document.getElementById('data').innerHTML = data;
			});
			
		}	

		close.onclick = function(){//if the close button is clicked, the modal is closed
			modal.style.display = 'none';
		}
		window.onclick = function(event){ //When clicked outside the modal, it automatically closes.
			if(event.target == modal) {
				modal.style.display = 'none';
			}
		}	
		
	
	</script>
	


	
</body>
</html>