<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include('../../../BDD.php');
    include('../../class/combat.php');
    $joueur = $_SESSION['idUser'];

    //On récupère l'attaque du joueur dans la BDD
    $req = "SELECT combatperso.attaque FROM utilisateur, combatperso WHERE utilisateur.idCombatPerso = combatperso.idCombatPerso AND utilisateur.idUser = '$joueur'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $attaque = $Tab[0];
    }

    //On calcul les dégats de l'attaque avec 1 chance sur 4 de faire un coup critique
    $tranche = 10;
    $crit = rand(1, 4);
    if($crit == 4){
        $attaque = ($tranche + $attaque)*2;
    }else{
        $attaque = $tranche + $attaque;
    }

    $monstre = $_SESSION['idMonstre'];
    //On récupère la vie et la défense du monstre dans la BDD
    $req = "SELECT combatmonstre.vie, combatmonstre.defense FROM combatmonstre WHERE combatmonstre.idMonstre = '$monstre'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $vie = $Tab[0];
        $receveur = $Tab[1];
    }

    //On appelle l'objet Combat
    $combat = new Combat($attaque, $receveur);
    if($combat->degat() < 0){
        $vie = $vie - 0;
    }else{
        $vie = $vie - $combat->degat();
    }
    if($vie < 0){
        $vie = 0;
    }

    //On met à jour la vie du monstre dans la BDD
    $req = "UPDATE combatmonstre SET vie='$vie' WHERE combatmonstre.idMonstre = '$monstre'";
    $RequetStatement=$BDD->query($req);

    echo $vie;
?>