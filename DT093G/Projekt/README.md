## Projekt - Bloggportal
I denna bloggportal kan du registrera dig, logga in, skapa inlägg med bilder och text, ta bort inlägg eller ändra inlägg. 

OBS!
För att lägga till en främmande nyckel på blog tabellen i databasen så skrivs följande efter att båda tabellerna är skapade:
ALTER TABLE blog ADD FOREIGN KEY (user_id) REFERENCES user(user_id);