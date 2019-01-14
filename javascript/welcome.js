window.onscroll = function(){
	const scroll = window.pageYOffset;
	const nav = document.querySelector('.nav-bar');
	const navItems = document.querySelectorAll('.item-nav');
	
		if(scroll != 0){
		nav.style.backgroundColor = 'black';

		for(let i=0;i<navItems.length; i++){
			navItems[i].style.color = 'white';
		}
	}
	else{
		nav.style.backgroundColor = 'transparent'
		for(let i=0;i<navItems.length; i++){
			navItems[i].style.color = 'black';
		}
	}
}
