<!--Kod skriven av Maria Halvarsson -->
<?php $page_title = "Artikel" ?>
<?php include("includes/head.php");?>
<?php include("includes/header.php");?>

<a href="index.php" class="back_btn"> &#8592; Tillbaka till startsidan</a>
<?php 
        $blog = new BlogPost();

        if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        
        foreach($blog->getOnePost($id) as $post){
        ?>
        <div class="article_box">
        <article class="single_article_container">
            <img class="article_img" src="photos/<?= $post['image_url']?>" alt="">
            <div class=article_text>
                <h2><?= $post['title']; ?></h2>
                <h3>Postat: <?= $post['time']; ?></h3>
                <p><?= $post['content']; ?></p>
            </div>
        </article>
        </div>
        <?php
        }
                  
    } ?>
    <?php include("includes/footer.php");?>  