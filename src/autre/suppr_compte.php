<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include('../../BDD.php');

    $id = $_SESSION['idUser'];
    //On supprime l'utilisateur de la BDD
    $req = "DELETE FROM `utilisateur` WHERE `idUser`= '$id'";
    $RequetStatement=$BDD->query($req);

    echo 1;
?>