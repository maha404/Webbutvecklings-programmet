"use strict";

let btnEl = document.getElementById("menu-icon");
let menuEl = document.getElementById("mobile-list");

btnEl.addEventListener('click', function(){
    if(menuEl.style.display === 'block') {
        menuEl.style.display = 'none';
    } else {
        menuEl.style.display = 'block';
    }
})
