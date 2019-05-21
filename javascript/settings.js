//SIDEBAR ANIMATION. 
var sideBarIcon = document.querySelector('.side-icon');
var sideBar = document.querySelector('.side-bar');
var body = document.querySelector('.body');

var count = 0; 
sideBarIcon.onclick = function(){
	if(count%2 == 0){
		
		sideBar.style.animationName = 'animation-sidebar';
		sideBar.style.animationDuration = '.3s';
		sideBar.style.left = '0';
		sideBar.style.width = '20%';
		body.style.width = '90%';
		count++;
	}
	else { 
		sideBar.style.animationName = 'animation-out-sidebar';
		sideBar.style.animationDuration = '.4s';
		sideBar.style.left = '-800px';
		body.style.width = '100%';
		count++;
	}
	
}

//Notes
var notesSideBar = document.querySelector('.side-bar-notes');
notesSideBar.onclick = function(){
	window.location = 'initial_page.php';
}
//Settings
var settingsSideBar = document.querySelector('.side-bar-settings');
settingsSideBar.onclick = function(){
	window.location = 'settings.php';
}
//Logout
var logoutButton = document.querySelector('.logout-button');
logoutButton.onclick = function(){
	window.location = 'action/logout.php';
}
