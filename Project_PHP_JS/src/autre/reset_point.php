<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include('../../BDD.php');

    $id = $_SESSION['idUser'];
    //On réinitialise les points, les victoires et les défaites à 0 dans la BDD
    $req = "UPDATE utilisateur SET point=0, victoire=0, defaite=0 WHERE utilisateur.idUser = '$id'";
    $RequetStatement=$BDD->query($req);

    echo 1;
?>