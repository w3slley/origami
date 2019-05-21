<?php 
	include "../classes/Notes.php";

	$note_id = $_POST['noteId'];
	$note_title = $_POST['noteTitle'];
	$note_content = nl2br($_POST['noteContent']); //I have to use the nl2br function so that it can display propertly with all the breaks in the text!


	$note = new Notes;
	$note->editNote($note_id, $note_title, $note_content);

	#header("Location: ../index.php");
