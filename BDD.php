<?php
    try{
        //Appel de la Base De Donnée (BDD)
        //$BDD=new PDO('mysql:host=mysql-cauet-clement.alwaysdata.net; dbname=cauet-clement_tp_php_js; charset=utf8','229084_cauet','Cauet1234*');
        $BDD=new PDO('mysql:host=localhost; dbname=tp_php_js; charset=utf8','root','');
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
?>