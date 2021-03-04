<?php
    include('../../BDD.php');
    $joueur = 1;
    $req = "SELECT personnage.attaque FROM utilisateur, personnage WHERE utilisateur.idPerso = personnage.idPerso AND utilisateur.idUser = '$joueur'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $attaque = $Tab[0];
    }
    $deferlement = 30;
    $degat = $deferlement + $attaque;
    echo $degat;
?>