## Projekt - Webservice

Denna webbservice är uppdelad i tre olika php filer som behandlar POST, GET, PUT och DELETE. 

### menuapi.php
Denna fil innehåller alla de funktioner som ska gå att göra mot menuapi, här går det att göra POST, GET, PUT och DELETE. 

Följande klasser finns i Menu.class.php filen som hör till detta API:
* __construct ()__ - Ansluter till databasen. 
* __getMenu__ - Hämtar alla menyer som finns lagrade i databasen. 
* __getWeekMenu ($week)__ - Hämtar endast de veckor med samma veckonummer, här behöver ett veckonummer skickas med som argument. 
* __getWeeks ()__ - Hämtar endast veckor från databasen. 
* __getMenuId ($id)__ - Hämtar endast en dag med ett ID, här behöver ett ID skickas som argument. 
* __setMenu (string $week, string $weekday, string $description, string $date) : bool__ - Sparar data till klassens properties, här kollas det så att textsträngarna inte är tomma och otillåtna tecken tas bort. 
* __setMenuAndId (string $id, string $week, string $weekday, string $description, string $date) : bool__ - Samma som oavn bara det att det även sparas med ett ID. 
* __saveMenu () : bool__ - Sparar den datan som finns i klassens properties till databasen. 
* __updateMenu()__ - Uppdaterar menyn i databasen. 
* __deleteMenu ($week)__ - Tar bort en hel veckomeny, denna tar emot veckonummer som argument och sedan tas alla dagar bort med den veckan. 
* __deleteDay ($id)__ - Tar endast bort en enskild dag genom att ta emot ett ID som argument som sedan används för att ta bort just den dagen från databasen. 


### ordersapi.php
Här går det att använda sig av POST och GET. 

Följande klasser finns i Orders.class.php som hör till detta API:
* __construct ()__ - Ansluter till databasen
* __setOrder(string $name, string $phonenumber, string $description) : bool__ - Sparar datan till klassens properties och kollar om så att tesxtsrängarna inte ät tomma och att inga skadliga tecken skulle finnas med. 
* __saveOrder ()__ - Sparar datan till databasen. 

### userapi.php
Här går det att använda GET och POST. 

Följande klasser finns i User.class.php som hör till detta API:
* __construct ()__ - Ansluter till databasen. 
* __setUser (string $username, string $password, string $api_key) : bool__ - Sparar användarens uppgifter i klassens properties. 
* __logIn (string $username, string $password, string $api_key) : bool__ - Loggar in användaren genom att kolla om de uppgifter som skrivits in finns i databasen. 
* __getUser ()__ - Hämtar api nyckeln som behövs för inloggning. 





