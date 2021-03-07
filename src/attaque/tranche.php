<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include('../../BDD.php');
    include('../class/combat.php');
    $joueur = $_SESSION['idUser'];
    $req = "SELECT combatPerso.attaque FROM utilisateur, combatPerso WHERE utilisateur.idCombatPerso = combatPerso.idCombatPerso AND utilisateur.idUser = '$joueur'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $attaque = $Tab[0];
    }
    $tranche = 10;
    $crit = rand(1, 4);
    if($crit == 4){
        $attaque = ($tranche + $attaque)*2;
    }else{
        $attaque = $tranche + $attaque;
    }
    $monstre = $_SESSION['idMonstre'];
    $req = "SELECT vie, defense FROM combatMonstre WHERE idMonstre = '$monstre'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $vie = $Tab[0];
        $receveur = $Tab[1];
    }
    $combat = new Combat($attaque, $receveur);
    if($combat->degat() < 0){
        $vie = $vie - 0;
    }else{
        $vie = $vie - $combat->degat();
    }
    if($vie < 0){
        $vie = 0;
    }
    $req = "UPDATE combatMonstre SET vie='$vie' WHERE combatMonstre.idMonstre = '$monstre'";
    $RequetStatement=$BDD->query($req);
    echo $vie;
?>