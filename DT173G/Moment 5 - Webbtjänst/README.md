## Moment 5 - REST-webbtjänster med PHP

Denna uppgift gick ut på att skapa en REST-webbtjänst som använder sig av CURD (Create, Update, Read & Delete). 

För att kunna testköra och installera gå in på följande länk: http://studenter.miun.se/~maha2216/dt173g/moment5/webbtjanst/coursesapi.php

Denna webbtjänst är byggd med hjälp av PHP och innehåller en klassfil där all data hanteras mellan webbsidan och databasen med hjälp av fetch som skickar med olika metoder så som GET, PUT, POST och DELETE. 

I courses.class.php går det bland annat att hitta följande klasser:
* __construct - Ansluter till databasen. 
* setCourse - Sparar datan till properties i klassen med hjälp av ett fetch anrop som är gjord med metod "POST". 
* setCourseAndId - Sparar datan till properties i klassen plus ID med ett fetch anrop som är gjort med metod "PUT". 
* saveCourse - Sparar datan till databasen. 
* getCourses - Hämtar alla kurser som finns i databasen. 
* getCourseById - Hämtar endast en kurs basert på vilket ID som skickas med i ett fetch anrop gjord med metod "GET". 
* updateCourse - Uppdaterar en kurs i databasen. Här behövs ett ID ges för att databasen ska veta vilken kurs som ska uppdateras. 
* deleteCours - Tar bort en kurs från databasen, här behövs också ett ID skickas med för att databsen ska veta vilken kurs som ska tas bort. ID:t skickas som en parameter i URL:n i fetch anropet. 
