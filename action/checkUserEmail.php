<?php
	include "../classes/Notes.php";
	
	$email = $_POST['email'];

	$checkEmail = new User;
	$object = $checkEmail->checkUserEmail($email);
	if($object == 1){
		echo "<div id='message-email'>This e-mail is already in use. Please, insert another one.</div>";
	}
	elseif($email == ''){
		echo "";
	}
	else{
		echo "<img id='image-ok-email' src='https://www.shareicon.net/data/128x128/2016/08/20/817721_check_512x512.png'> ";
	}

	//In this page I'll test if the e-mail is valid or not