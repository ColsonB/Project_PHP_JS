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
    $sort = 10;
    $crit = rand(1, 4);
    if($crit == 4){
        $attaque = ($sort + $attaque)*2;
    }else{
        $attaque = $sort + $attaque;
    }
    $monstre = $_SESSION['idMonstre'];
    $req = "SELECT vie, defense FROM combatMonstre WHERE idMonstre = '$monstre'"; // On met à jour la vie et la défence du monstre dans la BDD
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
    $req = "UPDATE combatMonstre SET vie='$vie' WHERE combatMonstre.idMonstre = '$monstre'"; // On met à jour la vie du monstre dans la BDD
    $RequetStatement=$BDD->query($req);
    echo $vie;
?>