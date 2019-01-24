<?php 
	include "../classes/Notes.php";

	$note_id = $_POST['id'];

	$note = new Notes;
	$note->deleteNote($note_id);
