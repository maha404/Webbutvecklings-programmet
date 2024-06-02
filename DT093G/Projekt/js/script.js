"use strict";

function myFunction(){
    let x = document.getElementById("password_reg");
    console.log('click');
    if(x.type === "password") {
        x.type = "text";
    } else {
       x.type = "password";
    }
}