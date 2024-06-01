<?php include("includes/config.php");?>

<?php 

    if(isset($_POST['username_login'])) {
        $username = $_POST['username_login'];
        $password = $_POST['password_login'];

        $user = new User();

        if($user->logIn($username, $password)){
            echo "inloggad";
        } else {
            echo "felaktigt användarnam eller lösenord";
        }
    }

    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = new User();

        if($user->setUser($username, $password)){
            echo "användare registrerad";
        } else {
            echo "användare inte registrerad";
        }
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Inlogg</title>
</head>
<?php include("header.php"); ?>
<body>


<h1 class="login_title" >Registrera dig</h1>   
<form action="login.php" method="POST" class="login">
<label for="username">Användarnamn:</label>
<br>
<input type="text" name="username" id= "username">
<br>
<br>
<label for="password">Lösenord:</label>
<br>
<input type="password" name="password" id="password">
<br>
<br>
<input type="submit" class="login_btn" value="Registrera" >
</form>
<br>
<br>


<h1 class="login_title">Logga in</h1>
<form action="admin.php" method="POST" class="login">
<label for="username_login">Användarnamn:</label>
<br>
<input type="text" name="username_login" id= "username_login">
<br>
<br>
<label for="password_login">Lösenord:</label>
<br>
<input type="password" name="password_login" id="password_login">
<br>
<br>
<input type="submit" class="login_btn" value="Logga in" >

</form>

</body>
</html>