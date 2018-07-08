//User name check using jQuery
$(document).ready(function(){
	$('.user_name').keyup(function(){
		var usernameInput = document.querySelector('.user_name').value;
		$.post("action/checkUsername.php", {user_name: usernameInput}, function(data){
			$('#small-username').html(data);
		});
	});
	
});


//E-mail check using jQuery
$(document).ready(function(){
	$('.email').keyup(function(){
		var emailInput = document.querySelector('.email').value;
		$.post('action/checkUserEmail.php', {email: emailInput}, function(data){
			$('#small-email').html(data);
		});
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
		var message = document.querySelector(".message");
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
			message.innerHTML = data; /*This inserts the data from the signup.php file into the 
			div message*/
			var usernameId = document.getElementById('username-used');/*This is the id of
			the paragraph which comes from the signup.php file if the username the user 
			types is already in use.*/
			var emailId = document.getElementById('email-used');/*This is the id of
			the paragraph which comes from the signup.php file if the email the user 
			types is already in use.*/
			var emptyAllId = document.getElementById('empty-all');

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
			if(data == 'success'){
				window.location.href('index.php');
			}
					
		});

	})
});


//Removing red border when user starts to write on the input.
