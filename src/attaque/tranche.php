<?php
    include('../../BDD.php');
    $joueur = 1;
    $req = "SELECT personnage.attaque FROM utilisateur, personnage WHERE utilisateur.idPerso = personnage.idPerso AND utilisateur.idUser = '$joueur'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $attaque = $Tab[0];
    }
    $tranche = 10;
    $crit = rand(1, 4);
    if($crit == 4){
        $degat = ($tranche + $attaque)*2;
    }else{
        $degat = $tranche + $attaque;
    }
    echo $degat;
?>