<?php

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
             $er_pseudo = ("Le pseudo ne peut pas être vide");
         }

         if(empty($idPerso)){
             $valid = false;
             $er_idPerso = ("Personnage non trouvé");
         }

         if(empty($mdp)){
             $valid = false;
             $er_mdp = "Le mot de passe ne peut pas être vide";
         }

         elseif($mdp != $confmdp){
             $valid = false;
             $er_mdp = "Le mot de passe ne correspond pas";
         }

         if($valid){
           
           $pdp = "<img src='src/img/photo_de_profil.png'>";
           $req = "INSERT INTO utilisateur ('idPerso', 'photoProfil','pseudo' 'mdp', 'point', 'victoire', 'defaite') VALUES ($idPerso, $pdp, $pseudo, $mdp, 0, 0, 0)";
           $requetStatement=$BDD->query($req);

            header(include('index.php'));
            exit;
         }
     }
 }
?>

<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inscription</title>
    </head>
    
    <body>      
        <div>Inscription</div>
            <form method="post">
    <?php
        if(isset($er_pseudo)){
        ?>
            <div><?=$er_pseudo?></div>
        <?php
        }
    ?>
                <input type="text" placeholder="Votre pseudo" name="pseudo" required>
    <?php
        if(isset($er_idPerso)){
        ?>
            <div><?=$er_idPerso?></div>
        <?php
        }
    ?>
                <input type="text" placeholder="Choissisez votre personnage" name="idPerso" required>
    <?php
        if(isset($er_mdp)){
        ?>
            <div><?=$er_mdp?></div>
        <?php
        }
    ?>
                <input type="password" placeholder="Mot de passe" name="mdp" required>
                <input type="password" placeholder="Confirmer le mot de passe" name="confmdp" required>
                <button type="submit" name="inscription">Envoyer</button>
            </form>
     </body>
</html>