<?php 
	include "Database.php";

	class User extends Database {
		private $user_id;
		private $first_name;
		private $last_name;
		private $user_name;
		private $email;
		private $password;


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
						$data = array('id' => $result['id'], 'first_name' => $result['first_name'], 'last_name'=>$result['last_name'], 'user_name' => $result['user_name'], 'email' => $result['email']); //Created an associative array to use in the login.php file and start session.
						return $data;
						break;
				}

			}
			else {
				return False;
			}

		}

	}