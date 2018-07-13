<?php 
	session_start();
	include "classes/Notes.php";
	$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- To use @media you have to insert this in the html file-->
	<title>Notes | Your personal note application</title>
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
	</script>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Nanum+Myeongjo|Kaushan+Script|Gaegu|Open+Sans+Condensed|Righteous|Rajdhani|Josefin+Slab" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<script src="javascript/main.js"></script>
	


</head>
<body>
	<?php 
		
		if(!isset($_SESSION['id'])){ 
			header("Location: index.php");

		}
		else { //The page itself
		?>


		<nav class="nav">
			<div class="dropdown-settings">
				<ul>
					<li><a href="#">Profile</a></li>
					<li><a>
						<form class="logout-form" method="POST" action="action/logout.php">
							<button class="logout" type="submit" name="submit">Logout</button>
						</form></a>
					</li>
				</ul>
			</div>
			<img class="side-icon" src="images/side.png">
				<a href="initial_page.php">
					<h1 class="logo-text">Notes</h1>
					<img class="logo" src="favicon.ico">
				</a>
			</div>

			<form class="search-form" method="GET">
				<input id="search-input" type="search" name="search" placeholder="Search notes...">
				<img id="search-img" src="images/search.png">

			</form>



			<?php 	//DISPLAYING PROFILE IMAGE IN THE NAVBAR
				$img = new User;
				$imgFormat = $img->getImgFormat($id);

				if($imgFormat == ''){ ?>

				<a href="profile.php"> <img class="profile-img-nav" src="profile_images/blank.png"></a>

			<?php }
				else{ ?>

					<a href="profile.php"><img class="profile-img-nav" src="profile_images/user<?php echo $id; ?>.<?php echo $imgFormat; ?>"></a>

			<?php }
			?>
			

		</nav>

		<?php if(isset($_GET['search'])){?>

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

			</div>
			<div class="body">
				<p class="text-search">You searched for "<?php echo $_GET['search']; ?>":</p>
				<div class="searched-notes">
					<?php
					$searchedNotes = new Notes;
					$searchedNotes->showSearchedNotes($_SESSION['id'], $_GET['search']);

					?>

				</div>

				<!-- Modal -->
				<div id="myModal" class="modal"> <!-- The modal -->
					<div class="modal-content"> <!-- Modal's content-->
						<span class="close">&times;</span> <!-- close button -->
						<p id="data"><div class="loader-edit"></div></p>
					</div> 
				</div>
					 
			</div>
			



		<?php }
		else { ?>	

		<form class="logout-form" method="POST" action="action/logout.php">
				<button class="logout" type="submit" name="submit">Logout</button>
		</form>
		
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


		<div class="body">
			<div class="write">
				<form id="addNote-form" method="POST" action="action/addNote.php">
					<input id="addNote-title" name="note_title"placeholder="Note title"><br><br>
					<textarea id="addNote-content" spellcheck = "false" style="resize:none" name="note_content" class="index_write_note" placeholder="Write a new note..."></textarea><br> 
					<button id="addNote-submit" type="submit" name="submit"><img src="plus.png" width="70px"></button>
				</form>
			
			</div>
			<small id="small"></small>

				<!-- Modal -->
			<div id="myModal" class="modal"> <!-- The modal -->
				<div class="modal-content"> <!-- Modal's content-->
					<span class="close">&times;</span> <!-- close button -->
					<p id="data"><div class="loader-edit" id='loader-edit'></div></p> 
					 
				</div>
			</div>

			<div id="notes">
				<?php 
				$notes = new Notes;
				$notes->showNotes($_SESSION['id']);
			 
			 	?>
			</div>

			<div id="countNotes" style="display: none;">			
			</div>
			<div class="loading"></div>
		
		</div>

	<?php }
	} ?>
	<script src="javascript/main.js"></script>
		
</body>
</html>