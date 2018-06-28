<?php 
	session_start();
	include "classes/Notes.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- To use @media you have to insert this in the html file-->
	<title>Notes | Your personal note application</title>
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
	</script>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Nanum+Myeongjo|Kaushan+Script" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<script src="javascript/main.js"></script>


</head>
<body>
	<?php 
		//Logout button
		if(!isset($_SESSION['id'])){ 
			header("Location: index.php");

		}
		else { //The page itself
		?>


		<nav>
			<img class="side-icon" src="images/side.png">
			<img class="logo" src="favicon.ico">
			<h1 class="logo-text">Notes</h1>
			<form class="search-form" method="POST" action="">
				<input id="search-input" type="search" name="search" placeholder="Search notes...">
				<button id="search-button"><img id="search-img" src="images/search.png"></button>

			</form>

			<form class="logout-form" method="POST" action="action/logout.php">
				<button class="logout" type="submit" name="submit">Logout</button>
			</form>

		</nav>

		<div class="side-bar">

		</div>

		<div class="body">
			<div class="write">
				<form id="addNote-form" method="POST" action="action/addNote.php">
					<input id="addNote-title" name="note_title"placeholder="Note title"><br><br>
					<textarea id="addNote-content" spellcheck = "false" style="resize:none" name="note_content" class="index_write_note" placeholder="Write a new note..." onclick="addNoteFunction()"></textarea><br> 
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
		</div>
	
	<script src="javascript/main.js"></script>
	


	
</body>
</html>