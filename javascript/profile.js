var sideBarIcon = document.querySelector('.side-icon');
var sideBar = document.querySelector('.side-bar');
var body = document.querySelector('.profile');
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
