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

			$sql = "SELECT * FROM notes WHERE user_id = ? ORDER BY id DESC LIMIT 10"; //If you want to change the number of notes displayed in the front page, you need to change this LIMIT number and the limit variable in the main.js file. Because the number you insert here is the number of notes displayed and the js variable uses this number to add more notes. Hence, those two need to be the same!
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id]);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);//If it's FETCH_OBJ, it allows me to treat the results from the database as properties of a class! If it's FETCH_ASSOC I can treat the results as an array! 


			foreach($result as $data){ ?>
				<div class='div-note' id="note" onclick="editNote(<?php echo $data['id']; ?>)">
					<h1 class='note_title'><?php echo $data['note_title']; ?></h1>
					<p class='note_content'><?php echo $data['note_content']; ?></p>
					<p class='date'>Created at: <?php echo $data['date_created']; ?></p>
					<p id="<?php echo $data['id']; ?>" style="display: none"></p>
					<img id='delete-icon' onclick="deleteNote(<?php echo $data['id']; ?>)" src="images/trash.png">
					
					
										

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

			$sql = "SELECT * FROM notes WHERE user_id = ? ORDER BY id DESC LIMIT $limit";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id]);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);//If it's FETCH_OBJ, it allows me to treat the results from the database as properties of a class! If it's FETCH_ASSOC I can treat the results as an array! 


			foreach($result as $data){ ?>
				<div class='div-note' id="note" onclick="editNote(<?php echo $data['id']; ?>)">
					<h1 class='note_title'><?php echo $data['note_title']; ?></h1>
					<p class='note_content'><?php echo $data['note_content']; ?></p>
					<p class='date'>Created at: <?php echo $data['date_created']; ?></p>
					<p id="<?php echo $data['id']; ?>" style="display: none"></p>
					<img id='delete-icon' onclick="deleteNote(<?php echo $data['id']; ?>)" src="images/trash.png">
					
					
										

				</div>
			<?php	}

			//return $this->countNotes($this->user_id);//This will return the total number of notes the user has.
		}


		public function editNote($note_id, $note_title, $note_content){
			$this->id = $note_id;
			$this->note_title = $note_title;
			$this->note_content = $note_content;

			$sql = "UPDATE notes SET note_title = ?, note_content = ? WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$note_title, $note_content, $note_id]);
		}


		public function showEditNote($note_id){

			$this->id = $note_id;

			$sql = "SELECT * FROM notes WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->id]);
			$data = $stmt->fetchAll(PDO::FETCH_OBJ);
			foreach($data as $data){?>
			<div class="edit_note">
				<form id="edit-form-modal" method="POST" action="action/editNote.php">
					<?php echo '<input id="edit-title-modal" class="title_edit" type="text" name="edit_note_title" value="'.$data->note_title.'">' ?><br><br>
					<?php echo '<textarea id="edit-content-modal" spellcheck = "false" cols="60" rows="10" class="edit_note_content" name = "edit_note_content" >'.str_replace('<br />', '&#13;', $data->note_content).'</textarea>' //This '&#13' turns the break line tag into a enter in the text! ?><br>
					<p id="last-edited">Last edited: <?php echo $data->date_added; ?></p>
					<?php echo '<input class="id" style="display: none" name="note_id" value="'.$this->id.'">' //The note's id, hidden in this input that is not displayed, will be sended via POST to the file editNote.php?> 
					
						<button class="delete" onclick="deleteNote(<?php echo $_POST['id']; ?>)">Delete</button>
						<button>Save changes</button>
					

				</form>

			</div>
		<?php }
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

			$sql = "SELECT * FROM notes WHERE user_id = ? AND (note_content LIKE ? OR note_title LIKE ?) ORDER BY id DESC"; //You have to use the parentheses!
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id, $this->search_term, $this->search_term]);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach($result as $data){ ?>
				<div class='div-note' id="note" onclick="editNote(<?php echo $data['id']; ?>)"> 
					<h1 class='note_title'><?php echo $data['note_title']; ?></h1>
					<p class='note_content'><?php echo $data['note_content']; ?></p>
					<p class='date'>Created at: <?php echo $data['date_created']; ?></p>
					<p id="<?php echo $data['id']; ?>" style="display: none"></p>
					<img id='delete-icon' onclick="deleteNote(<?php echo $data['id']; ?>)" src="images/trash.png">

				</div>
			<?php	}

		}


	}
?>

