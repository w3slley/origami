<?php 
	include "../classes/Notes.php";

	$note_id = $_POST['note_id'];
	$note_title = $_POST['edit_note_title'];
	$note_content = nl2br($_POST['edit_note_content']); //I have to use the nl2br function so that it can display propertly with all the breaks in the text!


	$note = new Notes;
	$note->editNote($note_id, $note_title, $note_content);

	header("Location: ../index.php");