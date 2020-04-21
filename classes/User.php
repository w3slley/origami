<?php
	include "Database.php";

	class User extends Database {
		private $user_id;
		private $first_name;
		private $last_name;
		private $user_name;
		private $email;
		private $password;
		
		public function setUserSignUp($first_name, $last_name, $user_name, $email, $password){//while in the signup process, this function has to be initiated first
			$this->first_name = $first_name;
			$this->last_name = $last_name;
			$this->user_name = $user_name;
			$this->email = $email;
			$this->password = $password;
		}
		public function setUserLogged($user_id){//If user is logged in, this function needs to be initiated.
			$this->user_id = $user_id;
			$sql = "SELECT * FROM users WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id]);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->first_name = $result['first_name'];
			$this->last_name = $result['last_name'];
			$this->user_name = $result['user_name'];
			$this->email = $result['email'];
		}

		public function addUser() { //Method that adds the user into the database (sign up)!

			$this->connect()->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

			$sql = "INSERT INTO users (first_name, last_name, user_name, email, password) VALUES (?, ?, ?, ?, ?)";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->first_name, $this->last_name, $this->user_name, $this->email, $this->password]);
			return True;
		}


		public function checkUser($email, $password){ //This method checks if the information inserted is correct - if there's a user with that e-mail/username and password. If there is, it will return the user's information. If there isn't, it will return a boolean value false!

			$sql = "SELECT * FROM users WHERE email = ? or user_name = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$email, $email]);
			$result = $stmt->fetch();

			if(isset($result)){ //If there's a user with that email or username, it will check the password inserted with the one in the database for that user. If they are equal, the user is then logged in.
				$dbPassword = $result['password'];
				switch (password_verify($password, $dbPassword)) {
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

		public function updateInfo($user_id, $first_name, $last_name, $user_name, $email){//updates user information in the profile page

			$sql = "UPDATE users SET first_name = ?, last_name = ?, user_name = ?, email = ? WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$first_name, $last_name, $user_name, $email, $user_id]);
			return True;

		}

		public function updatePassword($user_id, $password){//updates password in the profile page

			$sql = "UPDATE users SET password=? WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$password, $user_id]);

			return True;
		}

		public function setImgFormat($img_format){ //set image format when profile image is uploaded
			$sql = "UPDATE users SET img_format = ? WHERE id = ? ";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$img_format, $this->user_id]);
			return True;
		}

		public function getImgFormat(){//get profile image format to be displayed at initial page

			$sql = "SELECT img_format FROM users WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id]);
			$result = $stmt->fetch();
			return $result['img_format'];
		}


		public function checkUsername($user_name){//Check for username in the database while in the sign up proccess
			$sql = "SELECT user_name FROM users WHERE user_name = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$user_name]);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if(!empty($result['user_name'])){
				return True;

			}
			else{
				return False;
			}
		}

		public function checkUserEmail($email){//Check for email in the database while in the sign up proccess

			$sql = "SELECT email FROM users WHERE email = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$email]);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if(!empty($result['email'])){
				return True;

			}
			else{
				return False;
			}
		}
	}
