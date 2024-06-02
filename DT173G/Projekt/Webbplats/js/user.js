"use strict";
// Kod skriven av: Maria Halvarsson

let user_url = "https://studenter.miun.se/~maha2216/dt173g/projekt/webbtjanst/userapi.php";

window.onload = init;

function init () {
    getApiKey ();
}

// User login
function getApiKey () {
    fetch(user_url)
    .then(response => response.json())
    .then(data => save(data))
    .then(err => console.log(err))

    function save (data) {
        let token = data[0].api_key;

        localStorage.setItem('token', token);
    }
}

let usernameInput = document.getElementById('username_login');
let passwordInput = document.getElementById('password_login');

let logInBtn = document.getElementById('loginBtn');
logInBtn.addEventListener('click', logIn);

function logIn (event) {
    event.preventDefault();

    error();

    let token = localStorage.getItem('token');

    let jsonStr = JSON.stringify({
        "username" : usernameInput.value, 
        "password" : passwordInput.value, 
        "api_key" : token
    })

    fetch(user_url, {
        method: "POST", 
        headers: {
            "content-type": "application/json"
        },
        body: jsonStr
    })
    .then(function(response) {
        if(response.status === 200) {
            window.location.replace('user.html');
        } 
    })
    .then(data => console.log(data))
    .catch(err => console.log(err))

}

// Error messages 
function error () {
  
    let usernameMsg = document.getElementById('usernamemsg');
    let passwordMsg = document.getElementById('passwordmsg');

    if(usernameInput.value == '') {
        usernameMsg.innerHTML = 'Vänligen skriv in ett användarnamn!';
    } else {
        usernameMsg.innerHTML = '';
    }

    if(passwordInput.value == '') {
        passwordMsg.innerHTML = 'Vänligen skriv in ett lösenord!';
    } else {
        passwordMsg.innerHTML = '';
    }

}
