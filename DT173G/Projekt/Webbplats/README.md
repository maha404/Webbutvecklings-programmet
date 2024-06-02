## Projekt - Publikwebbplats

Denna webbplats är byggd med hjälp av GULP, för att kunna köra detta lokalt på din egna dator behöver du göra följande: 
* Klona repot genom att skriva 'git clone' och denna url: https://github.com/Webbutvecklings-programmet/projekt_publikwebbplats_vt23-maha404.git . 
* Skriv sedan in i terminalen 'npm install' . Detta laddar ner alla de npm paket som finns. 
* Sedan är det bara att skriva 'gulp' i terminalen för att köra. 
* När detta körs så skapas en mapp som heter 'pub', här kommer alla publiceringsfiler att finnas. 

I main.js filen så finns funktioner för att läsa ut menyerna till webbplatsen. Denn finns också funktioner för att boka takeaway. Nedan finns de olika funktionerna och en kort beskrivning:

* getMenuWeek - Hämtar veckomenyerna beroende på vilken vecka det är just nu. 
* writeMenu - Skriver ut veckomenyerna till webbplatsen, både till lunchmeny undersidan och takeaway undersidan. 
* menyOption - Är till för att kunna ändra färg på 'välj' knappen på takeaway undersidan och hämta in det myvalet för att sedan skicka datan vidare till 'option' funktionen. 
* option - Tar informationen som användaren skrivit in och skickar det vidare och sparar det i en databas.
