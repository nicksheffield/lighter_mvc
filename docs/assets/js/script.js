var sidebar = document.querySelector('.sidebar');

window.onscroll = function(e){
	if(window.scrollY > 45){
		sidebar.style.position = 'fixed';
	}else{
		sidebar.style.position = 'absolute';
	}
}