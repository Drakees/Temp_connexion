<?php 
    class Utilisateur extends sqlRequest{ 
        
        public function validator(){
            if (isset($_POST['name']) && isset($_POST['pass'])){
                //on lance une fonction de la classe SQL
                $this->insertValues($_POST['name'],$_POST['pass']);
            }
        }
        
        public function identifier() {
            //on lance une fonction de la classe SQL
            $this->lookValues($_POST['name'],$_POST['password']);
        }

        public function verificator($data) {
            //manipulation et mise en forme des informations entrées
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
?>