<?php
	session_start();
	include "../classes/Notes.php";
	$notes = new Notes;

	$result = $notes->showEditNote($_POST['noteId'], $_SESSION['id']);
	//Only the server will have both parameters to fetch the data from the database and, for know, I think the app is secure...
	if(empty($result)){ ?>
		<p style="text-align:center;">Sua nota não pode ser encontrada. Pedimos descuplas pelo inconveniente.</p>
		<img src="icons/error.png" style="margin: 0 auto; display: block;" width="100px">
	<?php
	}
	else{
		foreach($result as $data){?>

		<div class="edit_note" id="edit_note">

			<form id="edit-form-modal" class="edit-form-modal" method="POST" action="action/editNote.php">

				<?php echo '<input spellcheck="false" id="edit-title-modal" class="title_edit" placeholder="Write here the title..." type="text" name="edit_note_title" value="'.$data['note_title'].'">' ?><br>

				<?php echo '<textarea id="edit-content-modal" spellcheck = "false" cols="60" rows="10" class="edit_note_content" name = "edit_note_content" placeholder="Write here your note..." >'.str_replace('<br />', '&#13;', $data['note_content']).'</textarea>' //This '&#13' turns the break line tag into a enter in the text! ?><br>

				<?php echo '<input class="id" style="display: none" name="note_id" value="'.$data['id'].'">' //The note's id, hidden in this input that is not displayed, will be sended via POST to the file editNote.php?>


					<button class="delete">Delete</button>
					<p id="last-edited">Last edited: <?php echo $data['date_added'];?></p>



			</form>

			<script>

			</script>
			<!--
			<form action="action/addImageNote.php" method="POST" enctype="multipart/form-data">
				<input type="file" name="image">
				<button type="submit" name="submit">Add image</button>
			</form>
			-->

		</div>
	<?php
		}
	}
