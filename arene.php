<?php

include('BDD.php');
include('src/class/personnage.php');
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
    </head>
    
    <body>
        <?php
            include("menu.php");
        ?>
        <div class="back">
            <?php
                $joueur1=2;
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
                $lanceur = $perso1;
                $receveur = $perso2;
                if($perso1->classe()=='Guerrier'){
                    ?>
                        <input type="submit" id="tranche" value="Tranche">
                        <input type="submit" id="bouclier" value="Bouclier">
                        <input type="submit" id="boost" value="Boost">
                        <script type="text/javascript" src="src/js/classe/guerrier.js"></script>
                    <?php
                }
                if($perso1->classe()=='Mage'){
                    ?>
                    <input type="submit" id="sort" value="Sort">
                    <input type="submit" id="deferlement" value="Déferlement">
                    <input type="submit" id="boost" value="Boost">
                    <script type="text/javascript" src="src/js/classe/mage.js"></script>
                    <?php
                }
                if($perso1->classe()=='Eclaireur'){
                    ?>
                    <input type="submit" id="tir" value="Tir">
                    <input type="submit" id="esquive" value="Esquive">
                    <input type="submit" id="boost" value="Boost">
                    <script type="text/javascript" src="src/js/classe/eclaireur.js"></script>
                    <?php
                }

                $vitessePerso1 = $perso1->vitesse();
                $vitessePerso2 = $perso2->vitesse();
                if($vitessePerso1 > $vitessePerso2){
                    echo 'perso1 1e';
                }
                if($vitessePerso1 < $vitessePerso2){
                    echo 'perso2 1e';
                }
                if($vitessePerso1 == $vitessePerso2){
                    $priorite = rand(1, 2);
                    if($priorite == 1){
                        echo 'perso1 1e';
                    }else{
                        echo 'perso2 1e';
                    }
                }
            ?>
            <div id="result"></div>
        </div>
    </body>
    <script type="text/javascript" src="src/js/api.js"></script>
</html>
<?php
    }else{
        include('formulaire.php');
    }
?>