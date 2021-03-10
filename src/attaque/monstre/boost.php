<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    include('../../../BDD.php');
    $monstre = $_SESSION['idMonstre'];

    //On récupére l'attaque du monstre dans la BDD
    $req = "SELECT attaque FROM combatmonstre WHERE idMonstre = '$monstre'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $attaque = $Tab[0];
    }
    $attaque = $attaque + $attaque/2;

    //On met à jour l'attaque du monstre dans la BDD
    $req = "UPDATE combatmonstre SET attaque='$attaque' WHERE combatmonstre.idMonstre = '$monstre'";
    $RequetStatement=$BDD->query($req);

    // On récupére l'attaque du monstre dans la BDD
    $req = "SELECT combatmonstre.attaque FROM combatmonstre WHERE combatmonstre.idMonstre = '$monstre'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $attaque = $Tab[0];
    }
    
    echo $attaque;  
?>