<?php
	include "Database.php";
	
	class Notes extends Database{
		private $id;
		private $user_id;
		private $note_title;
		private $note_content;
		private $label_id;


		public function addNote($user_id, $note_title, $note_content){
			$this->user_id = $user_id;
			$this->note_title = $note_title;
			$this->note_content = $note_content;

			//$this->connect()->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

			$sql="INSERT INTO notes (user_id, note_title, note_content) VALUES (?, ?, ?)";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id, $this->note_title, $this->note_content]);

		}

		public function showNotes($user_id){
			$this->user_id = $user_id;

			//$this->connect()->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);//This allows me to treat the results from the database as properties of a class!

			$sql = "SELECT * FROM notes WHERE user_id = ? ORDER BY id DESC;";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id]);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);//If it's FETCH_OBJ, it allows me to treat the results from the database as properties of a class! If it's FETCH_ASSOC I can treat the results as an array! 


			foreach($result as $data){ ?>
				<div class='note'>
					<h1 class='note_title'><?php echo $data['note_title']; ?></h1>
					<p class='note_content'><?php echo $data['note_content']; ?></p>
					<p class='date'>Last edited: <?php echo $data['date_added']; ?></p>
					<?php echo '<a href="index.php?edit='.$data['id'].'" class="edit">Edit</a>' ?>
					<form method="POST" action="action/deleteNote.php">
						<?php echo '<input style="display:none" name="note_id" value="'.$data['id'].'">' ?>
						<button type="submit" class="delete" name="submit">Delete</button>
					</form>

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


		public function showEditNote($note_id){

			$this->id = $note_id;

			$sql = "SELECT * FROM notes WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->id]);
			$data = $stmt->fetchAll(PDO::FETCH_OBJ);
			foreach($data as $data){?>
			<div class="edit_note">
				<form method="POST" action="action/editNote.php">
					<?php echo '<input class="input_edit" type="text" name="edit_note_title" value="'.$data->note_title.'">' ?><br><br>
					<?php echo '<textarea spellcheck = "false" cols="100" rows="20" class="edit_note_content" name = "edit_note_content" >'.str_replace('<br />', '&#13;', $data->note_content).'</textarea>' //This '&#13' turns the break line tag into a enter in the text! ?><br>
					<?php echo '<input style="display: none" name="note_id" value="'.$this->id.'">'  ?>
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


	}