<?php ob_start(); ?>
<h1>Connection</h1>
<p>Please login for access to the blog</p>

<form action="" method="post">
    <label for="ID">ID :</label>
    <input type="text"  id='ID' name='name' required maxlength="15"><br>
    <label for="pass">Pass :</label>
    <input type='password' id='pass' name='password' required > 
    <button type="submit">Login</button>
</form>

<?php 
    
    try{
        // Vérification des données reçues (regex + filtres)
        if(!empty($_POST['name'])  && !empty($_POST['password'])){
            $_POST['name']=$user->verificator($_POST['name']);
            $_POST['password']=$user->verificator($_POST['password']);
            if (strlen($_POST['name']) <= 15 && preg_match("/^[A-Za-z '-]+$/",$_POST['name']) 
                 && preg_match("/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{6,}$/",$_POST['password'])){
                // Stockage des données (base de données)
                $user->identifier();
            }
            else{
                header("Location:index.php");
            }
        }
        
    }      
    catch(PDOException $e){
        var_dump($e->getMessage());
        if ($e->getMessage() === "'SQLSTATE[42S22]: Column not found: 1054 Champ '".$_POST['name']."' inconnu dans where clause'"){
            echo "ID unknown";
        }
        else {
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
        }
    }
?>

<p><a href="index.php?action=newUser">New user ? Register here ! </a></p>
<?php $connection = ob_get_clean(); ?>