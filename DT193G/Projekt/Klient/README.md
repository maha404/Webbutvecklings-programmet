## Klient applikation med Vue
Detta repo är skapat som en del i projekt för kursen DT193G. 

I detta repo finns en klient applikation vars frontend är skapad med hjälp av ramverket Vue. 

---

### Views i klient applikationen
I denna lösning så finns det fem olika views: 

* Appview - Visar ett formulär där man kan fylla i och lägga till en ny produkt. 
* CatagoryView - Som visar alla kategorier listade från databasen i en tabell och ett formulär för att kunna lägga till en ny kategori.
* LoginView - Visar inloggningssidan i form av ett inloggningsformulär.
* ProductView - Visar alla produkter listade i en tabell som finns i databasen och det går att radera och uppdatera en produkt från tabellen.
* RegisterView - Visar registreringssidan som består av ett formulär där man kan fylla i alla uppgifter som behövs för att skapa en användare.

---

### Komponenter i klient applikationen
Följande komponenter finns med: 

* CategoryForm - Är ett formulär för att kunna lägga till en kategori
* CategoryTable - Är en tabell för att visa/hantera kategorierna
* ErrorMessages - Är en lista med error meddelanden som dyker upp vid registrering
* Modal - Går att ändra så att innehållet i modalen är olika beroende på användningsområde. 
* ProductForm - Är ett formulär för att kunna lägga till en produkt
* ProductTable - Är en tabell för att visa/hantera produkterna
* RegisterForm - Ett formulär för att kunna registrera en användare
* SideMeny - Sidomeny för alla views
* UpdateModal - Modal för att kunna uppdatera en produkt

---
### CSS-ramverk
I denna lösning har ett CSS-ramverk används för styling av klient applikationen. I detta fall är det [TailwindCSS](https://tailwindcss.com/) som har används. 
