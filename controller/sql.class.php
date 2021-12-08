<?php

class sqlRequest extends database{
    
    public function createDB($database){
        $db = new PDO( 'mysql:host=localhost', 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // gestion des erreurs liées au fecth
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // gestion des exceptions
            ]);
        $sql = "CREATE DATABASE IF NOT EXISTS ".$database;
        $db->exec($sql);
        echo "Base de données ".$database." créée avec succès !";
    }
    
    public function createTable() {
        $db=$this->connexion(); //connexion via database.php
        $sql ="CREATE TABLE IF NOT EXISTS users(
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                user VARCHAR(30) NOT NULL UNIQUE ,
                pass VARCHAR(30) NOT NULL)";
        $create = $db->prepare($sql);
        $create->execute();
    }

    public function insertValues($user,$pass) {
        $db=$this->connexion();//connexion via database.php
        $sql = "INSERT INTO users(user,pass)
                VALUES('$user','$pass')";
        $insert=$db->prepare($sql);
        $insert->execute();
        echo `Entrée ajoutée dans la table`;
    }

    public function lookValues($user,$pass) {
        $db=$this->connexion();//connexion via database.php
        $sql = "SELECT * FROM users
                WHERE user='$user' AND pass='$pass'";
        $looker=$db->prepare($sql);
        $dataLogin=$looker->execute();
        $data=$looker->fetch(PDO::FETCH_ASSOC);
        //vérification de la présence des données dans la base de données    
        if (!empty($data['user']) && !empty($data['pass'])) {
            session_start();
            $_SESSION['login'] = $user;
            $_SESSION['userId']=$data['id'];
            header("Location:index.php?login=".$user);
        } 
        else {
            echo 'unknown user';
        }
    }

    public function getPass($user){
        $db=$this->connexion();//connexion via database.php
        $sql ="SELECT pass FROM users
                WHERE user='$user'";
        $getKey=$db->prepare($sql);
        $dataKey=$getKey->execute();
        $key=$getKey->fetch(PDO::FETCH_ASSOC);
        return $key['pass'];
        
    }

    public function updateValues($userID,$newName,$newPass) {
        $db=$this->connexion();//connexion via database.php
        $sql = "UPDATE users
                SET user='$newName',pass='$newPass'
                WHERE id='$userID'";
        $updater=$db->prepare($sql);
        $dataUpdate=$updater->execute();
        $_SESSION['login'] = $newName;
        header("Location:index.php?login=".$_SESSION['login']);
    }

    public function deleteValue($user) {
        $db=$this->connexion();//connexion via database.php
        $sql="DELETE FROM users WHERE user= '$user'";
        $query= $db->prepare($sql);
        $query->execute();
    }


}