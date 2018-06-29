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
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Nanum+Myeongjo|Kaushan+Script" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<script src="javascript/main.js"></script>
	


</head>
<body>
	<?php 
		//Logout button
		if(!isset($_SESSION['id'])){ 
			header("Location: index.php");

		}
		else { //The page itself
		?>


		<nav>
			<img class="side-icon" src="images/side.png">
				<a href="initial_page.php">
					<h1 class="logo-text">Notes</h1>
					<img class="logo" src="favicon.ico">
				</a>
			</div>

			<form class="search-form" method="GET">
				<input id="search-input" type="search" name="search" placeholder="Search notes...">
				<button id="search-button"><img id="search-img" src="images/search.png"></button>

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
			<form class="logout-form" method="POST" action="action/logout.php">
				<button class="logout" type="submit" name="submit">Logout</button>
			</form>

		</nav>

		<?php if(isset($_GET['search'])){?>


			<div class="side-bar">
				
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
						<p id="data">You shouldn't see me. Some error have occured.</p>
					</div> 
				</div>
					 
			</div>
			<script>//I don't know why I have to insert this here. It's like it doesn't reconize the javascript file and it does not do anything. Only if I put it here that it starts to work ...¯\_(ツ)_/¯
				var sideBarIcon = document.querySelector('.side-icon');
				var sideBar = document.querySelector('.side-bar');
				var body = document.querySelector('.body');
				var count = 0;
				sideBarIcon.onclick = function(){//This 
					if(count%2 == 0){
						sideBar.style.width = '20%';
						body.style.width = '80%';
						count++;
					}
					else {
						sideBar.style.width = '0%';
						body.style.width = '100%';
						count++;
					}
					
				}

			</script>



		<?php }else{ ?>	

		<div class="side-bar">

		</div>

		<div class="body">
			<div class="write">
				<form id="addNote-form" method="POST" action="action/addNote.php">
					<input id="addNote-title" name="note_title"placeholder="Note title"><br><br>
					<textarea id="addNote-content" spellcheck = "false" style="resize:none" name="note_content" class="index_write_note" placeholder="Write a new note..." onclick="addNoteFunction()"></textarea><br> 
					<button id="addNote-submit" type="submit" name="submit"><img src="plus.png" width="70px"></button>
				</form>
			</div>
			<small id="small"></small>

				<!-- Modal -->
			<div id="myModal" class="modal"> <!-- The modal -->
				<div class="modal-content"> <!-- Modal's content-->
					<span class="close">&times;</span> <!-- close button -->
					<p id="data">You shouldn't see me. Some error have occured.</p> 
					 
				</div>
			</div>

			<div id="notes">
				<?php 
				$notes = new Notes;
				$notes->showNotes($_SESSION['id']);
			 }
			 	?>
			</div>
		</div>
	<?php } ?>
	<script src="javascript/main.js"></script>
	


	
</body>
</html>