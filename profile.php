<?php
	include "classes/User.php";
	session_start();
	$id = $_SESSION['id'];
	$user = new User();
	$user->setUserLogged($id);

	if(!isset($id)){
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- To use @media you have to insert this in the html file-->
	<title>Origami | Profile</title>
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
	</script>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Nanum+Myeongjo|Kaushan+Script|Rajdhani" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
</head>
<body>
	<nav>
		<img class="side-icon" src="icons/sidebar.png">
			<a href="initial_page.php">
				<h1 class="logo-text">Origami</h1>
				<img class="logo" src="icons/logo.svg">
			</a>
		</div>
		<div class="side-bar">
			<ul>
        <li>
          <img class="notes-icon" src="images/notes.png">
          <p class="sidebar-text side-bar-notes" style="position: relative">Your notes</p>
        </li>
				<li>
					<img class="notes-icon" src="images/config.png">
					<p class="sidebar-text side-bar-settings" style="position: relative">Settings</p>
				</li>
				<li>
					<img class="notes-icon" src="images/logout.png">
					<p class="sidebar-text logout-button">Logout</p>
				</li>
			</ul>
		</div>
		<form action="action/searchNote.php" class="search-form" method="POST">
			<input id="search-input" type="search" name="search" placeholder="Search notes...">

		</form>
		<img id="search-img" src="images/search.png">
		<?php 	//DISPLAYING PROFILE IMAGE IN THE NAVBAR
				$imgFormat = $user->getImgFormat();
				if($imgFormat == ''){ //if there's no format in the database: (that means that the user didn't uploaded a image yet) ?>
				<img class="profile-img-nav" src="profile_images/blank.png">
			<?php }
				else{ //if there is: (that means the user already uploaded one image!) ?>
					<img class="profile-img-nav" src="profile_images/user<?php echo $id; ?>.<?php echo $imgFormat; ?>">
			<?php }
			?>
	</nav>

	<div class="dropdown-settings">
		<ul>
			<li><a href="#">Profile</a></li>
			<li>
				<form class="logout-form" method="POST" action="action/logout.php">
					<button class="logout" type="submit" name="submit">Logout</button>
				</form>
			</li>
		</ul>
	</div>
	<div class="side-bar">
		<ul>
			<a href="initial_page.php">
				<li>
					<img class="notes-icon" src="images/notes.png">
					<p class="sidebar-text" style="position: relative">Your notes</p>
				</li>
			</a>
			<li>
				<img class="notes-icon" src="images/config.png">
				<p class="sidebar-text" style="position: relative">Settings</p>
			</li>
		</ul>
	</div>

	<div class="profile">
		<div class="profile-body">
			<div class="image-container">

				<?php  //DISPLAYING PROFILE IMAGE IN THE PROFILE PAGE.
					if($imgFormat == ''){ ?>
					<img class="profile-img" src="profile_images/blank.png">
				<?php }
					else{
				?>
						<img class="profile-img" src="profile_images/user<?php echo $id; ?>.<?php echo $imgFormat; ?>">
				<?php
					}
				?>

				<form class="upload-img-form" method="POST" action="action/uploadImage.php" enctype="multipart/form-data">
					<input id="upload-img-input" type="file" name="file">
					<button id="upload-img-button" name="submit" type="submit">Upload picture</button>
				</form>

			</div>
			<div class="information-container">
				<p id="information-text">Personal Information</p>
				<hr>
				<p style="font-weight: bold">Update personal information:</p>
				<form class="form-profile" method="POST" action="action/updateInfo.php">
					<p>Name: </p> <input id="input-name" type="text" name="name" value="<?php echo $_SESSION['first_name']." ".$_SESSION['last_name']; ?>">
					<p>Username: </p> <input id="input-username" type="text" name="user_name" value="<?php echo $_SESSION['user_name']; ?>">
					<p>E-mail: </p> <input id="input-email" type="email" name="email" value="<?php echo $_SESSION['email']; ?>"> <br>
					<button type="submit" id="info-button">Save Changes</button>
				</form>
				<p style="font-weight: bold">Change your password:</p>
				<form class="form-password form-profile" method="POST" action="action/updatePassword.php">
					<p>Password: </p> <input id="input-password" type="password" name="password_actual" placeholder="Your current password...">
					<p>New password: </p> <input id="input-password" type="password" name="password_new" placeholder="Your new password...">
					<p>Repeat password: </p> <input id="input-password" type="password" name="password_new2" placeholder="Your new password...">
					<button type="submit" id="info-button">Update password</button>
				</form>
			</div>
		</div>
	</div>

	<?php
		if(isset($_GET['update'])){
			if($_GET['update'] == 'success'){
				echo '<script>alert("Your personal information have been updated!");</script>';
			 }
		}
	?>
	<script src="javascript/profile.js"></script>
</body>
</html>
