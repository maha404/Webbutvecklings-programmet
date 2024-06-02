<!--Kod skriven av Maria Halvarsson -->
<?php $page_title = "Logga in" ?>
<?php include("includes/head.php") ?>

<body class="user_background">
    <main class="user_container">

        <a href="index.php" class="back_btn"> &#8592; Tillbaka till startsidan</a>

        <h2 class="user_title">LOGGA IN</h2>
        <p class="link">Är du inte registrerad? Registrera dig <a href="register.php">här</a></p>
        <form action="login.php" method="POST" class="login" >
           <?php 

                if(isset($_POST['email_login'])) {
                    $email = $_POST['email_login'];
                    $name = $_POST['name_login'];
                    $password = $_POST['password_login'];

                    $user = new User();

                    if($user->logIn($email, $name, $password)) {
                        
                    } else {
                        echo "<p class='error_msg'>Felaktig mejladress, namn eller lösenord</p>";
                    }
                }
        
            ?>
            <label for="email_login">Mejladress</label>
            <br>
            <br>
            <input type="text" name="email_login" id="email_login">
            <br>
            <br>
            <label for="name_login">Namn</label>
            <br>
            <br>
            <input type="text" name="name_login" id="name_login">
            <br>
            <br>
            <label for="password_login">Lösenord</label>
            <br>
            <br>
            <input type="password" name ="password_login" id="password_login">
            <br>
            <br>
            <input type="submit" class="login_btn" value="Logga in">
        </form>

    </main>
<?php include("includes/footer.php"); ?>