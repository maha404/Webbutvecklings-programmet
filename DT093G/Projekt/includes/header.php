<!--Kod skriven av Maria Halvarsson -->
<?php 
    // Kollar om användaren är inloggad, om så är fallet visas en annan header. 
    if(isset($_SESSION['email_login'])){
    
    ?>
        <body>
    <header class="top_header">
        <h1 ><a href="index.php" class="top_title">Bloggportalen</a></h1>
        <nav class="main_nav">
            <ul>
                <li><a href="logout.php" id="login_btn">Logga ut</a></li>
                <li><a href="user.php" id="reg_btn">Inloggad som: <?= $_SESSION['email_login'] ?></a></li>
                <li><a href="index.php" id="start_btn">Startsidan</a></li>
            </ul>
        </nav>
    </header>
    <!-- Mobil meny när användaren är inloggad -->
    <nav class="mobile_menu">
        <a href="index.php" class="mobile_logo">Bloggportalen</a>
        <i class="fa-solid fa-bars" id="menu_icon"></i>
            <ul class="mobile_menu_links" id="links">
                <li><a href="index.php">Startsidan</a></li>
                <li><a href="user.php">Mina sidor</a></li>
                <li><a href="logout.php">Logga ut</a></li>
            </ul>
    </nav>
    <script>
            let icon = document.getElementById('menu_icon');
            let list = document.getElementById('links');
            icon.addEventListener("click", function(){

                if(list.style.display === "block"){
                    list.style.display = "none";
                } else {
                    list.style.display = "block";
                }
            });

        </script>
    <?php
    //Om användaren inte är inloggad så visas en header med registrera och logga in knappar.
    } else {
        ?>
        <body>
            <header class="top_header">
                <h1><a href="index.php" class="top_title">Bloggportalen</a></h1>
                <nav class="main_nav">
                    <ul>
                        <li><a href="login.php" id="login_btn">Logga in</a></li>
                        <li><a href="register.php" id="reg_btn">Registrera</a></li>
                        <li><a href="index.php" id="start_btn">Startsidan</a></li>
                    </ul>
                </nav>
            </header>
            
    <!-- Mobil meny när användaren inte är inloggad -->
    <nav class="mobile_menu">
        <a href="index.php" class="mobile_logo">Bloggportalen</a>
        <i class="fa-solid fa-bars" id="menu_icon"></i>
            <ul class="mobile_menu_links" id="links">
                <li><a href="index.php">Startsidan</a></li>
                <li><a href="login.php">Logga in</a></li>
                <li><a href="register.php">Registrera</a></li>
            </ul>
    </nav>
        <script>
            let icon = document.getElementById('menu_icon');
            let list = document.getElementById('links');
            icon.addEventListener("click", function(){

                if(list.style.display === "block"){
                    list.style.display = "none";
                } else {
                    list.style.display = "block";
                }
            });

        </script>
    <?php
    }
?>