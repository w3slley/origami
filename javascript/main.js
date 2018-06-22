
$(document).ready(function(){/*This will make the data from the form go to the addNote.php 
	file without loading the page.*/
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
});