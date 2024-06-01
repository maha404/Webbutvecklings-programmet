"use strict"

let catArray = ['Siri', 'Molly', 'Oskar', 'Måns', 'Missan'];

let listEl = document.getElementById('list');
let btnEl = document.getElementById('listBtn');
let clearBtn = document.getElementById('clearBtn');
let elementExists = document.getElementsByClassName('list-item');

let catBreeds = new Map();

catBreeds.set('Siri', 'Bondkatt')
.set('Molly', 'Sibirisk')
.set('Oskar', 'Birma/Brittisk korthår')
.set('Måns', 'Blandras')
.set('Missan', 'Blandras');

btnEl.addEventListener('click', () => {

    if(!elementExists){

    } else {
        listEl.innerHTML = '';
        console.log('hej från else');
    }

    catArray.forEach(function(cats){
        listEl.innerHTML += `<li class='list-item'>${cats} , ${catBreeds.get(cats)}</li>`;
    });

});

clearBtn.addEventListener('click', () => {
    listEl.innerHTML = '';
});
