
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

//

$(document).ready(function(){
	$('.signup-form').submit(function(event){
		event.preventDefault();
		var firstNameInput = document.querySelector('.first_name').value;
		var lastNamelInput = document.querySelector('.last_name').value;
		var usernameInput = document.querySelector('.user_name').value;
		var emailInput = document.querySelector('.email').value;
		var passwordInput = document.querySelector('.password').value;
		var passwordInput2 = document.querySelector('password2').value;
		$.post('signup.php',
		{
			first_name: firstNameInput,
			last_name: lastNamelInput,
			user_name: usernameInput,
			email: emailInput,
			password: passwordInput,
			password2: passwordInput2
		},
		function(data){
			alert(data);
		});
		
	})
});
