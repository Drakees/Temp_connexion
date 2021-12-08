<?php ob_start(); ?>
<?php session_start(); if (isset($_SESSION['login']) && !empty($_SESSION['login'] && $_GET['login']===$_SESSION['login'] )): ?>
  <!-- Vérification des identifiants -->
      <p>Welcome <?= $_SESSION['login'] ?>.</p>
      <form id='editform' action="" method="post">
          <legend for="editform">Options:</legend><br>
          <label for="newName">New name</label></br>
            <input type='text' name='newName' id='newName' pattern="^[A-Za-z '-]+$" maxlength="15"><br>
          <label for='newPass'>Choose a new password :<br> (at least 6 chars, 1 number and 1 Capital letter)</label></br>
            <input type='password' name='newPass' id='newPass' pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{6,}$"><br>
          <input type='submit' value='send'>
      </form>

<?php 

    try{
        if(!empty($_POST['newName']) || !empty($_POST['newPass'])){//ajouter regex+filtres ici
            $update =array();
            switch ($_POST['newName']) {
                case empty($_POST['newName'] || $_POST['newName']===''):
                    $update['name']=$_SESSION['login'];
                    break;
                case !empty($_POST['newName']):
                    $update['name']=$_POST['newName'];
                    break;
            }
            switch ($_POST['newPass']) {
                case empty($_POST['newPass'] || $_POST['newPass']===''):
                    $update['pass']=$tb->getPass($_SESSION['login']);
                    break;
                case !empty($_POST['newPass']):
                    $update['pass']=$_POST['newPass'];
                    break;
            }
            $tb->updateValues($_SESSION['userId'],$update['name'],$update['pass']);
        }
    }
    catch(PDOException $e){
        // Gestions d'erreurs
        if ($e->getMessage() === "SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicata du champ '".$_POST['name']."' pour la clef 'user'"){
            echo "ID already in use ";
        }
        else {
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
        }
    }

?>


      <p><a href="?clear=logout" >Disconnect</a> / <a href="?clear=unregister">Unregister</a></p>
<?php else: ?>
    <p>Wrongs identifier</p>
    <?php header("Location: ?clear=logout"); ?>
<?php endif ?>

<?php 
if(isset($_GET['clear']) && $_GET['clear'] === 'logout' ) {
    require_once './ressources/logout.php'; //Destruction de session pour bloquer l'acces par URL copié et forcer au login
}
elseif (isset($_GET['clear']) && $_GET['clear'] === 'unregister' ) {
    $_SESSION['login']=$user->deleteValue($_SESSION['login']);
    require_once './ressources/logout.php';
}
 ?>
<?php $home = ob_get_clean(); ?>