<?php 
	include "../classes/User.php";

	session_start();

	$email_username = $_POST['email_username'];
	$password = $_POST['password'];

	$login = new User;//Create a new object to login the user!
	$data = $login->checkUser($email_username, $password);

	if($data != False){
		$_SESSION['id'] = $data['id'];
		$_SESSION['first_name'] = $data['first_name'];
		$_SESSION['last_name'] = $data['last_name'];
		$_SESSION['user_name'] = $data['user_name'];
		$_SESSION['email'] = $data['email'];
		$_SESSION['password'] = $data['password'];


		header("Location: ../validation.php?logged=y");


	}
	else {
		header("Location: ../index.php?login=failed");
	}