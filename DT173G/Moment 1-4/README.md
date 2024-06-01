## Moment 1 - NodeJs och automatisering med Gulp
-- Repot är gjot av mig Maria Halvarsson -- 

Syftet med detta moment var att kunna automatisera uppgifter med NodeJs och förenkla utvecklingsarbetet av en webbplats. I detta moment så används Gulp för att kunna skapa detta men hjälp av olika tasks. 
 ****

:one:. Automatiseringens syfte är att kopiera över HTML, CSS, JavaScript och bildfiler till en annan mapp som heter pub som är den slutgiltliga webbplatsen som användaren ser. 

:two:. Paketen som har används är följande: 
* [Gulp-concat](https://www.npmjs.com/package/gulp-concat)
* [Gulp-cssnano](https://www.npmjs.com/package/gulp-cssnano)
* [Gulp-terser](https://www.npmjs.com/package/gulp-terser)
* [BrowserSync](https://browsersync.io/docs/gulp)

Jag har använt dessa paket eftersom de fungerar med det som jag vill göra med Gulp. 

:three:. För att starta programmet så skrivs "gulp" i terminalen eller kommandotolken på datorn. Sedan kommer följande tasks att köras parallelt(samtidigt):
* copyHTML
* copyCss
* copyJs
* copyPhotos

Sist körs tasksen browserSyncServer och watchTask. 

### copyHTML
Kollar först vart html filen finns någonstans, sedan lägs den i mappen 'pub'.

### copyCss
Kollar var css filen finns någonstans, sedan med concat så slås alla css filer som finns ihop till en enda fil som döps till 'index.css', koden minifieras sedan med 'cssnano' och till sist så läggs filen i mappen 'pub' i en mapp som heter 'css'.

### copyJs
Kollar vart js filen finns, slår sedan ihop alla js filer till en fil som döpts till 'main.js', denna fil minifieras sedan med jsterser(terser) och till sist skickas filen till mappen 'pub' i en mapp som heter 'js'.

### copyPhotos
Kollar vart mappen photos finns och alla filer som finns i den mappen flyttas till mappen 'pub'.

### browserSyncServer
Startar en server av 'pub' mappen som startar direkt när 'gulp' skrivs in i terminalen. Man behöver inte uppdatera webbläsarefönstret utan ändringarna sker så fort filerna är sparade i texteditorn. 

### watchTask 
Kollar om HTML, CSS, JS eller filerna i 'photo' mappen har ändrats eller uppdaterats. Andra argumnetet i denna funktion är de tasks som ska köras, så i detta fall så körs alla tasks ovan var för sig.  

:four:. Jag har inte tagit med något extra. 

***
## Moment 2 - CSS-preprocessorer och SASS
Syftet med detta moment var att inkludera preprocessorn SASS och styla en enklare webbplats. Den ska vara responsiv, ha tre stycken olika färger, 2 stycken bilder och en meny med 5 olika meny-alternativ. 
***
Jag valde att dela upp mina scss filer på följande sätt:

#### _components
Innehåller lite olika komponenter, knappar, menyer, artiklar.

#### _functions
Innehåller funktioner, i detta fall finns ett if villkor. 

#### _layout
Innehåller olika laypout element eller placering av elementen. (Inser här att det är bättre att istället skapa en mapp och sedan lägga in tex _footer, _header osv.)

#### _mixins
Innehåller några mixins. 

#### _reset
Innehåller vissa restets, tex att bodyns margin ska vara satt till 0. 

#### _typography
Innehåller allt som har med text att göra. 

#### _variables
Innehåller alla variabler, i detta fall så finns det variabler som innehåller de färger som ska finnas på webbplatsen. 

#### main
Här slåss alla filer ovan ihop som sedan skickas till pub mappen för publicering. 

### Ny funktion Har lagts till!
En ny task har lagts till i gulpfile.js, den heter convertScss. Den ser nästan likadan ut som titigare task copyCss. Det paketet som lagts till är gulp-sass som konventerar från SASS till CSS. 

****
## Moment 3 - Ecmascript
Syftet med moment två var att bli bekant med Ecmascript, i detta moment gjordes en liten testapp som skriver ut en lista på katter och dess ras men hjälp av arrayer, maps, if satster, foreach loop och arrow functions. 

****
Testappen består av en array som innehåller alla katters namn, sedan har element hämtas in för att kunna skriva ut listan till skärmen men även knappar för att kunna skriva ut listan och rensa listan. 

Efter detta har en map gjorts och sedan har raserna till de olika katterna satts. Foreach loopen skriver ut alla namn och repektive ras i separata li element. 

****
## Moment 4 - Typescript




