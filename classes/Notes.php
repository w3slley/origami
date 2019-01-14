<?php
	include "User.php";
	
	class Notes extends User{
		private $id;
		private $user_id;
		private $note_title;
		private $note_content;
		private $date_created;
		private $search_term;
		


		public function addNote($user_id, $note_title, $note_content, $date_created){
			$this->user_id = $user_id;
			$this->note_title = $note_title;
			$this->note_content = $note_content;
			$this->date_created = $date_created;

			//$this->connect()->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

			$sql="INSERT INTO notes (user_id, note_title, note_content, date_created) VALUES (?, ?, ?, ?)";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id, $this->note_title, $this->note_content, $this->date_created]);

		}

		public function showNotes($user_id){
			$this->user_id = $user_id;
			

			//$this->connect()->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);//This allows me to treat the results from the database as properties of a class!

			//This variable is the maximum amount of characters that will be displayed in the home page.
			$str_lenght = 950;

			//that substring part limits the amout of characters displayed in the notes. Only 950 (which is the variable up there) characters, in that case, will be displayed, making the notes appear smaller in the home page. Good job!
			$sql = "SELECT SUBSTRING(note_content, 1, $str_lenght) as note_content, id, note_title, date_created FROM notes WHERE user_id = ? ORDER BY id DESC LIMIT 10"; //If you want to change the number of notes displayed in the front page, you need to change this LIMIT number and the limit variable in the main.js file. Because the number you insert here is the number of notes displayed and the js variable uses this number to add more notes. Hence, those two need to be the same!
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id]);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);//If it's FETCH_OBJ, it allows me to treat the results from the database as properties of a class! If it's FETCH_ASSOC I can treat the results as an array! 


			foreach($result as $data){ ?>
				<div class='div-note' id="note" onclick="editNote(<?php echo $data['id']; ?>)">
					<h1 class='note_title'><?php echo $data['note_title']; ?></h1>

					<p class='note_content'><?php

					 echo $data['note_content']; 
					 if(strlen($data['note_content']) == $str_lenght){ //If the number of characters in the note_content is equal to the limit, that means (in principle) there's more content in the database and it echos "..."!
					 	echo "[...]";
					 }

					 ?></p>
					<p class='date'>Created at: <?php echo $data['date_created']; ?></p>
					<p id="<?php echo $data['id']; ?>" style="display: none"></p>
					<img id='delete-icon' onclick="deleteNote(<?php echo $data['id']; ?>)" src="images/trash.png">
					
										
				</div>
					<div class="delete-button">
						
					</div>
			<?php	}

		}


		public function countNotes($user_id){
			$this->user_id = $user_id;

			$sql = "SELECT COUNT(id) as number_notes FROM notes WHERE user_id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id]);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result['number_notes'];
		}


		public function showMoreNotes($user_id, $limit){
			$this->user_id = $user_id;
			

			//$this->connect()->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);//This allows me to treat the results from the database as properties of a class!
			$str_lenght = 950;

			$sql = "SELECT SUBSTRING(note_content, 1, $str_lenght) as note_content, id, note_title, date_created FROM notes WHERE user_id = ? ORDER BY id DESC LIMIT $limit";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id]);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);//If it's FETCH_OBJ, it allows me to treat the results from the database as properties of a class! If it's FETCH_ASSOC I can treat the results as an array! 


			foreach($result as $data){ ?>
				<div class='div-note' id="note" onclick="editNote(<?php echo $data['id']; ?>)">
					<h1 class='note_title'><?php echo $data['note_title']; ?></h1>
					<p class='note_content'><?php

					 echo $data['note_content']; 
					 if(strlen($data['note_content']) == $str_lenght){
					 	echo "[...]";
					 }

					 ?></p>
					<p class='date'>Created at: <?php echo $data['date_created']; ?></p>
					<p id="<?php echo $data['id']; ?>" style="display: none"></p>
					<img id='delete-icon' onclick="deleteNote(<?php echo $data['id']; ?>)" src="images/trash.png">
					
					
										

				</div>
			<?php	}

		}


		public function editNote($note_id, $note_title, $note_content){
			$this->id = $note_id;
			$this->note_title = $note_title;
			$this->note_content = $note_content;

			$sql = "UPDATE notes SET note_title = ?, note_content = ? WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$note_title, $note_content, $note_id]);
		}


		public function showEditNote($note_id, $user_id){

			$this->note_id = $note_id;
			$this->user_id = $user_id;

			$sql = "SELECT * FROM notes WHERE user_id = ? and id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id, $this->note_id]);
			$data = $stmt->fetchAll(PDO::FETCH_OBJ);
			
			if(empty($data)){
				echo '<p style="text-align:center;">Sua nota não pode ser encontrada. Pedimos descuplas pelo inconveniente.</p>';
				echo '<img src="icons/error.png" style="margin: 0 auto; display: block;" width="100px">';
			}
			else{
				foreach($data as $data){?>
			
				<div class="edit_note" id="edit_note">
				
					<form id="edit-form-modal" method="POST" action="action/editNote.php">
						<!--<img src="images/signup-wallpaper.jpg" style="width: 95%"> -->
						<?php echo '<input id="edit-title-modal" class="title_edit" placeholder="Write here the title..." type="text" name="edit_note_title" value="'.$data->note_title.'">' ?><br>

						<?php echo '<textarea id="edit-content-modal" spellcheck = "false" cols="60" rows="10" class="edit_note_content" name = "edit_note_content" placeholder="Write here your note..." >'.str_replace('<br />', '&#13;', $data->note_content).'</textarea>' //This '&#13' turns the break line tag into a enter in the text! ?><br>

						<?php echo '<input class="id" style="display: none" name="note_id" value="'.$this->id.'">' //The note's id, hidden in this input that is not displayed, will be sended via POST to the file editNote.php?>
						
						
							<button class="delete" onclick="deleteNote(<?php echo $_POST['id']; ?>)">Delete</button>
							<p id="last-edited">Last edited: <?php echo $data->date_added; ?></p>
							<button class="save">Save changes</button>
						
						
					</form>
					<!--javascript code to save data when typed -->
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
		}
			

		public function deleteNote($note_id){
			$this->id = $note_id;

			$sql = "DELETE FROM notes WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->id]);


		}

		public function showSearchedNotes($user_id, $search_term){
			$this->user_id = $user_id;
			$this->search_term = '%'.$search_term.'%';

			$str_lenght = 950;

			$sql = "SELECT SUBSTRING(note_content, 1, $str_lenght) as note_content, id, note_title, date_created FROM notes WHERE user_id = ? AND (note_content LIKE ? OR note_title LIKE ?) ORDER BY id DESC"; //You have to use the parentheses!
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id, $this->search_term, $this->search_term]);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach($result as $data){ ?>
				<div class='div-note' id="note" onclick="editNote(<?php echo $data['id']; ?>)"> 
					<h1 class='note_title'><?php echo $data['note_title']; ?></h1>
					<p class='note_content'><?php

					 echo $data['note_content']; 
					 if(strlen($data['note_content']) == $str_lenght){
					 	echo "[...]";
					 }

					 ?></p>
					<p class='date'>Created at: <?php echo $data['date_created']; ?></p>
					<p id="<?php echo $data['id']; ?>" style="display: none"></p>
					<img id='delete-icon' onclick="deleteNote(<?php echo $data['id']; ?>)" src="images/trash.png">

				</div>
			<?php	}

		}


	}
?>

