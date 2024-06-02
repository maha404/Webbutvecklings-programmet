<!--Kod skriven av Maria Halvarsson -->
<?php

// Sidtitel
$site_title = "Bloggportalen";
$divider = " | ";

// Starta en session
session_start();

// Autoinkludera klasser
spl_autoload_register(function($class_name) {
    include("classes/" . $class_name . ".class.php");
}); 
    
?>