<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    include('../../../BDD.php');
    include('../../class/combat.php');
    $monstre = $_SESSION['idMonstre'];
    $req = "SELECT attaque FROM combatMonstre WHERE idMonstre = '$monstre'"; // On récupére l'attaque du monstre dans la BDD
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $attaque = $Tab[0];
    }
    $coup = 10;
    $crit = rand(1, 4);
    if($crit == 4){
        $attaque = ($coup + $attaque)*2;
    }else{
        $attaque = $coup + $attaque;
    }
    $joueur = $_SESSION['idUser'];
    $req = "SELECT combatPerso.vie, combatPerso.defense FROM utilisateur, combatPerso 
    WHERE utilisateur.idCombatPerso = combatPerso.idCombatPerso AND utilisateur.idUser = '$joueur'"; // On récupére la vie et la défense du monstre dans la BDD
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
    $req = "UPDATE combatperso SET vie = '$vie' WHERE combatperso.idCombatPerso = '$joueur'"; // On met à jour l'attaque dans la BDD
    $RequetStatement=$BDD->query($req);
    echo $vie;    
?>