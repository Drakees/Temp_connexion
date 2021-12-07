<?php 
//connexion à la Database
require 'ressources/database.php';

//controllers & initialisations des classes
require 'controller/sql.class.php';
$tb= new sqlRequest();
// $tb->createDB();
$tb->createTable();
require 'controller/user.class.php';
$user = new Utilisateur();

//views
require 'views/template.php';




//var_dump($_GET);
//var_dump($_POST);
//var_dump($_SESSION);

