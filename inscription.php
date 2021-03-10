<?php

    include('BDD.php');

    if(!empty($_POST)){ 
        extract($_POST);
        $valid = true;
        if(isset($_POST['inscription'])){ // On récupére les informations du formulaire
            $idPerso = $_POST['idPerso'];
            $pseudo = $_POST['pseudo'];
            $mdp = $_POST['mdp'];
            $confmdp = $_POST['confmdp'];

            $req = "INSERT INTO `utilisateur`(`idPerso`, `idCombatPerso`, `pseudo`, `mdp`, `point`, `victoire`, `defaite`) 
            VALUES ($idPerso, $idPerso, '$pseudo', '$mdp', 0, 0, 0)"; // On insére les informations du formulaire dans la BDD
            $requetStatement=$BDD->query($req);

            $req = "SELECT MAX(idUser) FROM utilisateur"; // Permet de récupérer l'id le plus grand
                $requetStatement=$BDD->query($req);                               
                while($Tab=$requetStatement->fetch()){
                        $id = $Tab[0];
                }
                $_FILES['imgprof']["name"] = "joueur".$id.".png"; // Permet de mettre une photo de profil par défaut
                $tmpName = "src/img/joueur/photo_de_profil.png";
                $Name = $_FILES['imgprof']['name'];
                $fileName = "src/img/joueur/" . $Name;
                copy($tmpName, $fileName);
                include('connexion.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inscription</title>
        <link rel="icon" type="image/png" href="src/img/icone.png">
        <link rel='stylesheet' type='text/css' href='src/css/page.css'>
        <link rel='stylesheet' type='text/css' href='src/css/inscription.css'>
    </head>

    <body>
        <h1>Inscription</h1>
        <div class="form">
            <form method="post">
                <div class="perso">
                    <input type="text" id="pseudo" name="pseudo" placeholder="Votre pseudo" required>
                    <select id="classe" name="idPerso" require>
                        <option value="">Choissisez votre classe</option>
                        <option vlaue="1">Guerrier</option>
                        <option value="2">Mage</option>
                        <option value="3">Eclaireur</option>
                    </select>
                </div>
                <?php
                    if(isset($_POST['inscription'])){ // Si le mot de passe est incorrect on envoie un message
                        if($mdp != $confmdp){
                            ?>
                                <div class="erreur_mdp">
                                    <p>Veuillez saisir le même mot de passe</p>
                                </div>
                            <?php
                        }
                    }
                ?>
                <div class="mdp">
                    <input type="password" id="mdp" name="mdp" placeholder="Mot de passe" required>
                </div>
                <div class="confmdp">
                    <input type="password" id="confmdp" name="confmdp" placeholder="Confirmer le mot de passe" required>
                </div>
                <div class="submit">
                    <input type="submit" id="inscription" name="inscription" value="Creer le personnage">
                </div>
            </form>
        </div>
    </body>
</html>