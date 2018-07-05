//SIDEBAR ANIMATION - JS
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

