<?php 
	session_start();
	include "../classes/Notes.php";

	$notes = new Notes;
	$notes->showNotes($_SESSION['id'], 10);//This 10 is the limit of notes per page.
