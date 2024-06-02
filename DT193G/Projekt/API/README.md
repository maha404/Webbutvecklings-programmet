# API med Laravel

## Översikt
Detta repo är till för att kunna lägga till, ta bort, ändra och hämta produkter som finns i en databas, det går även att hämta in, ta bort, ändra och lägga till alla produkters kategorier. Api:t har även funktionalitet som möjliggör för användaren att registrera et användarkonto för att sedan kunna logga in och göra ovan anrop. 

## Databasen
Detta API består av tre tabeller, en tabell som behandlar alla produkter, en annan tabell som har alla produkters kategorier och en tabell för anändarna där all data om inloggningsuppgifter finns. 

### Products
Denna tabell består av åtta kolumner, dessa kolumner innehåller följande:
* Id (Primärnyckel)
* Category_id (Kategorins id, främmande nyckel)
* Product_type (Produkttypen)
* Product_description (Produktbeskrivning)
* Quantity (Antal)
* Created_at (När produkten lades till i databasen)
* Updated_at (När produkten uppdaterades i databasen)

### Categories
Denna tabell innehåller endast fyra kolumner, dessa kolumner innehåller följande:
* Id (Primärnyckel)
* Category_name (Namnet på kategorin)
* Created_at (När kategorin lades till i databasen)
* Updated_at (När kategorin uppdaterades i databasen)

### Users
Denna tabell innehåller sju kolumner, dessa kolumner innehåller följande:
* Id (Primärnyckel)
* Username (Användarnamn)
* Email (Mejladress)
* Password (Lösenord)
* Remember_token (Token för inloggning)
* Created_at (När kontot/användaren lades till i databasen)
* Updated_at (När kontot/användaren uppdaterades i databasen)

### Förhållanden
I denna databas så finns det ett förhållande mellan tabellerna 'Products' och 'Categories'. I tabellen 'Products' så finns det en främmandenyckel som heter 'Category_id' som pekar mot tabellen 'categories' och vilken kategori som tillhör det id:t. 

## Endpoint definitioner
### Produkter/Product
| Endpoint                     | Beskrivning         |
| ------------------------     | ------------------- |
| (GET) api/product            | Hämtar alla produkter och dess kategori |
| (POST) api/product           | Lägger till en ny produkt i databasen |
| (PUT) api/product/{id}       | Uppdaterar en produkt i databasen med hjälp av id |
| (DELETE) api/product/{id}    | Tar bort en produkt i databasen med hjälp av id |
| (GET) api/product/{search}   | Söker igenom databasen med hjälp av en sökterm |

### Kategorier/Category
| Endpoint                     | Beskrivning         |
| ------------------------     | ------------------- |
| (GET) api/category           | Hämtar alla kategorier som finns i databasen |
| (POST) api/category          | Lägger till en ny kategori i databasen |
| (PUT) api/category/{id}      | Uppdaterar en kategori i databasen med hjälp av id |
| (DELETE) api/category{id}    | Tar bort en kategori i databasen med hjälp av id |

### Användare/Login, logout, register
| Endpoint                     | Beskrivning         |
| ------------------------     | ------------------- |
| (POST) api/register          | Registerar en anväbndare och lagrar i databasen |
| (POST) api/login             | Loggar in en användare genom att kolla om användaren finns i databasen |
| (POST) api/logout            | Loggar ut en användare |


## HTTP-Statuskoder

| HTTP-statuskod    | Beskrivning    |
| ----------------- | -------------- |
| 200 - OK          | Begäran lyckades. |
| 201 - CREATED     | Begäran var lyckad och en ny resurs skapades.|
| 204 - NO CONTENT  | Det finns inget innehåll i denna begäran. |
| 401 - Unauthorized | Klienten behöver autentisera sig själv för att kunna få anropet. |
| 404 - Not found | Servern kan inte hitta den begärda resursen. |
| 422 - Unprocessable content | Begäran var välformulerad med kunde inte följas på grund av semantiska fel. |

