<?php

include('BDD.php');
include('src/class/personnage.php');
include('src/class/combat.php');
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if($_SESSION['connect']==true){

        $joueur = $_SESSION['idUser'];
        $req = "SELECT utilisateur.pseudo, combatPerso.classe, combatPerso.vie, combatPerso.attaque, combatPerso.defense, combatPerso.vitesse FROM utilisateur, combatPerso WHERE utilisateur.idCombatPerso = combatPerso.idCombatPerso AND utilisateur.idUser = '$joueur'";
        $RequetStatement=$BDD->query($req);
        while($Tab=$RequetStatement->fetch()){
            $Tab[0]; 
            $Tab[1]; 
            $_SESSION['vie_joueur'] = $Tab[2]; 
            $_SESSION['attaque_joueur'] = $Tab[3]; 
            $_SESSION['defense_joueur'] = $Tab[4]; 
            $_SESSION['vitesse_joueur'] = $Tab[5];
            $joueur = new Personnage($Tab[0], $Tab[1], $Tab[2], $Tab[3], $Tab[4], $Tab[5]);
        }
        $monstre = rand(1, 6);
        $_SESSION['idMonstre'] = $monstre;
        $req = "SELECT nom, classe, vie, attaque, defense, vitesse FROM combatMonstre WHERE idMonstre = '$monstre'";
        $RequetStatement=$BDD->query($req);
        while($Tab=$RequetStatement->fetch()){
            $Tab[0]; 
            $Tab[1]; 
            $_SESSION['vie_monstre'] = $Tab[2]; 
            $_SESSION['attaque_monstre'] = $Tab[3]; 
            $_SESSION['defense_monstre'] = $Tab[4]; 
            $_SESSION['vitesse_monstre'] = $Tab[5];
            $monstre = new Personnage($Tab[0], $Tab[1], $Tab[2], $Tab[3], $Tab[4], $Tab[5]);
        }

        function attaque($joueur){
            if($joueur->classe()=='Guerrier'){
                ?>                    
                    <input type="submit" id="tranche" class="boutonAttaque" value="Tranche">
                    <input type="submit" id="boost" class="boutonAttaque" value="Boost">
                    <input type="submit" id="soin" class="boutonAttaque" value="Soin">
                    <script type="text/javascript" src="src/js/classe/guerrier.js"></script>
                <?php
            }
            if($joueur->classe()=='Mage'){
                ?>
                    <input type="submit" id="sort" class="boutonAttaque" value="Sort">
                    <input type="submit" id="boost" class="boutonAttaque" value="Boost">
                    <input type="submit" id="soin" class="boutonAttaque" value="Soin">
                    <script type="text/javascript" src="src/js/classe/mage.js"></script>
                <?php
            }
            if($joueur->classe()=='Eclaireur'){
                ?>
                    <input type="submit" id="tir" class="boutonAttaque" value="Tir">
                    <input type="submit" id="boost" class="boutonAttaque" value="Boost">
                    <input type="submit" id="soin" class="boutonAttaque" value="Soin">
                    <script type="text/javascript" src="src/js/classe/eclaireur.js"></script>
                <?php
            }
        }
        
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
                
            ?>
            <div>
                <p>Voulez-vous affronter le monstre <?php echo $monstre->pseudo(); ?> ?</p>
                <input type="submit" id="start" value="Commencer le combat">
            </div>
            <div>
                <?php
                    echo $joueur->pseudo();
                    echo 'Vie : <div id="vie_joueur">'.$joueur->vie().'</div>';
                    echo $monstre->pseudo();
                    echo 'Vie : <div id="vie_monstre">'.$monstre->vie().'</div>'
                ?>
            </div>
            <div>
            <?php
            ?>
            </div>
            <?php
                attaque($joueur);
            ?>
            <script type="text/javascript" src="src/js/classe/monstre.js"></script>
            <script type="text/javascript" src="src/js/combat.js"></script>
        </div>
    </body>
</html>
<?php
    }else{
        include('formulaire.php');
    }
?>