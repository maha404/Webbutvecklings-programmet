## Moment 5 - REST-webbtjänst med PHP - Webbplats

Denna uppgift gick ut på att skapa en webbplats som hanterar olika fetch anrop och behandlar datan frpn ett REST API. 

För att testköra klicka på följande länk: http://studenter.miun.se/~maha2216/dt173g/moment5/webbsida/index.html

Allt behandlas med hjälp av JavaScript i filen main.js. Den innehåller olika funktioner som hämtar, uppdaterar, raderar eller ändrar data i webbtjänsten. 

Här finns alla funktioner och en kort beskrivning:
* getCourses - Hämtar alla kurser med hjälp av ett fetch anrop. 
* writeCourses - Skriver ut kurserna till HTML med hjälp av DOM. 
* deleteCourses - Raderar kurser med hjälp av ett fetch anrop som använder "DELETE" som metod. 
* updateCourse - Updaterar en kurs genom att först endast hämta en kurs med ID med "GET" och sedan skrivs all information ut till formuläret, när användaren sedan klickar på knappen "uppdatera" så uppdateras den posten genom "PUT". 
* addCourse - Lägger till en kurs med hjälp av "POST" till webbtjänsten. 
* clearForm - Rensar formulärets fält. 
