<?php
	session_start();
	include "../classes/User.php";

	$full_name = $_POST['name'];
	$user_name = $_POST['user_name'];
	$email = $_POST['email'];
	$password_actual = $_POST['password_actual'];
	$password_new = $_POST['password_new'];

	$name = explode(' ', $full_name);
	$first_name = $name[0];
	$last_name = $name[1];
	$id = $_SESSION['id'];
	//For now this only works if the user insert only two names (ex: Weslley Victor)
	
	$passwordCheck = password_verify($password_actual, $_SESSION['password']);
	if($passwordCheck == true){
		$password = password_hash($password_new, PASSWORD_DEFAULT);
		$update = new User;
		$update->updateInfo($first_name, $last_name, $user_name, $email, $password, $id);

		$_SESSION['first_name'] = $first_name;
		$_SESSION['last_name'] = $last_name;
		$_SESSION['user_name'] = $user_name;
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;
		header("Location: ../profile.php?update=success");
	}
	else {
		header("Location: ../profile.php?update=failed&password=wrong");
	}