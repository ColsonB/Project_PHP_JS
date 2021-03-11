<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include('../../BDD.php');

    $joueur = $_SESSION['idUser'];
    $vie_joueur = $_SESSION['vie_joueur'];
    $attaque_joueur = $_SESSION['attaque_joueur']; 
    $defense_joueur = $_SESSION['defense_joueur'];
    //On récupère la vie du personnage dans la BDD
    $req = "SELECT combatperso.vie FROM combatperso, utilisateur WHERE utilisateur.idCombatPerso = combatperso.idCombatPerso AND utilisateur.idUser = '$joueur'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $vieJoueur = $Tab[0];
    }

    $monstre = $_SESSION['idMonstre'];
    $vie_monstre = $_SESSION['vie_monstre'];
    $attaque_monstre = $_SESSION['attaque_monstre']; 
    $defense_monstre = $_SESSION['defense_monstre'];
    //On récupère la vie du monstre dans la BDD
    $req = "SELECT vie FROM combatmonstre WHERE idMonstre = '$monstre'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $vieMonstre = $Tab[0];
    }

    //On récupère les points, les victoires et les défaites de l'utilisateur dans la BDD
    $req = "SELECT utilisateur.point, utilisateur.victoire, utilisateur.defaite FROM utilisateur WHERE utilisateur.idUser = '$joueur'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $point = $Tab[0];
        $victoire = $Tab[1];
        $defaite = $Tab[2];
    }

    //Si le joueur gagne, il gagne des points et une victoire
    if($vieMonstre <= 0){
        $point = $point + 100;
        $victoire = $victoire + 1;
        //On met à jour les points et la victoire du joueur dans la BDD
        $req = "UPDATE utilisateur SET point='$point', victoire='$victoire' WHERE utilisateur.idUser = '$joueur'";
        $RequetStatement=$BDD->query($req);
    }

    //Si le joueur gagne, il pert des points et une défaite
    if($vieJoueur <= 0){
        $point = $point - 100;
        $defaite = $defaite + 1;
        if($point < 0){
            $point = 0;
        }
        //On met à jour les points et la défaite du joueur dans la BDD
        $req = "UPDATE utilisateur SET point='$point', defaite='$defaite' WHERE utilisateur.idUser = '$joueur'";
        $RequetStatement=$BDD->query($req);
    }

    //Si le combat est terminé (le joueur ou le monstre n'a plus de plus de vie), on réinitialise les stats du joueur et du monstre
    if($vieJoueur <= 0 || $vieMonstre <= 0){
        $req = "UPDATE combatperso SET vie='$vie_joueur', attaque='$attaque_joueur', defense='$defense_joueur' WHERE combatperso.idCombatPerso = '$joueur'";
        $RequetStatement=$BDD->query($req);
        $req = "UPDATE combatmonstre SET vie='$vie_monstre', attaque='$attaque_monstre', defense='$defense_monstre' WHERE combatmonstre.idMonstre = '$monstre'";
        $RequetStatement=$BDD->query($req);
        echo 0;
    }else{
        echo 1;
    }
?>