<!--Kod skriven av Maria Halvarsson -->
<?php $page_title = "Startsida" ?>
<?php include("includes/head.php");?>
<?php include("includes/header.php");?>

<?php 
    $blog = new BlogPost(); 
    $array = $blog->getAllPost(); // Hämtar de 5 senaste inläggen som finns i databasen. 
    $lastItem = $array[array_key_first($array)]; // Tar det senaste inlägget i arrayen. 
    $partof = substr($lastItem['content'], 0, 500);
?>

<div class="top_container" >
<article class="top_article">

    <img class="top_img" src="photos/<?= $lastItem['image_url']?>" alt="">

    <div class="top_article_background">
        <h2><?= $lastItem['title'] ?></h2>
        <h3><?= $lastItem['time'] ?></h3>
        <p>Av: <?= $lastItem['name']?></p>
        <p><?= $partof?>...</p>
        <a href='article.php?id=<?= $lastItem['post_id']; ?>'>Läs mer &#8594; </a>
    </div>
    
</article>
</div>

<div class="home_container">
<?php
    $blog = new BlogPost(); 

    $array = array_slice($blog->getAllPost(), 1); // Hämtar endast från första array index till sista. 

     foreach($array as $post) { // Skriver ut 4 poster. 
        $partof = substr($post['content'], 0, 500);
        ?> 
        <article class="post_article">
            <img class="post_img" src="photos/<?= $post['image_url']?>" alt="">
            <div class="post_background">
                <h2><?= $post['title']; ?></h2>
                <h3><?= $post['time']; ?></h3>
                <p>Av: <?= $post['name']; ?></p>
                <p><?= $partof; ?>... </p>
                <a href='article.php?id=<?= $post['post_id']; ?>'>Läs mer &#8594; </a>
            </div>
        </article> 
    
        <?php
        }
    ?>
</div>

<!-- Lista för att skriva ut alla användare och länka till varje anändares skrivna inlägg -->
<div class="user_list" >
    <h2>Användare som bidragit med inlägg</h2>
    <p>Klicka på namnet för att komma till en översikt över personens alla inlägg.</p>
    <ul class="list">
    <?php 
        $user = new User(); 
       
        foreach($user->getAllUsers() as $user) {
        ?>
            <li class="list_item"><a href='userprofile.php?id=<?= $user['user_id']; ?>'> <?= $user['name']; ?></a></li>
        <?php
        }
    ?>
    </ul>
</div>
<?php include("includes/footer.php");?>