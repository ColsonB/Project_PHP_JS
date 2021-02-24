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
        <title></title>
        <link rel="icon" type="image/png" href="">
        <link rel='stylesheet' type='text/css' href='src/css/formulaire.css'>
    </head>

    <body>
        <section class="container">
            <div class="login">
                <form action="connexion.php" method="POST">
                    <?php
                        if(isset($_SESSION['count'])){
                            if($_SESSION['count'] == 0){
                                ?><div class="erreur">Login ou mot de passe invalide</div><?php
                            }
                        }
                    ?>
                    <input type="text" id="login" name="log" placeholder="Votre login" autocomplete="off" autocapitalize="off" required></input>
                    <input type="password" id="mdp" name="pass" placeholder="Votre mot de passe" autocomplete="off" autocapitalize="off" required></input>
                    <input type="submit" class="submit" value="Ouverture de session"></input>
                    <input type="button" class="submit" value="Inscription"></input>
                </form>
            </div>
        </section>
    </body>
</html>