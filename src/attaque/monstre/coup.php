<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    include('../../../BDD.php');
    include('../../class/combat.php');
    $monstre = $_SESSION['idMonstre'];

    //On récupére la vie et la défense du monstre dans la BDD
    $req = "SELECT attaque FROM combatmonstre WHERE idMonstre = '$monstre'";
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
    $req = "SELECT combatperso.vie, combatperso.defense FROM utilisateur, combatperso WHERE utilisateur.idCombatPerso = combatperso.idCombatPerso AND utilisateur.idUser = '$joueur'";
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

    //On met à jour la vie dans la BDD
    $req = "UPDATE combatperso SET vie = '$vie' WHERE combatperso.idCombatPerso = '$joueur'";
    $RequetStatement=$BDD->query($req);

    echo $vie;    
?>