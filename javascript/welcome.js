window.onscroll = function(){
	const scroll = window.pageYOffset;
	const nav = document.querySelector('.nav-bar');
	const navItems = document.querySelectorAll('.item-nav');
	const logo = document.querySelector('#welcome-header');
	
		if(scroll != 0){
		nav.style.backgroundColor = '#9BC1BC';
		

		for(let i=0;i<navItems.length; i++){
			navItems[i].style.color = 'black';
		}
		logo.style.color = 'black';


	}
	else{
		nav.style.backgroundColor = 'transparent';

		for(let i=0;i<navItems.length; i++){
			navItems[i].style.color = 'white';
		}
		logo.style.color = 'white';
	}
}
