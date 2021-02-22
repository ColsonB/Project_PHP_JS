<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $id = $_SESSION['idUser'];

    include('BDD.php');

    $req = "SELECT pseudo FROM utilisateur WHERE idUser = '$id'";
    $requetStatement=$BDD->query($req);

?>

<header class="header">
    <nav class="navbar">
        <ul class="navbar-gauche">
            <li>
                <a href="accueil.php">Accueil</a>
            </li>
            <li>
                <a href="combat.php">Combat</a>
            </li>
            <li>
                <a href="classement.php">Classement</a>
            </li>
        </ul>
        <ul class="navbar-droite">
            <div class="dropdown">
                <button onclick="profilFunction()" class="dropdown-profil-menu">
                    <i class="fas fa-user"></i>
                    <?php
                        while($Tab=$requetStatement->fetch()){
                            echo $Tab[0];
                        }
                    ?>
                    <i class="fas fa-caret-down"></i>
                </button>
                <div id="dropdown-profil" class="dropdown-profil">
                    <a href="profil.php">
                        Profil
                    </a>
                    <a href="deconnexion.php">
                        <i class="fas fa-sign-out-alt"></i>
                        Déconnexion
                    </a>
                </div>
            </div>
        </ul>
    </nav>
</header>