<?php 
	include "../classes/Notes.php";

	$object = new Notes;
	$object->showEditNote($_POST['id']);
?>

	<button class="delete" onclick="deleteNote(<?php echo $_POST['id']; ?>)">Delete</button>
