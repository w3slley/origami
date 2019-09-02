<?php
	include "User.php";

	class Notes extends User{

		public function addNote($user_id, $note_title, $note_content, $date_created){
			$sql="INSERT INTO notes (user_id, note_title, note_content, date_created) VALUES (?, ?, ?, ?)";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$user_id, $note_title, $note_content, $date_created]);
			return true;
		}

		public function showNotes($user_id){
			$str_length = 950;//This variable is the maximum amount of characters that will be displayed in the home page.

			//that substring part limits the amout of characters displayed in the notes. Only 950 (which is the variable up there) characters, in that case, will be displayed, making the notes appear smaller in the home page. Good job!
			$sql = "SELECT SUBSTRING(note_content, 1, $str_length) as note_content, id, note_title, date_created FROM notes WHERE user_id = ? ORDER BY id DESC LIMIT 10"; //If you want to change the number of notes displayed in the front page, you need to change this LIMIT number and the limit variable in the main.js file. Because the number you insert here is the number of notes displayed and the js variable uses this number to add more notes. Hence, those two need to be the same!
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$user_id]);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);//If it's FETCH_OBJ, it allows me to treat the results from the database as properties of a class! If it's FETCH_ASSOC I can treat the results as an array!
			return ['data' => $result, 'str_length' => $str_length];

		}


		public function countNotes($user_id){

			$sql = "SELECT COUNT(id) as number_notes FROM notes WHERE user_id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$user_id]);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result['number_notes'];
		}


		public function showMoreNotes($user_id, $limit){

			//$this->connect()->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);//This allows me to treat the results from the database as properties of a class!
			$str_length = 950;

			$sql = "SELECT SUBSTRING(note_content, 1, $str_length) as note_content, id, note_title, date_created FROM notes WHERE user_id = ? ORDER BY id DESC LIMIT $limit";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$user_id]);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);//If it's FETCH_OBJ, it allows me to treat the results from the database as properties of a class! If it's FETCH_ASSOC I can treat the results as an array!
			return ['data' => $result, 'str_length' => $str_length];


		}


		public function editNote($note_id, $note_title, $note_content){

			$sql = "UPDATE notes SET note_title = ?, note_content = ? WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$note_title, $note_content, $note_id]);
		}


		public function showEditNote($note_id, $user_id){

			$sql = "SELECT * FROM notes WHERE user_id = ? and id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$user_id, $note_id]);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;

		}


		public function deleteNote($note_id){

			$sql = "DELETE FROM notes WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$note_id]);
			return True;

		}

		public function showSearchedNotes($user_id, $search){
			$search_term = '%'.$search.'%';

			$str_length = 950;

			$sql = "SELECT SUBSTRING(note_content, 1, $str_length) as note_content, id, note_title, date_created FROM notes WHERE user_id = ? AND (note_content LIKE ? OR note_title LIKE ?) ORDER BY id DESC"; //You have to use the parentheses!
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$user_id, $search_term, $search_term]);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return ['data' => $result, 'str_length' => $str_length];

		}

		public function backup_notes($user_id, $file_name){
			$sql = 'SELECT * FROM notes WHERE user_id = ? ORDER BY id DESC';
			$result = $this->connect()->prepare($sql);
			$result->execute([$user_id]);
			$notes = $result->fetchAll();


			$script = fopen($file_name, 'w') or die("Unable to open file!");

			foreach($notes as $note) {
				$note_title = $note['note_title'].', '.$note['date_created'];
				$note_content = $note['note_content'];


				$x = $note_title."\r\n\r\n".$note_content."\r\n\r\n ########## \r\n\r\n";
				$content = str_replace("<br />", "\r\n", $x);
				fwrite($script, $content);
			}

			fclose($script);

			//With these lines of code I managed to create an downloable link so that when users click the button to backup their notes, they already can download it.
		}
	}
?>
