<?php
	include "../classes/User.php";
	//Increasing cookie lifetime (both on server session and on browser cookie)
	$lifetime = 60*60*24*30*6; //6 months in seconds

	//gc_maxlifetime defines the expiration date (in seconds) of the session in the server (saved in the server's file system) 
	ini_set("session.gc_maxlifetime", $lifetime); 

	//cookie_lifetime defines the expiration date (in seconds) of the cookie stored in the browser (PHPSESSID)
	ini_set("session.cookie_lifetime", $lifetime);

	session_start();//session start comes after making changes to cookie settings

	$email_username = $_POST['email_username'];
	$password = $_POST['password'];

	$login = new User();//Create a new object to login the user!
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
