<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="ressources/style.css">
</head>
<body>
    <header>
        <!-- Ajouter une view header au besoins  -->
    </header>
    <main>
        <?php 
            // On choisis quoi afficher 
            if(isset($_GET['action'])&& !empty($_GET) && $_GET['action'] === 'newUser'):
                require 'views/register.php';
                echo $register;
            elseif(!empty($_GET) && isset($_GET['login']) || isset($_GET['clear'])): 
                require 'views/home.php';
                echo $home;
            else:
                require 'views/connection.php';
                echo $connection; 
            endif; ?>
    </main>
    <footer>
            <!-- Ajouter une view footer au besoins  -->
    </footer>
</body>
</html>