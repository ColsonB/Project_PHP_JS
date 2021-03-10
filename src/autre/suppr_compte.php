<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include('../../BDD.php');
    $id = $_SESSION['idUser'];
    $req = "DELETE FROM `utilisateur` WHERE `idUser`= '$id'";
    $RequetStatement=$BDD->query($req);

    echo 1;
?>