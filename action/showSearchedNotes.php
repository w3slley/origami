<?php 
	include "../classes/Notes.php";

	session_start();
	$search = $_POST['search'];

	$searchedNotes = new Notes;
	$searchedNotes->showSearchedNotes($_SESSION['id'], $search);


?>