<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include('../../BDD.php');
    $joueur = $_SESSION['idUser'];
    $vie_joueur = $_SESSION['vie_joueur'];
    $attaque_joueur = $_SESSION['attaque_joueur']; 
    $defense_joueur = $_SESSION['defense_joueur']; 
    $vitesse_joueur = $_SESSION['vitesse_joueur'];
    $req = "SELECT combatPerso.vie FROM combatPerso, utilisateur WHERE utilisateur.idCombatPerso = combatPerso.idCombatPerso AND utilisateur.idUser = '$joueur'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $vieJoueur = $Tab[0];
    }
    $monstre = $_SESSION['idMonstre'];
    $vie_monstre = $_SESSION['vie_monstre'];
    $attaque_monstre = $_SESSION['attaque_monstre']; 
    $defense_monstre = $_SESSION['defense_monstre']; 
    $vitesse_monstre = $_SESSION['vitesse_monstre'];
    $req = "SELECT vie FROM combatMonstre WHERE idMonstre = '$monstre'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $vieMonstre = $Tab[0];
    }
    $req = "SELECT utilisateur.point, utilisateur.victoire, utilisateur.defaite FROM utilisateur WHERE utilisateur.idUser = '$joueur'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $point = $Tab[0];
        $victoire = $Tab[1];
        $defaite = $Tab[2];
    }
    if($vieMonstre <= 0){
        $point = $point + 100;
        $victoire = $victoire + 1;
        $req = "UPDATE utilisateur SET point='$point', victoire='$victoire' WHERE utilisateur.idUser = '$joueur'";
        $RequetStatement=$BDD->query($req);
    }
    if($vieJoueur <= 0){
        $point = $point - 100;
        $defaite = $defaite + 1;
        if($point < 0){
            $point = 0;
        }
        $req = "UPDATE utilisateur SET point='$point', defaite='$defaite' WHERE utilisateur.idUser = '$joueur'";
        $RequetStatement=$BDD->query($req);
    }
    if($vieJoueur <= 0 || $vieMonstre <= 0){
        $req = "UPDATE combatPerso SET vie='$vie_joueur', attaque='$attaque_joueur', defense='$defense_joueur', vitesse='$vitesse_joueur' WHERE combatPerso.idCombatPerso = '$joueur'";
        $RequetStatement=$BDD->query($req);
        $req = "UPDATE combatMonstre SET vie='$vie_monstre', attaque='$attaque_monstre', defense='$defense_monstre', vitesse='$vitesse_monstre' WHERE combatMonstre.idMonstre = '$monstre'";
        $RequetStatement=$BDD->query($req);
        echo 0;
    }else{
        echo 1;
    }
?>