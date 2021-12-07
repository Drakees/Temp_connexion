<?php ob_start(); ?>
<h1>Register</h1>

<form action='' method='post'>
            <label for='name'>ID : </label></br>
            <input type='text' name='name' id='name' required pattern="^[A-Za-z '-]+$" maxlength="15"><br>
            <label for='pass'>Choose a password :<br> (at least 6 chars, 1 number and 1 Capital letter)</label></br>
            <input type='password' name='pass' id='pass' required pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{6,}$"><br>
            <input type='submit' value='send'>
        </form>
        <?php
            
            try{
                // Vérification des données reçues (regex + filtres)
                if(!empty($_POST['name'])  && !empty($_POST['pass'])){
                    $_POST['name']=$user->verificator($_POST['name']);
                    $_POST['pass']=$user->verificator($_POST['pass']);
                    if (strlen($_POST['name']) <= 15 && preg_match("/^[A-Za-z '-]+$/",$_POST['name']) 
                         && preg_match("/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{6,}$/",$_POST['pass'])){
                        // Stockage des données (base de données)
                        $user->validator() ;
                    }
                    else{
                        header("Location:index.php?action=newUser");
                    }
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
<p><a href="index.php" >Return to login </a></p>
<?php $register = ob_get_clean(); ?>