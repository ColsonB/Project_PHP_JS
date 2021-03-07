<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    include('../../BDD.php');
    include('../class/combat.php');
    $monstre = $_SESSION['idMonstre'];
    $req = "SELECT attaque FROM combatMonstre WHERE idMonstre = '$monstre'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $attaque = $Tab[0];
    }
    $rand = rand(1, 2);
    if($rand == 1){
        $coup = 10;
        $crit = rand(1, 4);
        if($crit == 4){
            $attaque = ($coup + $attaque)*2;
        }else{
            $attaque = $coup + $attaque;
        }
        $joueur = $_SESSION['idUser'];
        $req = "SELECT combatPerso.vie, combatPerso.defense FROM utilisateur, combatPerso WHERE utilisateur.idCombatPerso = combatPerso.idCombatPerso AND utilisateur.idUser = '$joueur'";
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
        $req = "UPDATE combatperso SET vie = '$vie' WHERE combatperso.idCombatPerso = '$joueur'";
        $RequetStatement=$BDD->query($req);
        echo $vie;
    }else{
        $attaque = $attaque + $attaque/2;
        $req = "UPDATE combatMonstre SET attaque='$attaque' WHERE combatMonstre.idMonstre = '$monstre'";
        $RequetStatement=$BDD->query($req);
        $joueur = $_SESSION['idUser'];
        $req = "SELECT combatPerso.vie FROM utilisateur, combatPerso WHERE utilisateur.idCombatPerso = combatPerso.idCombatPerso AND utilisateur.idUser = '$joueur'";
        $RequetStatement=$BDD->query($req);
        while($Tab=$RequetStatement->fetch()){
            $vie = $Tab[0];
        }
        echo $vie;
    }    
?>