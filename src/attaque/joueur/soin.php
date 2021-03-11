<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include('../../../BDD.php');
    $joueur = $_SESSION['idUser'];

    //On récupére la vie du joueur dans la BDD
    $req = "SELECT combatperso.vie FROM utilisateur, combatperso WHERE utilisateur.idCombatPerso = combatperso.idCombatPerso AND utilisateur.idUser = '$joueur'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $vie = $Tab[0];
    }

    //On calcul le soin du joueur
    $vie_joueur = $_SESSION['vie_joueur'];
    $soin = 10;
    $vie = $vie + $soin;
    if($vie_joueur < $vie){
        $vie = $vie_joueur;
    }

    //On met à jour la vie du joueur dans la BDD
    $req = "UPDATE combatperso SET vie = '$vie' WHERE combatperso.idCombatPerso = '$joueur'";
    $RequetStatement=$BDD->query($req);

    echo $vie;
?>