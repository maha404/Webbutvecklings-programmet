<?php include("includes/config.php");?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Admin</title>
</head>
<body>

<?php include("header.php"); ?>

<main class="main-content">
    <h2>Admin sida</h2>

    <a class="logout-btn" href="logout.php">Logga ut</a>
    <br>
    <br>
    <br>
    <h2>Skriv nyheten nedan:</h2>

<?php  

if(!isset($_SESSION['username_login'])) {
        header("Location: login.php");
    }

if(isset($_GET['delete'])){
    $deleteid = intval($_GET['delete']);
    $blog = new BlogPost();

    if($blog->deletePost($deleteid)) {
        //echo "Post raderad";
    } else {
        echo "Radering misslyckades";
    }
}

if(isset($_POST['username_login'])) {
    $username = $_POST['username_login'];
    $password = $_POST['password_login'];

    $user = new User();

    if($user->logIn($username, $password)){
        header("Location: admin.php");
    } else {
        echo "felaktigt användarnam eller lösenord";
    }
}

$blog = new BlogPost();

    if(isset($_POST['title'])){
        $title = $_POST['title'];
        $content = $_POST['content'];



        if(!$blog->setTitle($title)){
            
            echo "<p class='error-msg'> Du måste ange en titel! </p>";
        } 

        if(!$blog->setPost($content)){
            
            echo "<p class='error-msg'> Du måste ange en text! </p>";
        } else {
            if(strlen($title) > 1){
                $blog->savePost();
            }
        }
    }

?>

    <form action="admin.php" method="POST">
        <label for="title">Titel:</label>
        <br>
        <input type="text" name="title" id="title">
        <br>
        <br>
        <label for="content">Skriv din text här:</label>
        <br>
        <textarea name="content" id="content"></textarea>
        <br>
        <input type="submit" value="Posta" id="admin-btn">

    </form> 

    <br>
    
    <?php
     $blog = new BlogPost();

     foreach($blog->getPost() as $post) {
        //var_dump($post['content']);
        $partof = substr($post['content'], 0, 500);
        ?> 
        <article>
            <h2><?= $post['title']; ?></h2>
            <p>Postat: <?= $post['time']; ?></p>
            <p><?= $partof; ?></p>
            <br>
            <a class="delete-btn" href='admin.php?delete=<?= $post['id']; ?>'>Radera</a>
            <a class="readmore-btn" href='article.php?id=<?=$post['id']; ?>'>Läs mer</a> 
            <br>
            <br>
            <hr>
        </article>
        
    <?php
        }
    ?>
</main>

</body>
</html>