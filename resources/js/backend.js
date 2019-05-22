require('bootstrap.native/dist/bootstrap-native-v4.min.js');

let backendSidebar = document.querySelector('#backend-sidebar');
let userMenu = document.querySelector('#user-menu');
let hamburgerNavBtn = document.querySelector('.hamburger-nav');

// Toggle Hamburger Nav Btn
hamburgerNavBtn.addEventListener('click', () => { hamburgerNavBtn.classList.toggle('is-active') });
hamburgerNavBtn.addEventListener('click', (e) => e.stopPropagation());

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
	if (hamburgerNavBtn.classList.contains('is-active')) {
		hamburgerNavBtn.classList.toggle('is-active');
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
	if (hamburgerNavBtn.classList.contains('is-active')) {
		hamburgerNavBtn.classList.toggle('is-active');
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

// Notifications
import Swal from 'sweetalert2';
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.Swal = Swal;
window.Toast = Toast;