<?php

include('BDD.php');
include('src/class/personnage.php');
include('src/class/combat.php');
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if($_SESSION['connect']==true){

        $joueur = $_SESSION['idUser'];
        $req = "SELECT personnage.vie, personnage.attaque, personnage.defense FROM utilisateur, personnage WHERE utilisateur.idPerso = personnage.idPerso AND utilisateur.idUser = '$joueur'";
        $RequetStatement=$BDD->query($req);
        while($Tab=$RequetStatement->fetch()){
            $vie_joueur = $Tab[0]; 
            $attaque_joueur = $Tab[1]; 
            $defense_joueur = $Tab[2]; 
        }
        $req = "UPDATE combatPerso SET vie='$vie_joueur', attaque='$attaque_joueur', defense='$defense_joueur' WHERE combatPerso.idCombatPerso = '$joueur'";
        $RequetStatement=$BDD->query($req);

        $req = "SELECT utilisateur.pseudo, combatPerso.classe, combatPerso.vie, combatPerso.attaque, combatPerso.defense FROM utilisateur, combatPerso WHERE utilisateur.idCombatPerso = combatPerso.idCombatPerso AND utilisateur.idUser = '$joueur'";
        $RequetStatement=$BDD->query($req);
        while($Tab=$RequetStatement->fetch()){
            $Tab[0]; 
            $Tab[1]; 
            $_SESSION['vie_joueur'] = $Tab[2]; 
            $_SESSION['attaque_joueur'] = $Tab[3]; 
            $_SESSION['defense_joueur'] = $Tab[4];
            $joueur = new Personnage($Tab[0], $Tab[1], $Tab[2], $Tab[3], $Tab[4]);
        }

        $monstre = rand(1, 8);
        $_SESSION['idMonstre'] = $monstre;
        $req = "SELECT monstre.vie, monstre.attaque, monstre.defense FROM monstre WHERE monstre.idMonstre = '$monstre'";
        $RequetStatement=$BDD->query($req);
        while($Tab=$RequetStatement->fetch()){
            $vie_monstre = $Tab[0]; 
            $attaque_monstre = $Tab[1]; 
            $defense_monstre = $Tab[2];
        }
        $req = "UPDATE combatMonstre SET vie='$vie_monstre', attaque='$attaque_monstre', defense='$defense_monstre' WHERE combatMonstre.idMonstre = '$monstre'";
        $RequetStatement=$BDD->query($req);

        $req = "SELECT nom, classe, vie, attaque, defense FROM combatMonstre WHERE idMonstre = '$monstre'";
        $RequetStatement=$BDD->query($req);
        while($Tab=$RequetStatement->fetch()){
            $Tab[0]; 
            $Tab[1]; 
            $_SESSION['vie_monstre'] = $Tab[2]; 
            $_SESSION['attaque_monstre'] = $Tab[3]; 
            $_SESSION['defense_monstre'] = $Tab[4];
            $monstre = new Personnage($Tab[0], $Tab[1], $Tab[2], $Tab[3], $Tab[4]);
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
        <link rel='stylesheet' type='text/css' href='src/css/arene.css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <script type="text/javascript" src="src/js/menu.js"></script>
    </head>
    
    <body>
        <?php
            include("menu.php");
        ?>
        <div class="back">
            <h1>Arène</h1>
            <div class="message">
                <h2 id="debutAffronte">Voulez-vous affronter le Monstre <?php echo $monstre->nom(); ?> ?</h2>
                <input type="submit" id="start" value="Commencer le combat">
                <input type="submit" id="adversaire" value="Autre adversaire">
                <h2 id="versus"><?php echo $joueur->nom(); ?> contre <?php echo $monstre->nom(); ?></h2>
                <p id="joueur_tour">C'est au Joueur <?php echo $joueur->nom(); ?> de jouer</p>
                <p id="monstre_tour">C'est au Monstre <?php echo $monstre->nom(); ?> de jouer</p>
                <h2 id="finAffronte">Fin du combat</h2>
                <input type="submit" id="end" value="Sortir de l'arène">
            </div>
            <div class="combat_fond">
                <table class="combat_interface">
                    <tr>
                        <td colspan="2"><img src="src/img/joueur/joueur<?php echo $_SESSION['idUser']; ?>.png"class="img_joueur"></td>
                        <td colspan="2"><img src="src/img/monstre/monstre<?php echo $_SESSION['idMonstre']; ?>.png" class="img_monstre"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><?php echo $joueur->nom(); ?></td>
                        <td colspan="2"><?php echo $monstre->nom(); ?></td>
                    </tr>
                    <tr>
                        <td>Classe</td>
                        <td><?php echo $joueur->classe(); ?></td>
                        <td>Classe</td>
                        <td><?php echo $monstre->classe(); ?></td>
                    </tr>
                    <tr>
                        <td>Vie</td>
                        <td><div id="vie_joueur"><?php echo $joueur->vie(); ?></div></td>
                        <td>Vie</td>
                        <td><div id="vie_monstre"><?php echo $monstre->vie(); ?></div></td>
                    </tr>
                    <tr>
                        <td>Attaque</td>
                        <td><div id="attaque_joueur"><?php echo $joueur->attaque(); ?></div></td>
                        <td>Attaque</td>
                        <td><div id="attaque_monstre"><?php echo $monstre->attaque(); ?></div></td>
                    </tr>
                    <tr>
                        <td>Défense</td>
                        <td><div id="defense_joueur"><?php echo $joueur->defense(); ?></div></td>
                        <td>Défense</td>
                        <td><div id="defense_monstre"><?php echo $monstre->defense(); ?></div></td>
                    </tr>
                </table>
            </div>
            <div class="attaque">
                <?php
                    attaque($joueur);
                ?>
                <p id="monstre_chargement">En attente de la fin du tour de Monstre <?php echo $monstre->nom(); ?>...</p>
            </div>
            <script type="text/javascript" src="src/js/combat.js"></script>
            <script type="text/javascript" src="src/js/classe/monstre.js"></script>
        </div>
    </body>
</html>
<?php
    }else{
        include('formulaire.php');
    }
?>