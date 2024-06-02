## Admin-gränsnitt

För att använda admingränsnittet så behöver du först logga in. Efter att du har loggat in så kommer du till ett formulär då du kan fylla i de olika uppgifterna för att lägga till olika menyer till databasen. 

Följande saker kan göras i gränssnittet: 
* Lägg till en veckomeny
* Ta bort en veckomeny
* Ta bort enskilda dagar
* Uppdatera/ändra de enskilda dagarna

Här finns alla de funktioner och en kort beskrivning: 

### Main.js

* getMenus - Hämtar alla menyer som finns i databasen.
* writeMenu - Skriver ut alla veckomenyer i en lista med knappar. 
* changeMenu - Vid klick på knappen "ändra" så hämtas alla dagar (mån-fre) som ingår i den veckan. 
* addMenyItem - Lägger till en dag/meny. 
* updateMenu - Uppdaterar eller ändrar en dag. 
* writeDays - Skriver ut de enskilda dagarna i en lista med knappar. 
* deleteDay - Tar bort en enskild dag vid klick på "radera" knappen. 
* deleteWeek - Tar bort hela veckan. 
* reload - Laddar om sidan. 
* errorMessage - Innehåller alla felmedellanden till formuläret. 

### User.js
* getApiKey - Hämtar api nyckeln. 
* login - Loggar in användaren. 
* error - Inehåller felmeddelanden för inloggnings formuläret. 
