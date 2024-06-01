"use strict";

let burger = document.getElementById('button');

burger.addEventListener('click', function(){
    console.log('click');
    let menu = document.getElementById('mobile-list');
    if(menu.style.display == 'block'){
       menu.style.display = 'none';
    } else {
        menu.style.display = 'block';
    }
})