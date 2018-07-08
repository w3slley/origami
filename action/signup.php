<?php
	include "../classes/User.php";

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$user_name = $_POST['user_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


	


	

	if(empty($first_name) and empty($last_name) and empty($user_name) and empty($email) and empty($password)){
		echo "<p id='empty-all'></p>";
	}
	elseif(empty($first_name) or empty($last_name) or empty($user_name) or empty($email) or empty($password)){
		echo "<p id='empty'>You didn't fill in all the fields. Please try again.</p>";
	}
	elseif(!empty($user_name) OR !empty($email)){

		if(!empty($user_name)){
			$usernameObject = new User;
			$check_user = $usernameObject->checkUsername($user_name);
			if($check_user == 1){
				echo "<p id='username-used'></p>";
			}
		}

		if(!empty($email)){
			$emailObject = new User;
			$check_email = $emailObject->checkUserEmail($email);
			if($check_email == 1){
				echo "<p id='email-used'></p>";
				
			}
		}

		if($password != $password2){
		echo "<p id='passwordNotEqual'>The passwords are not equal.</p>";
		}

	}	

	else{
		$user = new User; //Create a new object to sign up the user.
		$user->addUser($first_name, $last_name, $user_name, $email, $hashedPassword);
		echo "success";

		
	}
	