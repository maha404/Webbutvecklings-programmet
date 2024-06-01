<?php

$site_title = "PHP";
$divider = " | ";

session_start(); //starta en session

error_reporting(-1);
ini_set("display_errors", 1);

//Autoinkludera klasser. 
spl_autoload_register(function($class_name) {
    include ("classes/" . $class_name . ".class.php"); 
});

?>