<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include('../../../BDD.php');
    $joueur = $_SESSION['idUser'];
    $req = "SELECT combatPerso.vie FROM utilisateur, combatPerso 
    WHERE utilisateur.idCombatPerso = combatPerso.idCombatPerso AND utilisateur.idUser = '$joueur'"; // On récupére la vie de l'utilisateur dans la BDD
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $vie = $Tab[0];
    }
    $vie_joueur = $_SESSION['vie_joueur'];
    $soin = 10;
    $vie = $vie + $soin;
    if($vie_joueur < $vie){
        $vie = $vie_joueur;
    }
    $req = "UPDATE combatperso SET vie = '$vie' WHERE combatperso.idCombatPerso = '$joueur'"; // On met à jour la vie de l'utilisateur dans la BDD
    $RequetStatement=$BDD->query($req);
    echo $vie;
?>