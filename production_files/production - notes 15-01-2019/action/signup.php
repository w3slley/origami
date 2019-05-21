<?php
	include "../classes/User.php";
	//Let me explain this... kkk
	//These are the variables coming from the signup.js file using AJAX with jQuery.
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$user_name = $_POST['user_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	//Here the password is hashed.
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	//These are interesting. They act as controls for the signup process. If a there's a user already with the username inserted, then the first value goes to one. The same thing happens with the email. In the end, the user's informations will only be saved in the database if these two numbers are zero!
	$username_control = 0;
	$email_control = 0;

	//If all the fields are empty, returns this p tag. In the js file, it makes the border of all inputs red.
	if(empty($first_name) and empty($last_name) and empty($user_name) and empty($email) and empty($password)){
		echo "<p id='empty-all'></p>";
	}
	//If only one of the inputs is empty, it returns this p tag. 
	elseif(empty($first_name) or empty($last_name) or empty($user_name) or empty($email) or empty($password)){
		echo "<p id='empty'>You didn't fill in all the fields. Please try again.</p>";
	}
	//If the user name or the email has some value, this is what happens:
	elseif(!empty($user_name) OR !empty($email)){

		if(!empty($user_name)){ //If the username has some value, it goes to the DB and checks to see whether there are any other user with the same username. 
			$usernameObject = new User;
			$check_user = $usernameObject->checkUsername($user_name);
			if($check_user == 1){ //If it does, then it returns this p tag used in the js file and gives the username control variable the value of one, preventing the user to signup.
				echo "<p id='username-used'></p>";
				$username_control = 1;
			}
			else{ //If there's no username, then the control value returns to zero.
				$username_control = 0;
			}
		}


		if(!empty($email)){ //Here the same thing happens. If there's a email in the DB, it will return the p tag used in the js file and it'll set the email control variable to 1, preventing, thus, the user to signup.
			$emailObject = new User;
			$check_email = $emailObject->checkUserEmail($email);
			if($check_email == 1){
				echo "<p id='email-used'></p>";
				$email_control = 1;
			}
			else{//If everything is ok with the e-mail, it sets the control variable to zero, allowing the user to signup if everything else is also ok.
				$email_control = 0;
			}
		}

		if($password != $password2){ //If the passwords are not equal, it returns this p tag to the js file
			echo "<p id='passwordNotEqual'>The passwords are not equal.</p>";
		}
		//This is what makes everything possible. If the passwords are the same and if both the username and email control variables are equal to zero, then at least the user will be signup. It returns this p tag with the success id so that the javascript file can redirect the user to the index.php file.
		elseif($password == $password2 AND $username_control == 0 AND $email_control == 0){
			$user = new User; //Create a new object to sign up the user.
			$user->addUser($first_name, $last_name, $user_name, $email, $hashedPassword);
			echo "<p id='success'></p>";		
		}

	}	

	
	