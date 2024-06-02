"use strict";
// Kod skriven av: Maria Halvarsson

let url = "https://studenter.miun.se/~maha2216/dt173g/projekt/webbtjanst/menuapi.php";

window.onload = init;

function init () {
    getMenus();
}

function getMenus() {
    fetch(url + "?weeks")
    .then(response => response.json())
    .then(data => writeMenu(data))
    .catch(err => console.log(err))
}

function writeMenu(menu) {

    let listEl = document.getElementById('week-menus');
    
    menu.forEach(menu => {
        listEl.innerHTML += `<div class="menu"><p>Vecka ${menu.week}</p><button id="${menu.week}" class="deleteBtn">Radera</button><button id="${menu.week}" class="changeBtn">Ändra</button></div>`;
    });

    let changeBtn = document.getElementsByClassName('changeBtn');
    let deleteBtn = document.getElementsByClassName('deleteBtn');

    for(let i = 0; i < changeBtn.length; i++) {
        changeBtn[i].addEventListener('click', changeMenu);
    }

    for(let i = 0; i < deleteBtn.length; i++) {
        deleteBtn[i].addEventListener('click', deleteMenu);
    }

    function changeMenu(event) {
    
        let week = event.target.id;

        fetch(url + "?week=" + week)
        .then(response => response.json())
        .then(data => writeDays(data))
        .catch(err => console.log(err))

        function writeDays (menu) {
            let days = document.getElementById('days-menu');
            days.innerHTML = "";
            menu.forEach(menu => {
                days.innerHTML += `<h3>Vecka: ${menu.week}</h3> <p>${menu.weekday} - ${menu.description}</p><button id="${menu.id}" class="deleteItem">Radera</button><button class="changeItem" id="${menu.id}">Ändra</button>`
            })

            let removeBtn = document.getElementsByClassName('deleteItem');

            for(let i = 0; i < removeBtn.length; i++) {
                removeBtn[i].addEventListener('click', deleteDay);
            }

            let changeItemBtn = document.getElementsByClassName('changeItem');

            for(let i = 0; i < changeItemBtn.length; i++) {
                changeItemBtn[i].addEventListener('click', updateMenu);
            }
        }
    }

    // Delete meny item
    function deleteDay(event) {
        let id = event.target.id;

        let popup = document.getElementById('popup');
        popup.showModal();

        let Btndelete = document.getElementById('delete');
        let closeBtn = document.getElementById('closeBtn');

        closeBtn.addEventListener('click', () => {
            popup.close();
        })

        Btndelete.addEventListener('click', () => {
            fetch(url + "?id=" + id, {
            method: "DELETE"
            })
            .then(response => response.json())
            .then (data => reload())
            .catch(err => console.log(err))
        })


    }
    // Delete the whole week
    function deleteMenu(event) {
        let week = event.target.id;

        fetch(url + "?week=" + week, {
            method: "DELETE"
        })
        .then(response => response.json())
        .then(data => reload())
        .catch(err => console.log(err))
    }



}

// Add meny item
let submitBtn = document.getElementById('submitBtn');

submitBtn.addEventListener('click', addMenuItem)
let weekInput = document.getElementById('week-input');
let dayInput = document.getElementById('day-input');
let dateInput = document.getElementById('date-input');
let descInput = document.getElementById('description-input');

function addMenuItem (event) {
    event.preventDefault(); 

    let week = weekInput.value;
    let day = dayInput.value;
    let date = dateInput.value;
    let description = descInput.value;

    let jsonStr = JSON.stringify({
        "week" : week, 
        "weekday" : day, 
        "description" : description,
        "date" : date
    })

    fetch(url, {
        method: "POST", 
        headers: {
            "content-type": "application/json"
        },
        body: jsonStr
    })
    .then(response => response.json())
    .then(data => clearForm(data))
    .catch(err => console.log(err))
    
    if(week != '' && day != '' && date != '' && description != '') {
        let updatemsg = document.getElementById('updatemsg');
        updatemsg.innerHTML = 'Meny tillagd!';
    }
    
    errorMessage();
}

let updateBtn = document.getElementById('updateBtn');
updateBtn.addEventListener('click', update)

// Change meny item 
function updateMenu (event) {
    let id = event.target.id;

    window.scrollTo({top: 0, behavior: 'smooth'});

    fetch(url + "?id=" + id)
    .then(response => response.json())
    .then(data => changeMenu(data))
    .catch(err => console.log(err))

    function changeMenu (data) {
        weekInput.value = data[0].week;
        dayInput.value = data[0].weekday;
        descInput.value = data[0].description;
        dateInput.value = data[0].date;

        let updateBtn = document.getElementById('updateBtn');
        updateBtn.addEventListener('click', update);

        function update () {
            let updatemsg = document.getElementById('updatemsg');
            updatemsg.innerHTML = 'Dagen är nu uppdaterad!';

            let jsonStr = JSON.stringify({
                        "id" : id,
                        "week" : weekInput.value, 
                        "weekday" : dayInput.value, 
                        "description" : descInput.value, 
                        "date" : dateInput.value
                    })

            
                fetch(url, {
                method: "PUT", 
                body: jsonStr
            }) 
            .then(response => response.json())
            .then(data => reload())
            .catch(err => console.log(err))
        }

        

    }
}

// Reload the page
function reload () {
    window.location.reload();
    clearForm();
}

// Clear the form
function clearForm () {
    weekInput.value = '';
    dayInput.value = '';
    descInput.value = '';
    dateInput.value = '';

}

// Error messages. 
function errorMessage () {

    let weekmsg = document.getElementById('weekmsg');
    let daymsg = document.getElementById('daymsg');
    let datemsg = document.getElementById('datemsg');
    let descmsg = document.getElementById('descmsg');

    if (weekInput.value == '') {
        weekmsg.innerHTML = 'Vänligen skriv in en vecka!';
    } else {
        weekmsg.innerHTML = '';
    }

    if (dayInput.value == '') {
        daymsg.innerHTML = 'Vänligen skriv in en vecka!';
    } else {
        daymsg.innerHTML = '';
    }

    if(dateInput.value == '') {
        datemsg.innerHTML = "Vänligen skriv in ett datum!";
    } else {
        datemsg.innerHTML = '';
    }
    
    if(descInput.value == '') {
        descmsg.innerHTML = "Vänligen skriv in en beskrivning!";
    } else {
        descmsg.innerHTML = '';
    }
   
}