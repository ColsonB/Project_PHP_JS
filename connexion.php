<?php

session_start();

include('BDD.php');

$_SESSION['connect'] = false;

if($_SESSION['connect']==false){
    /* Si on a replie le formulaire avec le login et le mdp on envoie une requete à la bdd
        pour tester si le user existe */
    if(isset($_POST['log']) && isset($_POST['pass'])){
        $username = $_POST['log'];
        $password = $_POST['pass'];
        
        $req = "SELECT count(*) FROM utilisateur where 
                pseudo = '".$username."' and mdp = '".$password."' ";
        $RequetStatement=$BDD->query($req);
        $count=$RequetStatement->fetchColumn();

        /* Si il existe un user avec un login et un mdp correct alors il va sur la page "accueil.php"
            sinon il reste sur la page de "formulaire.php" */
        $_SESSION['count'] = $count;
        if($count!=0){
            $req = "SELECT idUser FROM utilisateur where pseudo = '".$username."' and mdp = '".$password."' ";
            $RequetStatement=$BDD->query($req);
            while($Tab=$RequetStatement->fetch()){
                $id = $Tab[0];
            }
            $_SESSION['idUser'] = $id;
            $_SESSION['connect'] = true;
            include('accueil.php');
        }
        else{
            include('formulaire.php');
        }
    }else{
        include('formulaire.php');
    }
}

?>
