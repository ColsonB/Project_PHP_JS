<?php

include('BDD.php');
include('src/class/personnage.php');
include('src/class/attaque.php');
include('src/class/combat.php');
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if($_SESSION['connect']==true){
        
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Arène</title>
        <link rel="icon" type="image/png" href="src/img/.png">
        <link rel='stylesheet' type='text/css' href='src/css/menu.css'>
        <link rel='stylesheet' type='text/css' href='src/css/page.css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <script type="text/javascript" src="src/js/menu.js"></script>
        <script type="text/javascript" src="src/js/api.js"></script>
    </head>
    
    <body>
        <?php
            include("menu.php");
        ?>
        <div class="back">
            <?php
                $joueur1=1;
                $joueur2=2;
                $req = "SELECT utilisateur.pseudo, personnage.classe, personnage.vie, personnage.attaque, personnage.defense, personnage.vitesse FROM utilisateur, personnage WHERE utilisateur.idPerso = personnage.idPerso AND utilisateur.idUser = '$joueur1'";
                $RequetStatement=$BDD->query($req);
                while($Tab=$RequetStatement->fetch()){
                    $Tab[0]; $Tab[1]; $Tab[2]; $Tab[3]; $Tab[4]; $Tab[5];
                    $perso1 = new Personnage($Tab[0], $Tab[1], $Tab[2], $Tab[3], $Tab[4], $Tab[5]);
                }
                $req = "SELECT utilisateur.pseudo, personnage.classe, personnage.vie, personnage.attaque, personnage.defense, personnage.vitesse FROM utilisateur, personnage WHERE utilisateur.idPerso = personnage.idPerso AND utilisateur.idUser = '$joueur2'";
                $RequetStatement=$BDD->query($req);
                while($Tab=$RequetStatement->fetch()){
                    $Tab[0]; $Tab[1]; $Tab[2]; $Tab[3]; $Tab[4]; $Tab[5];
                    $perso2 = new Personnage($Tab[0], $Tab[1], $Tab[2], $Tab[3], $Tab[4], $Tab[5]);
                }
                $attaque = new Attaque();
                $lanceur = $perso1;
                $receveur = $perso2;
                echo $attaque->deferlement($lanceur);
                $action = $attaque->deferlement($lanceur);
                $combat = new Combat($action, $receveur);
                $degat = $combat->degat();
                echo $attaque->bouclier($degat);
                if($perso1->classe()=='Guerrier'){
                    ?><input type="submit" id="tranche" onclick="action()" value="Tranche">
                    <input type="submit" id="bouclier" value="Bouclier"><?php
                }
            ?>
        </div>
    </body>
</html>
<?php
    }else{
        include('formulaire.php');
    }
?>