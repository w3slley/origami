<?php
	session_start();
	include "../classes/Notes.php";
	$notes = new Notes;
	$limit = $_POST['limit']; //limit number gathered from the ajax post in the main.js file!


	$result = $notes->showMoreNotes($_SESSION['id'], $limit);

	foreach($result['data'] as $data){ ?>
		<div class='div-note' id="note" onclick="editNote(<?php echo $data['id']; ?>)">
			<h1 class='note_title'><?php echo $data['note_title']; ?></h1>
			<p class='note_content'><?php

			 echo $data['note_content'];
			 if(strlen($data['note_content']) == $result['str_length']){
				echo "[...]";
			 }

			 ?></p>
			<p class='date'>Created at: <?php echo $data['date_created']; ?></p>
			<p id="<?php echo $data['id']; ?>" style="display: none"></p>
			<img id='delete-icon' onclick="deleteNote(<?php echo $data['id']; ?>)" src="images/trash.png">

		</div>
	<?php	}
