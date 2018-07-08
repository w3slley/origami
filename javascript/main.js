/*This will make the data from the form go to the addNote.php 
file without loading the page.*/
/*I removed the ready part of the algorithm since it was adding the notes in the
database twice...*/
$("#addNote-form").submit(function(event){//When the form is submited (button is clicked):
	event.preventDefault();/*this makes the form not to go to the action site. It, instead, 
		sets everything to default (do nothing).*/
	var note_title = $("#addNote-title").val();//data from the title
	var note_content = $("#addNote-content").val();//data from the content
	$.post("action/addNote.php", {/*the js sends the data behind the scenes to the
		 addNote.php file with the note_title and note_content!*/
		note_title: note_title,
		note_content: note_content
	}, function (){ /*This will remove the data from the title and textarea when the
	 note is added!*/
		$("#addNote-title").val("");
		$("#addNote-content").val("");

	});
});




//When the add note button is clicked, the page loads the showNotes.php file without realoading itself and adds the title and content to the database behind the scenes.
$(document).ready(function(){
	$("#notes").load("action/showNotes.php");
	$("#addNote-form").submit(function(){
		
		$("#notes").load("action/showNotes.php");
	});
});



var modal = document.getElementById('myModal');//getting the element of the modal
var close = document.getElementsByClassName("close")[0];//getting the close button element

function deleteNote(note_id){//delete notes using AJAX
	var confirmValue = confirm('Do you really want to delete this note?');
	if(confirmValue == true){
		$.post('action/countNumNotes.php', function(data){
			$('#countNotes').html(data);
		});

		$.post('action/deleteNote.php', { id: note_id }, function(){ //run the deleteNote.php file using AJAX.
			modal.style.display = 'none';
			var x = document.getElementById(note_id).parentNode.outerHTML = '';//Selects the parent node (the element the button is in) from the button that has the note's id and deletes it!	I created a button with an id that is equal to the note's id in the database. So, when I delete the note in the database using AJAX, I can also delete its content from the client webpage using the same id.
			
		});
	}
}	

//EDIT NOTE 


/*MODAL INTERACTION*/
function editNote(note_id){ //When the note is clicked, the modal is shown.
	modal.style.display = "block";
		$.post('action/editNote-modal.php', {id: note_id}, function (data){
			document.getElementById('data').innerHTML = data;
			document.body.style.overflow = 'hidden';
			$(document).on('touchmove', function(e) {
		  	  e.preventDefault();
			});
	});

}	
close.onclick = function(){//if the close button is clicked, the modal is closed
	modal.style.display = 'none';
	document.body.style.overflow = 'auto';
}

window.onclick = function(event){ //When clicked outside the modal, it automatically closes.
	if(event.target == modal) {
		/*var editTitle = document.querySelector('.edit-title-modal').value;
		var editContent = document.querySelector('.edit-content-modal').value;
		var noteId = document.querySelector('.id').value;
		$('.edit-form-modal').submit(function(){
		$.post('action/editNote.php', 
			{note_id: noteId,
			 edit_note_title: editTitle,
			 edit_note_content: editContent
			});
		});*/
		//I will try to implement this later!
		
		modal.style.display = 'none';
		document.body.style.overflow = 'auto';
	}
}


//Add animation in notes div (when clicking inside the "add note" section)
var noteContent = document.querySelector('#addNote-content')
var noteTitle = document.querySelector('#addNote-title');

document.addEventListener('click', function(event){
	var	targetElement = event.target; //gets the element that trigered the event.

	do{
		if(targetElement == noteContent | targetElement == noteTitle){/* If the user 
			clicks in the noteContent or the noteTitle, the animation will occur. 
			The only way I could make this work is using only one |. For now, I don't 
			know why. I will try to figure it out...*/
			noteContent.style.paddingBottom = '200px';
			noteTitle.style.opacity = '1';
			noteTitle.style.top = '10px';
			noteTitle.style.cursor = 'text';
			noteTitle.style.zIndex = '1'; /*This is what solved the problem
			When the user clicks in the textarea, the z-index goes to 1 and
			the user can insert the title. When clicked outside, the z-index 
			goes to -1, and the user can no loger click on it - before it was
			possible to click on it even if it was not visible (if you knew it
			you could set the animation going without clicking the textarea - and
			it was not what I wanted). Now, apparently, it's all solved with this.*/

			return; //I have to return nothing here. If not, it will not work!
				
		}
		targetElement = targetElement.parentNode;
	}
	while(targetElement);
	
	noteContent.style.paddingBottom = '0';
	noteTitle.style.opacity = '0';	
	noteTitle.style.cursor = 'default';
	noteTitle.style.zIndex = '-1';
	
		
});

//add animation in the search input (color animation)
//later
/*var searchButton = document.querySelector('#search-button');
var searchInput = document.querySelector('#search-input');
searchInput.onkeyup = function(){
	if(searchInput.value != ''){
		searchButton.style.opacity = '1';
	}
	else{
		searchButton.style.opacity = '0';
	}
	
}*/


//Side-bar animation. Just a heads up: from now on, only use querySelector!
var sideBarIcon = document.querySelector('.side-icon');
var sideBar = document.querySelector('.side-bar');
var body = document.querySelector('.body');

/*When the user clicks for the first time, the count variable is equal to 0 and, thus
will display the fade in animation. The count will be increase by one. The second
time, the count variable will be equal to 1 and the module of 1 and 2 is not 0, 
so, it will display the fade out animation. Well done. */
var count = 0; //this is variable control that I used for this function I created.
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

//Getting number of notes from DB.
$(document).ready(function(){ /*The countNumNotes (number of notes the user has written)
	is loaded into the div with id 'countNotes' every time the page is loaded, */
	$.post('action/countNumNotes.php', function(data){
		$('#countNotes').html(data);
	});
});

$('#addNote-form').submit(function(){//Every time the user adds a new note, 
	$.post('action/countNumNotes.php', function(data){
		$('#countNotes').html(data);
	});
});
//And every time the user deletes a note (is in the deleteNote function up there!)


//ALGORITHM THAT DISPLAYS MORE NOTES WHEN USER REACHES THE BOTTOM OF THE PAGE(jQuery)!
$(document).ready(function(){
	var limit = 10; /*This number is equal to the number of LIMIT in the showNotes 
	function!*/
	var numberControl = 0; /*This is a control number that controls the
	number of times the user went into the bottom of the page.*/
	var loader = document.querySelector('.loading');
	var countNumNotes = parseInt($('#countNotes').html());/*value of notes comming
	from the database that its stored in a hidden div in the initial-page.php file!*/
	$(window).scroll(function(){
		var scrollHeight = $(document).height();
		var scrollPosition = $(window).height() + $(document).scrollTop();

		if(scrollPosition == scrollHeight){
			loader.setAttribute('class', 'loader');
			function setNotes(){
				limit+= 10; /*Number of aditional notes displayed when user
				reaches the bottom of the page*/
				$.post('action/showMoreNotes.php', {limit: limit}, function(data){
					if(limit > countNumNotes){ /*This here will happen when the number
						of notes to be displayed is greater then the number of notes
						that are actually there in the DB (ex: there's 17 notes in the
						database, but 20 notes will be displayed). Then, in those cases, 
						the page needs to reaload only one more time.*/
						if(numberControl == 0){ /*if the number controll is zero*/
							$('#notes').html(data); //it gets the data from the DB
							numberControl+=1;/*it adds one to the control number, 
							making sure the loading will no longer occur.*/
						}	
						else{
							loader.classList.remove('loader');
						}
					}
					else{
						$('#notes').html(data);
					}
				});	
			}

			var countNumNotes = parseInt($('#countNotes').html());
			if(countNumNotes <= 10){
				/*If the number of notes is less or equal to 10 nothing happens!
				Also, the animation will not be showed, so I have to remove
				its class!*/
				loader.classList.remove('loader');
				numberControl = 0; /*If the number of notes from the DB goes bellow
				10, the numberControl variable must go back to zero.*/ 
				

			}
			else{
				setTimeout(setNotes, 2000);/*This is a function that runs another function
			but waits a certain amount of time. The first parameter is the function
			it's going to execute and the second is the time it will take to do it (in
			miliseconds) - in this case, it will wait 2 seconds to execute the
			function setNotes!*/

			/*The loading animation and the AJAX feature will only occur if the 
			count variable (which is the number of notes the user has) is less or equal
			to 10, which is the limit I choose. If it is larger, then it will load
			more notes from the database!*/
			}
			
		}
		else{
			loader.classList.remove('loader'); /*If the user is not at the
			bottom of the page, then no loading animation will be displayed!*/
		}
	});
});
/*The error I'm having right now (saturday, Jun 30 2018, 23:29) is this: I already
set up everything so that when the user adds or deletes notes the number of notes
in the database will be updated in the div with the id "countNotes". The thing 
is: when the user adds notes and passes the 10 notes mark, the page will only
display 10 notes and will load the other ones using the loading animation. Then
if the user deletes notes so that the number of notes in the database drops to
less then 10, and again add notes that passes the 10 mark, the page will not reload
the remaining notes from the DB because I'm now relying on the numberControl variable.
What it does is control when will be the last time the page will load notes. If the
number of notes that will be displayed is greater then the number of notes in the
DB, this variable plays a role. I got to figure out a way so that the user 
can add and delete and do whatever he/she wants and, in the end, it will still 
get the notes from the DB in the correct way and without reloading the page.*/

/*UPDATE: Now it all works (at least for now ;D). The only thing I did was to
set the value of the numberControl to zero everytime the number of notes in the
database went bellow 10, which is the amount of notes displayed in the initial
page. It's still not perfect, and I'll keep an eye on the bugs that certainly
will appear...*/




//SEARCH ON MOBILE - the search input appers when the seach icon is clicked
var sideCount = 0;
var searchIcon = document.querySelector('#search-img');
var searchInput = document.querySelector('#search-input');
var sideIcon = document.querySelector('.side-icon');
searchIcon.onclick = function(){
	if(sideCount%2 == 0){
		searchInput.style.visibility = 'visible';
		searchInput.style.marginTop = '50px';
		sideIcon.style.top = '17px';
		sideCount++;
	}
	else {
		searchInput.style.visibility = 'hidden';
		searchInput.style.marginTop = '0px';
		sideIcon.style.top = '17px';
		sideCount++;
	}
};

	


$('.edit_note_content').keyup(function(){
	var content = $('.edit_note_content').val();
	var title = $('.title_edit').val();
	var id = $('.id').val();
	$.post('action/editNote.php', {note_id: id, note_title: title, note_content: content}, function(){
		alert('success');
	});
});