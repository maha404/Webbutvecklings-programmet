<!--Kod skriven av Maria Halvarsson -->
<?php $page_title = 'Ändra' ?>
<?php include("includes/head.php"); ?>
<?php include("includes/header.php"); ?>

<?php 

$blog = new BlogPost();

    if(isset($_GET['edit'])) {
        $id = intval($_GET['edit']);

        $details = $blog->getOnePost($id);

        $error_message_content = '';
        $error_message_title = '';

        $message = '';

    } else {
        header('Location: user.php');
    }

    if(isset($_POST['title'])){
        $title = $_POST['title'];
        $content = $_POST['content'];

        $success = true;
    
        if(!$blog->setTitle($title)){
            $success = false;
         $error_message_title = "<p class='error_msg'> Du måste ange en titel! </p>";
        } 
    
        if(!$blog->setPost($content)){
            $success = false;
            $error_message_content = "<p class='error_msg'> Du måste ange en text! </p>";
        } 
        
        if($success) {
            if($blog->changePost($id, $title, $content)) {
                header("Refresh:0");
            }
        }
    }
?>

<div class="container">
<h2 class="write_title">Ändra <?= $details[0]['title']; ?></h2>

<form action="edit.php?edit=<?= $details[0]['post_id']?>" method="POST" class="blog_form" enctype="multipart/form-data">
    <a href="user.php">&#8592; Tillbaka till användarsidan</a>
    <p>OBS! Bilder går tyvärr inte att ändra!</p>
    <?php echo $message; ?>
    <br>
    <?php echo $error_message_title; ?>
    <label for="title" class="title_label" >Titel:</label>
    <br>
    <input type="text" name="title" id="title" value="<?= $details[0]['title']; ?>">
    <br>
    <br>
    <?php echo $error_message_content; ?>
    <label for="content">Text:</label>
    <br>
    <textarea name="content" id="content"><?= $details[0]['content']; ?></textarea>
    <br>
    <br>
    <input type="submit" value = "Uppdatera" id="post_btn">
    <br>
    
</form>
</div>

<?php include("includes/footer.php"); ?>