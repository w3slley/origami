<?php
	session_start();
	include "../classes/Notes.php";
	$note = new Notes;


	$note_title = $_POST['note_title'];
	$note_content = nl2br($_POST['note_content']); //the nl2br function transforms any break line the user types into <br> inside the database. It's then displayed correctly in the page.
	$date_created = date("F d, o");
	$note->addNote($_SESSION['id'], $note_title, $note_content, $date_created);

?>
