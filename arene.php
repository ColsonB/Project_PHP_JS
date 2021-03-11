<?php
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include('BDD.php');
    include('src/class/personnage.php');
    include('src/class/combat.php');
    
    //Pour accéder à la page "Arène", l'utilisateur doit être connecté sinon il est renvoyer sur la page de connexion
    if($_SESSION['connect']==true){

        $joueur = $_SESSION['idUser'];
        //On récupère la vie, l'attaque et la défense du personnage dans la BDD
        $req = "SELECT personnage.vie, personnage.attaque, personnage.defense FROM utilisateur, personnage WHERE utilisateur.idPerso = personnage.idPerso AND utilisateur.idUser = '$joueur'";
        $RequetStatement=$BDD->query($req);
       
        while($Tab=$RequetStatement->fetch()){
            $vie_joueur = $Tab[0]; 
            $attaque_joueur = $Tab[1]; 
            $defense_joueur = $Tab[2]; 
        }

        //On met à jour la vie, l'attaque et la défense du joueur dans la BDD
        $req = "UPDATE combatperso SET vie='$vie_joueur', attaque='$attaque_joueur', defense='$defense_joueur' WHERE combatperso.idCombatPerso = '$joueur'";
        $RequetStatement=$BDD->query($req);

        //On récupère le pseudo, la classe, la vie, l'attaque et la défense du joueur dans la BDD
        $req = "SELECT utilisateur.pseudo, combatperso.classe, combatperso.vie, combatperso.attaque, combatperso.defense FROM utilisateur, combatperso WHERE utilisateur.idCombatPerso = combatperso.idCombatPerso AND utilisateur.idUser = '$joueur'";       
        $RequetStatement=$BDD->query($req);
        while($Tab=$RequetStatement->fetch()){
            $Tab[0]; 
            $Tab[1]; 
            $_SESSION['vie_joueur'] = $Tab[2]; 
            $_SESSION['attaque_joueur'] = $Tab[3]; 
            $_SESSION['defense_joueur'] = $Tab[4];
            //On appelle l'objet Personnage
            $joueur = new Personnage($Tab[0], $Tab[1], $Tab[2], $Tab[3], $Tab[4]);
        }

        $monstre = rand(1, 11);
        $_SESSION['idMonstre'] = $monstre;
        //On récupère la vie, l'attaque et la défense du monstre dans la BDD
        $req = "SELECT monstre.vie, monstre.attaque, monstre.defense FROM monstre WHERE monstre.idMonstre = '$monstre'";
        $RequetStatement=$BDD->query($req);
        while($Tab=$RequetStatement->fetch()){
            $vie_monstre = $Tab[0]; 
            $attaque_monstre = $Tab[1]; 
            $defense_monstre = $Tab[2];
        }

        //On met à jour la vie, l'attaque et la défense du monstre dans la BDD
        $req = "UPDATE combatmonstre SET vie='$vie_monstre', attaque='$attaque_monstre', defense='$defense_monstre' WHERE combatmonstre.idMonstre = '$monstre'";
        $RequetStatement=$BDD->query($req);

        //On récupère le nom, la classe, la vie, l'attaque et la défense du monstre dans la BDD
        $req = "SELECT nom, classe, vie, attaque, defense FROM combatmonstre WHERE idMonstre = '$monstre'";
        $RequetStatement=$BDD->query($req);
        while($Tab=$RequetStatement->fetch()){
            $Tab[0]; 
            $Tab[1]; 
            $_SESSION['vie_monstre'] = $Tab[2]; 
            $_SESSION['attaque_monstre'] = $Tab[3]; 
            $_SESSION['defense_monstre'] = $Tab[4];
            //On appelle l'objet Personnage
            $monstre = new Personnage($Tab[0], $Tab[1], $Tab[2], $Tab[3], $Tab[4]);
        }

        //Fonction pour les attaques du joueur en fonction de sa classe
        function attaque($joueur){
            if($joueur->classe()=='Guerrier'){
                ?>                    
                    <input type="submit" id="tranche" class="boutonAttaque" value="Tranche">
                    <div id="tranche_description" class="attaque_description">
                        <p>Tranche</p>
                        <p>Puissance : 10</p>
                        <p>Fait des dégats à l'adversaire. A 25% de chance de faire un coup critique.</p>
                    </div>
                    <input type="submit" id="boost" class="boutonAttaque" value="Boost">
                    <div id="boost_description" class="attaque_description">
                        <p>Boost</p>
                        <p>Augmente la statistique d'attaque du lanceur de 50%.</p>
                    </div>
                    <input type="submit" id="soin" class="boutonAttaque" value="Soin">
                    <div id="soin_description" class="attaque_description">
                        <p>Soin</p>
                        <p>Soigne le lanceur de 10 points de vie.</p>
                    </div>
                    <script type="text/javascript" src="src/js/classe/guerrier.js"></script>
                <?php
            }
            if($joueur->classe()=='Mage'){
                ?>
                    <input type="submit" id="sort" class="boutonAttaque" value="Sort">
                    <div id="sort_description" class="attaque_description">
                        <p>Sort</p>
                        <p>Puissance : 10</p>
                        <p>Fait des dégats à l'adversaire. A 25% de chance de faire un coup critique.</p>
                    </div>
                    <input type="submit" id="boost" class="boutonAttaque" value="Boost">
                    <div id="boost_description" class="attaque_description">
                        <p>Boost</p>
                        <p>Augmente la statistique d'attaque du lanceur de 50%.</p>
                    </div>
                    <input type="submit" id="soin" class="boutonAttaque" value="Soin">
                    <div id="soin_description" class="attaque_description">
                        <p>Soin</p>
                        <p>Soigne le lanceur de 10 points de vie.</p>
                    </div>
                    <script type="text/javascript" src="src/js/classe/mage.js"></script>
                <?php
            }
            if($joueur->classe()=='Eclaireur'){
                ?>
                    <input type="submit" id="tir" class="boutonAttaque" value="Tir">
                    <div id="tir_description" class="attaque_description">
                        <p>Tir</p>
                        <p>Puissance : 10</p>
                        <p>Fait des dégats à l'adversaire. A 25% de chance faire un de coup critique.</p>
                    </div>
                    <input type="submit" id="boost" class="boutonAttaque" value="Boost">
                    <div id="boost_description" class="attaque_description">
                        <p>Boost</p>
                        <p>Augmente la statistique d'attaque du lanceur de 50%.</p>
                    </div>
                    <input type="submit" id="soin" class="boutonAttaque" value="Soin">
                    <div id="soin_description" class="attaque_description">
                        <p>Soin</p>
                        <p>Soigne le lanceur de 10 points de vie.</p>
                    </div>
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
        <link rel="icon" type="image/png" href="src/img/icone.png">
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
                <input type="submit" id="start" value="Entrer dans l'arène">
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
                        <td colspan="2"><img src="src/img/joueur/joueur<?php echo $_SESSION['idUser']; ?>.png" class="img_joueur"></td>
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
                    //On appelle la fonction "attaque"
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