<!-- Enskilda nyheter -->
<?php include("includes/config.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
<?php include("header.php"); ?>
<main class="home-main">
        <?php 
        $blog = new BlogPost();

        if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        
        foreach($blog->getOnePost($id) as $post){
        ?>
        <article>
            <h2><?= $post['title']; ?></h2>
            <h3>Postat: <?= $post['time']; ?></h3>
            <p><?= $post['content']; ?></p>
        </article>
        <?php
        }
                
        } ?>
</main>

</body>
</html>