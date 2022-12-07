// mavbar fixed
window.onscroll = function() {
	const header = document.querySelector('header');
	const fixedNav = header.offsetTop;

	if(window.pageYOffset > fixedNav) {
		header.classList.add('navbar-fixed');
	} else {
		header.classList.remove('navbar-fixed');
	}
}

// Humberger
const humberger = document.querySelector('#hamburger');
const navMenu = document.querySelector('#nav-menu');

humberger.addEventListener('click', function() {
	humberger.classList.toggle('humberger-active');
	navMenu.classList.toggle('hidden');
})

// Darkmode Toggle
const darkToggle = document.querySelector('#dark-toggle');
const html = document.querySelector('html')

darkToggle.addEventListener('click', function() {
	if(darkToggle.checked) {
		html.classList.add('dark');
		localStorage.theme = 'dark';
	} else {
		html.classList.remove('dark');
		localStorage.theme = 'light';
	}
});


// Pindahkan posisi toggle sesuai mode
// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
  darkToggle.checked = true;
} else {
  darkToggle.checked = false;
}