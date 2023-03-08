/*-------------------------------------------------*\
> @author  : Santiago Sugrañes
> @created : 23.03.2023
|
> @description :
|   Main JavaScript file for the Laravel application
\*-------------------------------------------------*/

//v- Default Laravel config
import './bootstrap';
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();
//^- End default Laravel config

// Navbar DOM element
var navbarElement = document.getElementById('navbar');

// Detects when the user is scrolling on the main window.
window.onscroll = () => {
    stickyNavbar();
}

// Adds sticky class to navbar.
function stickyNavbar() {
    if(window.pageYOffset > 0) {
        navbarElement.classList.add('stickyNavbar');
    } else {
        navbarElement.classList.remove('stickyNavbar');
    }
}
