<?php
	
	include "../classes/Notes.php";

	$note_id = $_POST['note_id'];

	$note= new Notes;
	$note->deleteNote($note_id);

	header("Location: ../index.php?delete=success");