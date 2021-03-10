<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include('../../../BDD.php');
    $joueur = $_SESSION['idUser'];
    $req = "SELECT combatPerso.attaque FROM utilisateur, combatPerso WHERE utilisateur.idCombatPerso = combatPerso.idCombatPerso 
    AND utilisateur.idUser = '$joueur'"; // On récupére les informations de l'utilisateur dans la BDD
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $attaque = $Tab[0];
    }
    $attaque = $attaque + $attaque/2;
    $req = "UPDATE combatperso SET attaque = '$attaque' WHERE combatperso.idCombatPerso = '$joueur'"; // On met à jour l'attaque de l'utilisateur dans la BDD
        $RequetStatement=$BDD->query($req);
    $joueur = $_SESSION['idUser'];
    $req = "SELECT combatPerso.attaque FROM utilisateur, combatPerso WHERE utilisateur.idCombatPerso = combatPerso.idCombatPerso AND utilisateur.idUser = '$joueur'"; 
    $RequetStatement=$BDD->query($req); 
    while($Tab=$RequetStatement->fetch()){
        $attaque = $Tab[0];
    }
    echo $attaque;
?>