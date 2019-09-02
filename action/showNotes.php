<?php
	session_start();
	include "../classes/Notes.php";
	$notes = new Notes;

	$result = $notes->showNotes($_SESSION['id']);

	foreach($result['data'] as $data){ ?>
		<div class='div-note' id="note" onclick="editNote(<?php echo $data['id']; ?>)">
			<h1 class='note_title'><?php echo $data['note_title']; ?></h1>

			<p class='note_content'><?php echo $data['note_content'];
			 if(strlen($data['note_content']) == $result['str_length']){ //If the number of characters in the note_content is equal to the limit, that means (in principle) there's more content in the database and it echos "..."!
				echo "[...]";
			 } ?></p>
			<p class='date'>Created at: <?php echo $data['date_created']; ?></p>
			<p id="<?php echo $data['id']; ?>" style="display: none"></p>
			<img id='delete-icon' onclick="deleteNote(<?php echo $data['id']; ?>)" src="images/trash.png">


		</div>
			<div class="delete-button">

			</div>
<?php
}
?>
