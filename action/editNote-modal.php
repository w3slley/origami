<?php 
	session_start();
	include "../classes/Notes.php";

	$object = new Notes;
	$object->showEditNote($_POST['noteId'], $_SESSION['id']);
?>

	
