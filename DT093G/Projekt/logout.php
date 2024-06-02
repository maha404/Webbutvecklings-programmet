<!--Kod skriven av Maria Halvarsson -->
<?php
session_start();
session_destroy();

header("Location: login.php");
?>