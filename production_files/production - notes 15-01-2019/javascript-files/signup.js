//User name check using jQuery
$(document).ready(function(){
	$('.user_name').keyup(function(){
		var username = document.querySelector('.user_name');
		username.style.border = 'none';/*This will make sure when the user types
		something inside the username input the border will be set to none*/
		var usernameInput = document.querySelector('.user_name').value;
		$.post("action/checkUsername.php", {user_name: usernameInput}, function(data){
			$('#small-username').html(data);
		});
	});
	
});


//E-mail check using jQuery
$(document).ready(function(){
	$('.email').keyup(function(){
		var emailElement = document.querySelector('.email');
		emailElement.style.border = 'none';/*This will make sure when the user types
		something inside the email input the border will be set to none*/
		var emailInput = document.querySelector('.email').value;
		$.post('action/checkUserEmail.php', {email: emailInput}, function(data){
			$('#small-email').html(data);
		});
	});
});

//Removing border of all inputs when user types anything in the first name input.
//This is far from elegant code. I will fix this later.
$(document).ready(function(){
	$('.first_name').keyup(function(){
		document.querySelector('.first_name').style.border = 'none';
		document.querySelector('.last_name').style.border = 'none';
		document.querySelector('.user_name').style.border = 'none';
		document.querySelector('.email').style.border = 'none';
		document.querySelector('.password').style.border = 'none';
		document.querySelector('.password2').style.border = 'none';
	});
});


//Removing border of password input
$(document).ready(function(){
	$('.password').keyup(function(){
		document.querySelector('.password').style.border = 'none';
		document.querySelector('.password2').style.border = 'none';
	});
});




//error handlers on signup page
$(document).ready(function(){
	$('.signup-form').submit(function(event){
		var firstNameInput = document.querySelector('.first_name').value;
		var lastNamelInput = document.querySelector('.last_name').value;
		var usernameInput = document.querySelector('.user_name').value;
		var emailInput = document.querySelector('.email').value;
		var passwordInput = document.querySelector('.password').value;
		var passwordInput2 = document.querySelector('.password2').value;
		var smallPassword = document.querySelector("#small-password");
		event.preventDefault();
		
		$.post('action/signup.php',
		{
			first_name: firstNameInput,
			last_name: lastNamelInput,
			user_name: usernameInput,
			email: emailInput,
			password: passwordInput,
			password2: passwordInput2
		},
		function(data){
			smallPassword.innerHTML = data; /*This inserts the data from the signup.php file into the 
			div message*/
			var usernameId = document.getElementById('username-used');/*This is the id of
			the paragraph which comes from the signup.php file if the username the user 
			types is already in use.*/
			var emailId = document.getElementById('email-used');/*This is the id of
			the paragraph which comes from the signup.php file if the email the user 
			types is already in use.*/
			var emptyAllId = document.getElementById('empty-all');

			var passwordNotEqual = document.getElementById('passwordNotEqual');

			var success = document.getElementById('success');

			if(usernameId){ //If the username id is in the page
				document.querySelector('.user_name').style.border = '1px solid red';
			}
			if(emailId){ //If the email id is in the page
				document.querySelector('.email').style.border = '1px solid red';
			}
			if(usernameId && emailId){ //If both are in the page
				document.querySelector('.user_name').style.border = '1px solid red';
				document.querySelector('.email').style.border = '1px solid red';
			}
			if(emptyAllId){//If all fields are empty
				document.querySelector('.first_name').style.border = '1px solid red';
				document.querySelector('.last_name').style.border = '1px solid red';
				document.querySelector('.user_name').style.border = '1px solid red';
				document.querySelector('.email').style.border = '1px solid red';
				document.querySelector('.password').style.border = '1px solid red';
				document.querySelector('.password2').style.border = '1px solid red';
			}
			if(passwordNotEqual){
				document.querySelector('.password').style.border = '1px solid red';
				document.querySelector('.password2').style.border = '1px solid red';
			}
			if(success){
				window.location.href = "index.php";//Now it's working...
			}
					
		});

	})
});


//Removing red border when user starts to write on the input.
