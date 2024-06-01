<?php 
    $page_title = "Att göra";
    $site_title = "Att göra";
    include("includes/header.php");
    include("includes/classes/todo.class.php");
?>

<h3>Att göra lista</h3>

<form action="todo.php" method="POST">
<label for="text">Vad vill du göra?</label>
<br>
<input type="text" name="text">

<!--Knapp-->
<input type="submit" value="Lägg till">
</form>



<ul class="todolist">

    <?php
        $item = new Todolist();

        if(isset($_GET['delete'])){
            $item->delete();
        }

        if(isset($_POST['text'])){
            $text = $_POST['text'];

            if(!$item->setList($text) == 5 ) {
                echo "Vänligen skriv in minst 5 tecken!";
            }
        }

        if(isset($_POST['delete'])){
            $item->deleteAll();
        }

        foreach($item->getList() as $index => $todo){
            echo "<li class='list_item'> $todo <a href='todo.php?delete=$index' class='btn' > Klar! </a></li>";
        }
    ?>


</ul>
<form action="todo.php" method="POST">
    <input type="submit" name="delete" value="Rensa">
</form>
<?php
    include("includes/footer.php");
?>