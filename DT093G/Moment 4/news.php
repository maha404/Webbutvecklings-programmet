<!-- Visar nyhetssidan med alla nyheter som finns postade på webbplatsen/databasen -->
<?php include("includes/config.php");?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Startsida</title>
</head>
<body>
<?php include("header.php"); ?>
<main class="home-main">
    <h2>ALLA NYHETER</h2>
    <?php
    $blog = new BlogPost(); 

     foreach($blog->getPost() as $post) {
        $partof = substr($post['content'], 0, 500);
        ?> 
        <article>
            <h2><?= $post['title']; ?></h2>
            <h3><?= $post['time']; ?></h3>
            <p><?= $partof; ?>...</p>
            <a href='article.php?id=<?=$post['id']; ?>'>Läs mer</a>
            <hr>
            <br>
        </article>
        <?php
        }
    ?>
</main>
</body>
</html>