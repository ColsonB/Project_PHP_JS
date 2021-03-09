<?php
    
    include('BDD.php');

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if($_SESSION['connect']==true){

        $id = $_SESSION['idUser'];
        $req = "SELECT utilisateur.pseudo, personnage.classe, personnage.vie, personnage.attaque, personnage.defense, utilisateur.point, utilisateur.victoire, utilisateur.defaite FROM utilisateur, personnage WHERE utilisateur.idPerso = personnage.idPerso AND utilisateur.idUser = '$id'";
        $RequetStatement=$BDD->query($req);
        while($Tab=$RequetStatement->fetch()){
            $pseudo = $Tab[0]; 
            $classe = $Tab[1]; 
            $vie = $Tab[2]; 
            $defense = $Tab[3]; 
            $attaque = $Tab[4]; 
            $point = $Tab[5]; 
            $victoire = $Tab[6];
            $defaite = $Tab[7]; 
        }

        if(isset($_POST['pdp_modif'])){
            $fileType = ".".strtolower(substr(strrchr($_FILES['img_profil']["name"], '.'), 1));
            $_FILES['img_profil']["name"] = "joueur".$id.".png";
            $tmpName = $_FILES['img_profil']['tmp_name'];
            $Name = $_FILES['img_profil']['name'];
            $fileName = "src/img/joueur/".$Name;
            move_uploaded_file($tmpName, $fileName);
            echo "<meta http-equiv='refresh' content='0'";
        }
        
?>

<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil</title>
        <link rel="icon" type="image/png" href="src/img/icone.png">
        <link rel='stylesheet' type='text/css' href='src/css/menu.css'>
        <link rel='stylesheet' type='text/css' href='src/css/page.css'>
        <link rel='stylesheet' type='text/css' href='src/css/profil.css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <script type="text/javascript" src="src/js/menu.js"></script>
    </head>
    
    <body>
        
        <?php
            include("menu.php");
        ?>

        <div class="back">
            <h1>Profil</h1>
            <div class="profil">
                <img class="img_joueur" src="src/img/joueur/joueur<?php echo $id; ?>.png">
                <div class="boutton">
                    <form enctype="multipart/form-data" method='post'>
                        <p><input type="file" id="img_profil" name="img_profil"></p>
                        <p>Selectionnez un fichier en ".png"</p>
                        <p><input type="submit" id="pdp_modif" name="pdp_modif" class="phpModif" value="Sauvegarder l'image"></p>
                    </form>
                </div>
                <div class="info_profil">
                    <h2>Pseudo : <?php echo $pseudo; ?></h2>
                    <p class="classe">Classe : <?php echo $classe; ?></p>
                </div>
                <h2>Statistiques</h2>
                <table>
                    <tr>
                        <th>Vie</th>
                        <th>Attaque</th>
                        <th>Défense</th>
                    </tr>
                    <tr>
                        <td><?php echo $vie;?></td>
                        <td><?php echo $attaque; ?></td>
                        <td><?php echo $defense; ?></td>
                    </tr>
                </table>
                <h2>Points</h2>
                <div class="boutton">
                    <input class="point" type="submit" id="reset_point" value="Rénitialiser les points" >
                    <input class="point" type="submit" id="reset_confirm" value="Confirmer" >
                    <input class="point" type="submit" id="reset_cancel" value="Annuler" >
                </div>
                <table>
                    <tr>
                        <th>Points</th>
                        <th>Victoire</th>
                        <th>Défaite</th>
                    </tr>
                    <tr>
                        <td><?php echo $point;?></td>
                        <td><?php echo $victoire; ?></td>
                        <td><?php echo $defaite; ?></td>
                    </tr>
                </table>
            </div>
        <script type="text/javascript" src="src/js/profil.js"></script>    
    </body>
</html>
<?php
    }else{
        include('formulaire.php');
    }
?>