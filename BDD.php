<?php
    try{
        //Appel de la Base De Donnée (BDD)
        $BDD=new PDO('mysql:host=localhost; dbname=projetphpjs; charset=utf8','root','');
        //$BDD=new PDO('mysql:host=192.168.64.175; dbname=projetphpjs; charset=utf8','Cauet','Cauet');
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
?>