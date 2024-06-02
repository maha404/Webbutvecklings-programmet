<!--Kod skriven av Maria Halvarsson -->
<?php $page_title = "Registrera" ?>
<?php include("includes/head.php") ?>
 <?php
        $confirm_user = '';
        
        if(isset($_POST['email_reg'])){
            $email = $_POST['email_reg'];
            $name = $_POST['name_reg'];
            $password = $_POST['password_reg'];
            
            $user = new User();
            if(strlen($name) > 0 && strlen($email) > 0 && strlen($password) > 0){
                $confirm_user = "<p class='confirm_msg'>Du är nu registrerad!</p>";
            }

           if($user->setEmail() == false && strlen($email) > 0){
                $confirm_user = "Mejladressen finns redan, prova att logga in";
            }

            if($user->saveUser($email, $name, $password)){
                
            } 
        } 
        
        ?>
<body class="user_background">
    <main class="user_container">

        <a href="index.php" class="back_btn"> &#8592; Tillbaka till startsidan</a>

        <h2 class="user_title">REGISTRERA DIG</h2>
        <p class="link">Är du  redan registrerad? Logga in <a href="login.php">här</a></p>
        <form action="register.php" method="POST" class="login" >
                    <?php 
                        $user = new User();

                        echo $confirm_user;
                        if(isset($_POST['email_reg'])){
                            $email = $_POST['email_reg'];
                            
                        if(strlen($email) == null){
                           echo "<p class='error_msg'>Vänligen ange email!</p>";
                        } else {
                            $user->setEmail($email);
                        }
                        
                    }
                        
                    ?>
                <label for="email_reg">Mejladress*</label>
            <br>
            <br>
                <input type="text" name="email_reg" id="email_reg">
            <br>
            <br>
                    <?php 
                        $user = new User();
                        if(isset($_POST['name_reg'])){
                            $name = $_POST['name_reg'];

                            if(!$user->setName($name)){
                                echo "<p class='error_msg'>Vänligen ange ett namn!</p>";
                            }
                        }
                        
                    ?>
                <label for="name_reg">Ditt namn*</label>
            <br>
            <br>
                <input type="text" name="name_reg" id="name_reg">
            <br>
            <br>
                    <?php 
                        $user = new User();
                        if(isset($_POST['password_reg'])){
                            $password = $_POST['password_reg'];

                            if(!$user->setPassword($password)){ // Kollar om lösenordsfältet inte är satt.
                                echo "<p class='error_msg'>Vänligen ange ett lösenord!</p>";
                            } else { 
                                if(strlen($_POST['password_reg']) < 8) { // Om löenordsfältet är satt så kollas längden på lösenordet. 
                                    echo "<p class='error_msg'> Lösenordet måste vara mins 8 tecken!</p>";
                                }
                            }
                        }
                    ?>
                <label for="password_reg" class="label_title">Lösenord*</label> 
                    
            <br>
            <br>
                <input type="password" name = "password_reg" id="password_reg">
            <br>
            <br>
            <input type="checkbox" id="show_pass" onclick="myFunction()">
            <label for="show_pass">Visa lösenord</label>
            <br>
            <input type="submit" class="reg_btn" value="Registera">
        </form>
        
    </main>
    <script src="js/script.js"></script>
<?php include("includes/footer.php"); ?>
