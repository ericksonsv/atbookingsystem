let backendSidebar = document.querySelector('#backend-sidebar');
let userMenu = document.querySelector('#user-menu');

// Stop Progation For Sidebar
backendSidebar.addEventListener('click', (e) => e.stopPropagation());

// Toggler Sidebar
document.querySelector('#sidebar-toggler').addEventListener('click', (e) => {
	e.stopPropagation();
	if (userMenu.classList.contains('visible')) {
		userMenu.classList.toggle('visible');
	}
	backendSidebar.classList.toggle('visible');
});

// Stop Progation For User Menu
userMenu.addEventListener('click', (e) => e.stopPropagation());

// Toggler User Menu
document.querySelector('#user-dropdown').addEventListener('click', (e) => {
	e.stopPropagation();
	e.preventDefault();
	if (backendSidebar.classList.contains('visible')) {
		backendSidebar.classList.toggle('visible');
	}
	userMenu.classList.toggle('visible');
});

// Hide Sidebar and User Menu If Visible
document.querySelector('body').addEventListener('click', (e) => {
	if (backendSidebar.classList.contains('visible')) {
		backendSidebar.classList.toggle('visible');
	}
	if (userMenu.classList.contains('visible')) {
		userMenu.classList.toggle('visible');
	}
});

// Dropdown Sidebar

let sidebarDropdowns = document.querySelectorAll('.sidebar-dropdown');
for (let i = 0; i < sidebarDropdowns.length; i++) {
	sidebarDropdowns[i].addEventListener('click', () => {
		sidebarDropdowns[i].classList.toggle('open');
		let menu = sidebarDropdowns[i].children[0].nextElementSibling;
		if (menu.style.maxHeight) {
			menu.style.maxHeight = null;
		} else {
			menu.style.maxHeight = menu.scrollHeight + "px";
		}
	});
}

// let sidebarDropdowns = document.querySelectorAll('.sidebar-dropdown');
// for (let i = 0; i < sidebarDropdowns.length; i++) {
// 	sidebarDropdowns[i].addEventListener('click', () => {
// 		sidebarDropdowns[i].classList.toggle('open');
// 	});
// }









// let backendMain = document.querySelector('#backend-main');
// if(backendMain.parentElement.classList.contains('visible')){
// 	console.log('visible');
// } else {
// 	console.log('No Ative');
// }