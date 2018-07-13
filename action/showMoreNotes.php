<?php
	session_start();
	include "../classes/Notes.php";

	$limit = $_POST['limit']; //limit number gathered from the ajax post in the main.js file!

	$notes = new Notes;
	$notes->showNotes($_SESSION['id'], $limit);


