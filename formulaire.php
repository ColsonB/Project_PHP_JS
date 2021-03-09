<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
        <link rel="icon" type="image/png" href="">
        <link rel='stylesheet' type='text/css' href='src/css/page.css'>
        <link rel='stylesheet' type='text/css' href='src/css/formulaire.css'>
    </head>

    <body>
        <h1>Connexion</h1>
        <div class="form">
            <form action="connexion.php" method="post">
                <?php
                    if(isset($_SESSION['count'])){
                        if($_SESSION['count'] == 0){
                            ?><div class="erreur">Login ou mot de passe invalide</div><?php
                        }
                    }
                ?>
                <div class="login">
                    <input type="text" id="login" name="log" placeholder="Votre login" autocomplete="off" autocapitalize="off" required></input>
                </div>
                <div class="password">
                    <input type="password" id="mdp" name="pass" placeholder="Votre mot de passe" autocomplete="off" autocapitalize="off" required></input>
                </div>
                <div class="submit">
                    <input type="submit" class="connexion" value="Connexion"></input>
                </div>
            </form>
            <div class="inscription">
                <p>Si vous n'avez pas encore de compte inscrivez-vous</p>
                <a href="inscription.php">
                    <button>Inscription</button>
                </a>
            </div>
        </div>
    </body>
</html>