<?php
	include "../classes/User.php";

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$user_name = $_POST['user_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	$user = new User; //Create a new object to sign up the user.
	$user->addUser($first_name, $last_name, $user_name, $email, $hashedPassword);

	header("Location: ../index.php?signup=success");

