<?php
    include('../../BDD.php');
    $joueur = 1;
    $req = "SELECT personnage.attaque FROM utilisateur, personnage WHERE utilisateur.idPerso = personnage.idPerso AND utilisateur.idUser = '$joueur'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $attaque = $Tab[0];
    }
    $sort = 10;
    $crit = rand(1, 4);
    if($crit == 4){
        $degat = ($sort + $attaque)*2;
    }else{
        $degat = $sort + $attaque;
    }
    echo $degat;
?>