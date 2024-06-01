<?php
    class Todolist{

        //Properties
        private $todo;
        private $list = [];

        //Constructor
        function __construct() {

            $file = file_get_contents('list.json'); // Hämtar in JSON filen

            $this->list = json_decode($file, true); // Lagrar innehållet i JSON filen till list 

        }

        //Set metod
        function setList (string $todo) : bool {
            if(strlen($todo) > 4){
                if(!in_array($todo, $this->list)) {
                    $this->todo = $todo;
                    $this->saveData();

                    return true;
                }
            }
            return false;
        }

        //Spara listan i JSON fil
        function saveData() : bool {
            if(!strlen($_POST['text']) > 5) {

                return false;

            } else {

                array_push($this->list, $this->todo);

                $file = json_encode($this->list);
                file_put_contents('list.json', $file);

                return true;

            }
        }

        // Ta bort en punkt från listan
        function delete () {
            
            unset($this->list[$_GET['delete']]);
            $this->list = array_values($this->list);
            
            file_put_contents('list.json', json_encode($this->list));
        }

        //Ta bort hela listan
        function deleteAll () {

            array_splice($this->list, 0);

            file_put_contents('list.json', json_encode($this->list));
        }

        // Get metod för att skriva ut listan
        function getList () : array {

            return $this->list;

        }
    }
?>