<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    include('../../../BDD.php');
    $monstre = $_SESSION['idMonstre'];
    $req = "SELECT attaque FROM combatMonstre WHERE idMonstre = '$monstre'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $attaque = $Tab[0];
    }
    $attaque = $attaque + $attaque/2;
    $req = "UPDATE combatMonstre SET attaque='$attaque' WHERE combatMonstre.idMonstre = '$monstre'";
    $RequetStatement=$BDD->query($req);
    $req = "SELECT combatMonstre.attaque FROM combatMonstre WHERE combatMonstre.idMonstre = '$monstre'";
    $RequetStatement=$BDD->query($req);
    while($Tab=$RequetStatement->fetch()){
        $attaque = $Tab[0];
    }
    echo $attaque;  
?>