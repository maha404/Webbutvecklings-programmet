<?php 
    $page_title = "Textfil";
    $site_title = "Textfil";
    include("includes/header.php");
?>

<h3>Lösning på moment 2 - Extern textfil</h3>

<?php

// Kollar om filen finns och skriver ut felmeddelande om filen inte finns.
$file = 'includes/courses.txt';

if (!is_readable($file)){

    echo "Filen kunde inte hittas";
}

$courses = file('includes/courses.txt'); // Lagrar textfilens innehåll i en array. 

// Skriver ut arrayen.
foreach($courses as $course){ 
    echo "<ul><li>" . $course . "</li></ul>";
}

?>

<?php 
    include("includes/footer.php");
?>