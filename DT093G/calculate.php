<?php 
    $page_title = "Formulär";
    $site_title = "Formulär";
    include("includes/header.php");
?>

<?php 

$lenght = $_POST['lenght']; 
$width = $_POST['width'];

$lenght = (int)$lenght;
$width = (int)$width;

$total = $lenght * $width;


echo "Längden $lenght och bredden $width ger en area på $total kvadratmeter";

?>
<br>
<br>
<a href="forum.php">Tillbaka till den föregående sidan</a>

<?php 
    include("includes/footer.php");
?>