<!--Kod skriven av Maria Halvarsson -->
<?php $page_title = "Din sida" ?>
<?php include("includes/head.php");

$user = new User();

$user->adminPage();

if(isset($_POST['email_login'])) {
    $email = $_POST['email_login'];
    $name = $_POST['name_login'];
    $password = $_POST['password_login'];

    $user = new User();

    if($user->logIn($email, $name, $password)) {
        echo "lyckades";
    } else {
        echo "fail";
    }
}

include("includes/header.php");

$blog = new BlogPost();

$error_message_content = '';
$error_message_title = '';
$error_photo = "";

if($_POST['title'] === '' || $_POST['content'] === ''){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $photo = $_FILES['file']['name'];

    if(!$blog->setTitle($title)){
        
        $error_message_title = "<p class='error_msg'>Du måste ange en titel!</p>";
    } 

    if(!$blog->setPost($content)){
        
        $error_message_content = "<p class='error_msg'>Du måste ange en text!</p>";

    } 

    if(!isset($photo) === '') {
        $error_photo = "<p class='error_msg'> Du måste ladda upp en bild!</p>";
    } else {
        $blog->savePost();
        //header("Location: user.php");
    }
}

    // För att kunna spara användarens namn till databasen. 
    $_SESSION['name'] = $user->getName()[0]['name'];
    $_SESSION['user_id'] = $user->getName()[0]['user_id'];
    
$error_filesize = '';
$error_filename = '';
$error_fileformat = '';

if(isset($_FILES['file'])) {
    $filepath = "photos/" . $_FILES["file"]["name"]; // Sökvägen till mappen och filnamet på den uppladdade filen sparas i en variabel. 
    $allowed_types = 'image/jpeg'; //Sparar de tillåtna filformaten i en variabel. 
    
    $basename = pathinfo($filepath, PATHINFO_FILENAME);
    $extension = pathinfo($filepath, PATHINFO_EXTENSION);

    if($_FILES['file']['size'] > 2000000){ // Kollar om filen som laddats upp är större än 2mb. 
        $error_filesize = "<p class='error_msg'> Filstorleken får inte vara mer än 2MB stor.</p>"; // Om filen är för stor skrivs ett felmeddelande ut. 
    } else {
        if($_FILES['file']['type'] === $allowed_types) { // Villkor som kollar om filen som laddats upp stämmer överäns med tillåtna filformat.
        
            if(file_exists($filepath)) { // Kollar om filnamet redan finns i mappen. 
                $error_filename = "<p class='error_msg'> Filnamet finns redan, vänligen döp om filen!</p>"; // Om filen finns så skrivs ett felmeddelande ut. 
            } else {
                //echo "bilden laddades upp!";
                move_uploaded_file($_FILES["file"]["tmp_name"], $filepath); // Om filnamet inte finns så sparas bilden i mapppen. 
            }

        } else {
            $error_fileformat = "<p class='error_msg'>Bilden måste vara i formatet JPEG. </p>"; // Om filstorlek stämmer men inte format så sparas inte bilden och ett felmeddelande skrivs ut. 
        }
        
    }

} 

?>

<div class="diagonal">
        <div class="wrapper">

            <p class="welcome_msg">Välkommen <?= $_SESSION['name']?>!</p>
        
        </div>
</div>

<div class="container">

<h2 class="write_title">Skriv inlägg</h2>
<form action="user.php" method="POST" class="blog_form" enctype="multipart/form-data">

    <?php echo $error_message_title; ?>
    <label for="title" class="title_label" >Titel:</label>
    <br>
    <input type="text" name="title" id="title">
    <br>
    <br>
    <?php echo $error_message_content; ?>
    <label for="content">Text:</label>
    <br>
    <textarea name="content" id="content"></textarea>
    <br>
    <br>
    <?php 
    echo $error_photo;
    echo $error_filesize;
    echo $error_fileformat;
    echo $error_filename;
    ?>
    <label for="file">Ladda upp bild:</label>
    <br>
    <input type="file" name="file" id="file" >
    <br>
    <br>
    <input type="submit" value = "Posta" id="post_btn">

</form>
</div>
<h2 class="post_title">Dina inlägg</h2>
<div class="flex_container">

<?php

    if(isset($_GET['delete'])) {
        $deleteid = intval($_GET['delete']);
        $blog = new BlogPost();

        if($blog->deletePost($deleteid)) {
            
        }
    }
?>

<?php
     $blog = new BlogPost();
     
     foreach($blog->getPost() as $post) {
        
        $partof = substr($post['content'], 0, 500);
        ?> 
        <article class="user_post">
            <h3><?= $post['title']; ?></h3>
            <p>Postat: <?= $post['time']; ?></p>
            <p>Av: <?= $post['name'] ?></p>
            <img src="photos/<?= $post['image_url']?>" alt="" width=100 height=40>
            <p><?= $partof; ?></p>
            <a class="readmore-btn" href='article.php?id=<?=$post['post_id']; ?>'>Läs mer</a> 
            <br>
            <br>
            <a class="delete-btn" href='user.php?delete=<?= $post['post_id']; ?>'>Ta bort</a>
            <a class="edit-btn" href='edit.php?edit=<?= $post['post_id']?>'>Ändra</a>

        </article>
        
    <?php
        }
    ?>
</div>
<?php include("includes/footer.php"); ?>