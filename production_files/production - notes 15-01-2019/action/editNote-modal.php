<?php 
	session_start();
	include "../classes/Notes.php";

	$object = new Notes;
	$object->showEditNote($_POST['noteId'], $_SESSION['id']);
	//Only the server will have both parameters to fetch the data from the database and, for know, I think the app is secure...

?>

	
