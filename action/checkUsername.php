<?php
	include "../classes/Notes.php";
	
	$user_name = $_POST['user_name'];

	$checkUsername = new User;
	$username = $checkUsername->checkUsername($user_name);
	if($username == 1){
		echo "<div id='message-username'>This username is already in use. Please, choose another one.</div>";
	}
	elseif($user_name == ""){
		echo "";
	}
	else{
		echo "<img id='image-ok' src='https://www.shareicon.net/data/128x128/2016/08/20/817721_check_512x512.png'> ";
	}