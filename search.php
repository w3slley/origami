<?php
  session_start();
  include_once 'classes/Notes.php';//the notes class is a child of the User class
  include_once 'classes/User.php';
  $id = $_SESSION['id'];
  $user = new User;
  $notes = new Notes;
  $user->setUserLogged($id); //setting logged user to user class
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- To use @media you have to insert this in the html file-->
  	<title>Search | Origami</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Nanum+Myeongjo|Kaushan+Script|Gaegu|Open+Sans+Condensed|Righteous|Rajdhani|Josefin+Slab|Ubuntu" rel="stylesheet">
  	<link rel="stylesheet" type="text/css" href="css/index.css">
  	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  </head>
  <body>
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
			<img class="side-icon" src="icons/sidebar.png">
				<a href="initial_page.php">
					<h1 class="logo-text">Origami</h1>
					<img class="logo" src="icons/logo.svg">
				</a>
			</div>

			<form action="action/searchNote.php" class="search-form" method="POST">
				<input id="search-input" type="search" name="search" placeholder="Search notes...">
				<img id="search-img" src="images/search.png">

			</form>
		<?php //DISPLAYING PROFILE IMAGE IN THE NAVBAR
				$imgFormat = $user->getImgFormat();
				if($imgFormat == ''){
    ?>
				<a href="profile.php"> <img class="profile-img-nav" src="profile_images/blank.png"></a>

	<?php }
				else{
  ?>
					<a href="profile.php"><img class="profile-img-nav" src="profile_images/user<?php echo $id; ?>.<?php echo $imgFormat; ?>"></a>
	<?php }  ?>

		</nav>
    <div class="side-bar">
      <ul>
        <a href="initial_page.php">
          <li>
            <img class="notes-icon" src="images/notes.png">
            <p class="sidebar-text side-bar-notes" style="position: relative">Your notes</p>
          </li>
        </a>
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

    </div>
    <div class="body">
      <p class="text-search">You searched for "<?php echo $_GET['q']; ?>":</p>
      <div class="searched-notes">
        <?php
        $result = $notes->showSearchedNotes($_SESSION['id'], $_GET['q']);
        foreach($result['data'] as $data){ ?>
      		<div class='div-note' id="note" onclick="editNote(<?php echo $data['id']; ?>)">
      			<h1 class='note_title'><?php echo $data['note_title']; ?></h1>
      			<p class='note_content'><?php

      			 echo $data['note_content'];
      			 if(strlen($data['note_content']) == $result['str_length']){
      				echo "[...]";
      			 }

      			 ?></p>
      			<p class='date'>Created at: <?php echo $data['date_created']; ?></p>
      			<p id="<?php echo $data['id']; ?>" style="display: none"></p>
      			<img id='delete-icon' onclick="deleteNote(<?php echo $data['id']; ?>)" src="images/trash.png">

      		</div>
      <?php
      	}

        ?>
      </div>
      <!-- Modal -->
      <div id="myModal" class="modal"> <!-- The modal -->
        <div class="modal-content"> <!-- Modal's content-->
          <span class="close">&times;</span> <!-- close button -->
          <div id="data">
            <div class="loader-edit" id='loader-edit'>
          </div>
        </div>
        </div>
      </div>
    </div>
    <script src="javascript/search.js"></script>
  </body>
</html>
