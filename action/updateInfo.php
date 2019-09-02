<?php
	session_start();
	include "../classes/User.php";
	if(isset($_POST['name'])){
		$full_name = $_POST['name'];
		$username = $_POST['user_name'];
		$email = $_POST['email'];

		$name = explode(' ', $full_name);
		$first_name = $name[0];
		$last_name = $name[1];
		$id = $_SESSION['id'];
		//For now this only works if the user insert only two names (ex: Weslley Victor)
		$update = new User;
		$update->updateInfo($first_name, $last_name, $username, $email, $id);
		$_SESSION['first_name'] = $first_name;
		$_SESSION['last_name'] = $last_name;
		$_SESSION['user_name'] = $username;
		$_SESSION['email'] = $email;

		header('Location: ../profile.php');

	}
	else{
		header('Location: ../initial_page.php');
	}
