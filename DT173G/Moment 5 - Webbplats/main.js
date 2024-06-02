"use strict";

let url = "http://studenter.miun.se/~maha2216/dt173g/moment5/webbtjanst/coursesapi.php";
let courseCodeInput = document.getElementById('code');
let courseNameInput = document.getElementById('course-name');
let courseProgressionInput = document.getElementById('progression');
let courseSyllabusInput = document.getElementById('course-syllabus');
let submitBtn = document.getElementById('addBtn');

window.onload = init;

function init() {
    getCourses();
}


// Läsa in alla kurser från webbtjänsten. 
function getCourses() {
    fetch(url)
    .then(response => {
        if(response.status != 200) {
            return
        }
        return response.json()
        .then(data => writeCourses(data))
        .catch(err => console.log(err))
    })
}




// Skriva ut kurser till DOM
function writeCourses(cours) {
    let listEl = document.getElementById('course-list');
    listEl.innerHTML = "";

    cours.forEach(cours => {
        listEl.innerHTML += `<li>${cours.name} - ${cours.code} - ${cours.progression} - <a href="${cours.course_syllabus}" target="_blank" >Kurslänk</a> </li><button class="deleteBtn" id="${cours.id}">Radera</button><button class="changeBtn" id="${cours.id}">Ändra</button> <hr>`
    });

    let btnEl = document.getElementsByClassName('deleteBtn');
    let changeBtn = document.getElementsByClassName('changeBtn');

    for(let i = 0; i < btnEl.length; i++) {
        btnEl[i].addEventListener('click', deleteCourse);
    }

    for(let i = 0; i < changeBtn.length; i++) {
         changeBtn[i].addEventListener('click', updateCourse)
    }

}




// Radera en kurs
function deleteCourse(event) {
    let id = event.target.id;

    fetch(url + "?id=" + id, {
        method: "DELETE"
    })
    .then(response => response.json())
    .then(data => getCourses())
    .catch(err => console.log(err))
}


// Uppdatera en kurs 
function updateCourse (event) {

    let id = event.target.id;

    fetch(url + "?id=" + id, {
        method : "GET"
    }) 
    .then(response => response.json())
    .then(data => changeCourse(data))
    .catch(err => console.log(err))

    function changeCourse(data)  {
        
        courseCodeInput.value = data[0].code;
        courseNameInput.value = data[0].name;
        courseProgressionInput.value = data[0].progression;
        courseSyllabusInput.value = data[0].course_syllabus;
   }

    let updateBtn = document.getElementById('updateBtn');
    updateBtn.addEventListener('click', updateCours);

    function updateCours () {
    
    

    let coursename = courseNameInput.value;
    let coursecode = courseCodeInput.value;
    let courseprogession = courseProgressionInput.value;
    let coursesyllabus = courseSyllabusInput.value;

      let jsonStr = JSON.stringify({
         "id" : id, 
         "code" : coursecode, 
         "name" : coursename, 
         "progression" : courseprogession,
         "course_syllabus" : coursesyllabus
     })

        fetch(url + "?id=" + id,{
          method: "PUT", 
           headers: {
             "content-type": "application/json"
         },
         body: jsonStr
     })
       .then(response => response.json())
       .then(data => reload())
       .catch(err => console.log(err))
    
    }
   
}

function reload () {
    window.location.reload();
    clearForm();
}

// Lägga till en kurs
submitBtn.addEventListener('click', addCourse);

function addCourse(event) {
    event.preventDefault();

    let coursename = courseNameInput.value;
    let coursecode = courseCodeInput.value;
    let courseprogession = courseProgressionInput.value;
    let coursesyllabus = courseSyllabusInput.value;

    let jsonStr = JSON.stringify({
        "code" : coursecode, 
        "name" : coursename, 
        "progression" : courseprogession,
        "course_syllabus" : coursesyllabus
    })

    fetch(url, {
        method: "POST", 
        headers: {
            "content-type": "application/json"
        },
        body: jsonStr
    })
    .then(response => response.json())
    .then(data => clearForm())
    .catch(err => console.log(err))
}




// Rensa formuläret
function clearForm () {
    courseCodeInput.value = "";
    courseNameInput.value = "";
    courseProgressionInput.value = "";
    courseSyllabusInput.value = "";

    getCourses();
}
