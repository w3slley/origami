<?php
	include "Database.php";

	class User extends Database {
		private $user_id;
		private $first_name;
		private $last_name;
		private $user_name;
		private $email;
		private $password;
		private $img_format;


		public function addUser($first_name, $last_name, $user_name, $email, $password) { //Method that adds the user into the database (sign up)!

			$this->first_name = $first_name;
			$this->last_name = $last_name;
			$this->user_name = $user_name;
			$this->email = $email;
			$this->password = $password;

			$this->connect()->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

			$sql = "INSERT INTO users (first_name, last_name, user_name, email, password) VALUES (?, ?, ?, ?, ?)";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->first_name, $this->last_name, $this->user_name, $this->email, $this->password]);

		}

		public function checkUser($email, $password){ //This method checks if the information inserted is correct - if there's a user with that e-mail/username and password. If there is, it will return the user's information. If there isn't, it will return a boolean value false!

			$this->email = $email;
			$this->password = $password;

			$sql = "SELECT * FROM users WHERE email = ? or user_name = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$email, $email]);
			$result = $stmt->fetch();

			if(isset($result)){ //If there's a user with that email or username, it will check the password inserted with the one in the database for that user. If they are equal, the user is then logged in.
				$dbPassword = $result['password'];
				switch (password_verify($this->password, $dbPassword)) {
					case True:
						$data = array('id' => $result['id'], 'first_name' => $result['first_name'], 'last_name'=>$result['last_name'], 'user_name' => $result['user_name'], 'email' => $result['email'], 'password' => $result['password']); //Created an associative array to use in the login.php file and start session.
						return $data;
						break;
				}

			}
			else {
				return False;
			}

		}

		public function updateInfo($first_name, $last_name, $user_name, $email, $user_id){

			$this->first_name = $first_name;
			$this->last_name = $last_name;
			$this->user_name = $user_name;
			$this->email = $email;
			$this->user_id = $user_id;

			$sql = "UPDATE users SET first_name = ?, last_name = ?, user_name = ?, email = ?WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->first_name, $this->last_name, $this->user_name, $this->email, $this->user_id]);


		}

		public function updatePassword($password, $user_id){
			$this->user_id = $user_id;
			$this->password = $password;

			$sql = "UPDATE users SET password=? WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->password, $this->user_id]);

		}

		public function setImgFormat($user_id, $img_format){
			$this->user_id = $user_id;
			$this->img_format = $img_format;

			$sql = "UPDATE users SET img_format = ? WHERE id = ? ";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->img_format, $this->user_id]);
		}

		public function getImgFormat($user_id){
			$this->user_id = $user_id;

			$sql = "SELECT img_format FROM users WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id]);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result[0]['img_format'];
		}


		public function checkUsername($user_name){
			$this->user_name = $user_name;

			$sql = "SELECT user_name FROM users WHERE user_name = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_name]);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if(!empty($result['user_name'])){
				return true;

			}
			else{
				return false;
			}
		}

		public function checkUserEmail($email){

			$this->email = $email;

			$sql = "SELECT email FROM users WHERE email = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->email]);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if(!empty($result['email'])){
				return true;

			}
			else{
				return false;
			}
		}
	}
