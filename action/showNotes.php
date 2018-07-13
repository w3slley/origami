<?php 
	session_start();
	include "../classes/Notes.php";

	$notes = new Notes;
	$notes->showNotes($_SESSION['id']);
