<?php ob_start(); ?>
<?php session_start(); if (isset($_SESSION['login']) && !empty($_SESSION['login'])): ?>
  <!-- Vérification des identifiants -->
      <p>Welcome <?= $_SESSION['login'] ?>.</p>
      <p><a href="?clear=logout" >Disconnect</a> / <a href="?clear=unregister">Unregister</a></p>
<?php else: ?>
    <p>Wrongs identifier</p>
    <?php header("Location: index.php"); ?>
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