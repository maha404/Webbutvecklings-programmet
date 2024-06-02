"use strict"
// Kod skriven av: Maria Halvarsson
// Hamburger menu
let btnEl = document.getElementById('mobilenav-icon');
let listEl = document.getElementById('nav-list');

btnEl.addEventListener('click', function() {
    if(listEl.style.display == "block") {
        listEl.style.display = "none";
    } else {
        listEl.style.display = "block";
    }
});


// API 
let url = "https://studenter.miun.se/~maha2216/dt173g/projekt/webbtjanst/menuapi.php";
let urlOrders = "https://studenter.miun.se/~maha2216/dt173g/projekt/webbtjanst/orderapi.php";
let divEl = document.getElementById('box');
let menuEl = document.getElementById('menu-box');

window.onload = init;

function init() {
    getMenuWeek();
}

let currentDate = new Date();
let startDate = new Date(currentDate.getFullYear(), 0, 1);
let days = Math.floor((currentDate - startDate) / (24 * 60 * 60 * 1000));

let weekNumber = Math.ceil(days / 7);

getMenuWeek(weekNumber);

let weekdays = ['Söndag', 'Måndag', 'Tisdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lördag'];
let d = new Date();
let dayName = weekdays[d.getDay()];

function getMenuWeek (weekNumber) {
    fetch(url + "?week=" + weekNumber, {
        method: "GET"
    })
        .then(response => response.json())
        .then(data => writeMenuWeek(data))
        .catch(err => console.log(err))
}

function writeMenuWeek (menu) {
    
    let sorted = menu.sort(function (a,b) {return a.dayName - b.dayName});

    if(divEl != null) {
        divEl.innerHTML += `<h2>Vecka ${menu[0].week}</h2>`
    }

    sorted.forEach(menu => {
        
         if(divEl != null) {
            divEl.innerHTML += `<div> <h3> ${menu.weekday} </h3>  <p>${menu.description}</p><hr></div>`;
         }

         if(menuEl != null) {
            menuEl.innerHTML += `<div class="boxback"><h3>${menu.weekday}</h3> <p>${menu.description}</p><button class="chooseBtn" id=${menu.id}>Välj</button></div>`;
         }
    });
    
    let chooseBtn = document.querySelectorAll('.chooseBtn');

    for(let i = 0; i < chooseBtn.length; i++) {
        chooseBtn[i].addEventListener('click', menyOption);
    }

}

function menyOption (event) {

    let id = event.target.id;

    let clickedBtn = event.target;

    if(clickedBtn.classList.contains('clicked')) {
        clickedBtn.classList.remove('clicked');
    } else {
        let selectedBtn = document.querySelector('.chooseBtn.clicked');
        if(selectedBtn) {
            selectedBtn.classList.remove('clicked');
        }
        clickedBtn.classList.add('clicked');
    }
    
    fetch(url + "?id=" + id, {
        method: "GET"
    })
    .then(response => response.json())
    .then(data => option(data))
    .catch(err => console.log(err))

    function option(data) {
    
        let description = data[0].description;

        let btn = document.getElementById('bookBtn');
        btn.addEventListener('click', confirmation);

        function confirmation (event) {
        
        event.preventDefault();
       

        let nameInput = document.getElementById('name');
        let phonenumInput = document.getElementById('phonenumber');

        let name = nameInput.value;
        let phonenumber = phonenumInput.value;
        let text = description;

        // Error messages
        let namemsg = document.getElementById('namemsg');
        let phonemsg = document.getElementById('phonemsg');

        if(nameInput.value == '') {
            namemsg.innerHTML = 'Vänligen skriv in ditt namn!';
        } else {
            namemsg.innerHTML = '';
        }

        if(phonenumInput.value == '') {
            phonemsg.innerHTML = 'Vänligen skriv in ditt telefonnummer!';
        } else {
            phonemsg.innerHTML = '';
        }

        // Booked message
        let bookedmsg = document.getElementById('confirmmsg');
        if(name !== '' && phonenumber!== '') {
            bookedmsg.innerHTML = 'Din beställning är nu skickad!';
        }

        let jsonStr = JSON.stringify({
            name : name, 
            phonenumber : phonenumber, 
            description : text
        });


                fetch(urlOrders, {
                    method: "POST", 
                    headers: {
                    "content-type" : "application/json"
                    }, 
                    body: jsonStr
                    })
                    .then(response => response.json())
                    .then(data => console.log(data))
                    .catch(err => console.log(err))
          
}
    }
}