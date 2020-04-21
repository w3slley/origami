function editNote(note_id){ //When the note is clicked, the modal is shown.
	//Modal Variables
	let modal = document.getElementById('myModal');//getting the element of the modal
	let modalContent = document.getElementsByClassName('modal-content')[0];

	let loaderEdit = document.querySelector('#loader-edit');
	modal.style.display = 'block';
	modal.style.animationName = 'animation';
	modal.style.animationDuration = '.7s'
	$.post('action/editNote-modal.php', {noteId: note_id}, function (data){
		document.getElementById('data').innerHTML = data;
		
		/*loaderEdit.classList.remove('loader-edit');/*This
		makes a loader icon appear when the note is being retrieve from the database*/
		let noteModalContent = document.querySelector('#edit-content-modal');
		let noteModalTitle = document.querySelector('#edit-title-modal');
		let noteId = document.querySelector('.id');
		let deleteButton = document.querySelector('.delete');



		//ASYNC FEATURE!
		var s = window.location.search;

		//For the note title
		noteModalTitle.onkeyup = function(){

			$.post('action/editNote.php', {noteId: noteId.value, noteContent: noteModalContent.value, noteTitle: noteModalTitle.value}, function(){

			}); //saves data into the database

			if(s!=''){//If there's something in the search atribute, that means we are in the search page
				var search = s.split('=');
				var searchTerm = search[1].replace(/\+/g, ' ');
				//updates the search page after editing on it
				$.post('action/showSearchedNotes.php',{search: searchTerm}, function(data){
					$('.searched-notes').html(data)

				});
			}
			else{
				//updates the main page after editing on it
				$.post('action/showMoreNotes.php',{limit: divLimit}, function(data){
					$('#notes').html(data)

				});

			}

		}
		//For the note content
		noteModalContent.onkeyup = function(){
			$.post('action/editNote.php', {noteId: noteId.value, noteContent: noteModalContent.value, noteTitle: noteModalTitle.value}, function(){

			});

			//fixing problem with loading notes in the search mode with async (not solved yet) - FIXED

			if(s!=''){
				var search = s.split('=');
				var searchTerm = search[1].replace(/\+/g, ' ');

				$.post('action/showSearchedNotes.php',{search: searchTerm}, function(data){
					$('.searched-notes').html(data)


				});
			}
			else{
				$.post('action/showMoreNotes.php',{limit: divLimit}, function(data){
					$('#notes').html(data)


				});
			}

		}

		//When the delete button is pressed!
		deleteButton.onclick = function(e){
			e.preventDefault();
			var confirmation = confirm('Are you sure?');
			if(confirmation){
				$.post('action/deleteNote.php', {id: noteId.value}, function(data){
					modal.style.display = 'none';
					document.querySelector('#notes').innerHTML = data;
					document.getElementById('data').innerHTML = "";
				});
			}

		}


	});
}


//WHEN PRESSED "ESC" - This is how you can use the keyboard to do something in the website! You can make even a game with this... I assume every key in the keyboard has a unique number.
document.onkeyup = function(event){
	if(event.keyCode == 27){
		let modal = document.getElementById('myModal');
		modal.style.display = 'none';
		modal.style.animationName = 'animation-out';
		modal.style.animationDuration = '1s'
		//document.body.style.overflow = 'auto';
		document.getElementById('data').innerHTML = "";//coloquei isso para desabilitar temporariamente o loader. Se você quiser que a animação loading volte a funcionar, é só descomentar o código abaixo e comentar esse.
		//document.getElementById('data').innerHTML = "<div class='loader-edit' id='loader-edit'></div>"; //This right here fixed the problem I was having with the loader in the modal. Now, (15/01/2019) when the notes area loading, the animation will be displayed.
	}
}


//WHEN CLICKED OUTSIDE modal-content
window.onclick = function(event){ //When clicked outside the modal, it automatically closes.
	let modal = document.getElementById('myModal');
	if(event.target == modal) {
		modal.style.display = 'none';
		document.getElementById('data').innerHTML = "";
	}
}


//WHEN CLICKED IN THE CLOSE ICON

let close = document.querySelector('.close');
close.onclick = function(){
	let modal = document.getElementById('myModal');
	modal.style.display = 'none';
	document.getElementById('data').innerHTML = "";
}

//SIDEBAR CODE



//SIDEBAR ANIMATION.
let sideBarIcon = document.querySelector('.side-icon');
var count = 0;
sideBarIcon.onclick = function(){//This is what happens when the side icon is clicked:
	let sideBar = document.querySelector('.side-bar');
	let body = document.querySelector('.body');
	if(count%2 == 0){/*when clicked for the first time, the modulo of 0/2 is zero, therefore,
		the side bar will appear with the animation.*/
		sideBar.style.animationName = 'animation-sidebar';
		sideBar.style.animationDuration = '.3s';
		sideBar.style.left = '0';
		sideBar.style.width = '20%';
		body.style.width = '90%';
		count++;
	}
	else { /*When the modulo is not equal to zero, the side bar will slide back with animation.*/
		sideBar.style.animationName = 'animation-out-sidebar';
		sideBar.style.animationDuration = '.4s';
		sideBar.style.left = '-800px';
		body.style.width = '100%';
		count++;
	}

}



let notesSideBar = document.querySelector('.side-bar-notes');
let settingsSideBar = document.querySelector('.side-bar-settings');
let logoutButton = document.querySelector('.logout-button');

//Notes
notesSideBar.onclick = function(){
	window.location = 'initial_page.php';
}
//Settings
settingsSideBar.onclick = function(){
	window.location = 'settings.php';
}

//Logout
logoutButton.onclick = function(){
	window.location = 'action/logout.php';
}
