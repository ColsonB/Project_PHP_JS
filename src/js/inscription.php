<?php

 session_start();
 include('BDD.php');

 if(isset($_SESSION['id'])){
     header(include('index.php'));
     exit;
 }

 if(!empty($_POST)){
     extract($_POST);
     $valid = true;

     if(isset($_POST['inscription'])){
         $pseudo = htmlentities(trim($pseudo));
         $mdp = trim($mdp);
         $confmdp =trim($confmdp);

         if(empty($pseudo)){
             $valid = false;
             
         }
     }


 }

?>