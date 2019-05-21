<?php 
	include "../classes/Notes.php";
	session_start();

	$note_id = $_POST['id'];

	$note = new Notes;
	$note->deleteNote($note_id);

	$note->showNotes($_SESSION['id']); //will update the notes in the main page!

