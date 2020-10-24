const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.navbar__links');
const links = document.querySelector('.navbar__links li');

hamburger.addEventListener('click', () => {
    navLinks.classList.toggle("open");
});

$(document).ready(function(){

    $('#dataTable').DataTable({

    })
});