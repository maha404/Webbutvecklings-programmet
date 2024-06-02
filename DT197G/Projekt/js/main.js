"use strict"
// Mobilmeny
let btnEl = document.getElementById('nav-icon');
let listEl = document.getElementById('mobile-list');
btnEl.addEventListener('click', ()=> {

    if(listEl.style.display == 'none') {
        listEl.style.display = 'block';
    } else {
        listEl.style.display = 'none'
    }

})