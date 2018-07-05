<?php
	include "../classes/User.php";

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$user_name = $_POST['user_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	if($password != $password2){
		header("Location: ../signup.php?password=notEqual");
	}
	elseif(empty($first_name) or empty($last_name) or empty($user_name) or empty($email) or empty($password)){
		echo "empty";
	}
	else{
		$user = new User; //Create a new object to sign up the user.
		$user->addUser($first_name, $last_name, $user_name, $email, $hashedPassword);

		header("Location: ../signup.php?signup=success");
	}
