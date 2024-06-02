<!--Kod skriven av Maria Halvarsson -->
<?php $page_title = 'Användarprofil' ?>
<?php include("includes/head.php");?>
<?php include("includes/header.php");?>

<?php 
        $blog = new BlogPost();

        if(isset($_GET['id'])){
        $id = ($_GET['id']);
        
        $user = new User(); 
        
        ?>
        <h2 class="user_profile_title">Inlägg av: <?=$blog->getUserPosts($id)[0]['name'];?></h2>
        <?php
        foreach($blog->getUserPosts($id) as $post){
            $partof = substr($post['content'], 0, 500);
        ?>
        <div class="article_container">
            <article class="user_profile">
                <img class="user_profile_img"  src="photos/<?= $post['image_url']?>" alt="">
                <div class="user_profile_article" >
                    <h2><?= $post['title']; ?></h2>
                    <h3>Postat: <?= $post['time']; ?></h3>
                    <p>Postat av: <?= $post['name'] ?></p>
                    <p><?= $partof; ?></p>
                </div>
                <a class="readmore-btn" href='article.php?id=<?=$post['post_id']; ?>'>Läs mer &#8594;</a> 
            </article>
        </div>
        <?php
        }
                
    } ?>
<?php include("includes/footer.php"); ?>   