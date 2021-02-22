<?php

session_start();

/* Si le user est connecté on affiche la page "accueil.php" 
    sinon on affiche la page "formulaire.php" pour se connecter */
 if(isset($_SESSION['connexion'])){
     
    include('accueil.php');
 }
else{
    include('formulaire.php');
}
?>