<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include('BDD.php');

?>

<header class="header">
    <nav class="navbar">
        <ul class="navbar-gauche">
            <li>
                <a href="accueil.php">Accueil</a>
            </li>
            <li>
                <a href="arene.php">Arène</a>
            </li>
            <li>
                <a href="classement.php">Classement</a>
            </li>
        </ul>
        <ul class="navbar-droite">
            <div class="dropdown">
                <?php
                    if($_SESSION['connect']==true){
                        $id = $_SESSION['idUser'];
                ?>
                    <button onclick="profilFunction()" class="dropdown-profil-menu">
                        <?php
                            $req = "SELECT pseudo FROM utilisateur WHERE idUser = '$id'"; // On récupére l'id de l'utilisateur dans la BDD pour afficher son pseudo
                            $requetStatement=$BDD->query($req);
                            while($Tab=$requetStatement->fetch()){
                                echo $Tab[0];
                            }
                        ?>
                        <i class="fas fa-caret-down"></i>
                    </button>
                    <div id="dropdown-profil" class="dropdown-profil">
                        <a href="profil.php">
                            <i class="fas fa-user"></i>
                            Profil
                        </a>
                        <a href="deconnexion.php">
                            <i class="fas fa-sign-out-alt"></i>
                            Déconnexion
                        </a>
                    </div>
                <?php
                    }else{
                        ?>
                            <a href="connexion.php">
                                <button class="dropdown-profil-menu">Connecte-toi</button>
                            </a>
                        <?php
                    }
                ?>
            </div>
        </ul>
    </nav>
</header>