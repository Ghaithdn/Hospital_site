// Get the menu button and navbar elements
let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');


// Toggle menu and navbar when menu button is clicked
menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}
// Remove menu and navbar styles when the page is scrolled
window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}