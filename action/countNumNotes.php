<?php
	include "../classes/Notes.php";
	session_start();
	$count_notes = new Notes;
	$number = $count_notes->countNotes($_SESSION['id']);
	echo $number; //Now this is working. It gets the total number of notes in the database.
	//When the user deletes a note this variable has to be updated... Need to find a way to do that. (probably using AJAX)