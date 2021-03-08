<?php
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if($_SESSION['connect']==true){

    $id = $_SESSION['idUser'];

    include('BDD.php');

    $req = "SELECT pseudo FROM utilisateur WHERE idUser = '$id'";
    $requetStatement=$BDD->query($req);

?>

<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil</title>
        <link rel="icon" type="image/png" href="src/img/.png">
        <link rel='stylesheet' type='text/css' href='src/css/menu.css'>
        <link rel='stylesheet' type='text/css' href='src/css/page.css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <script type="text/javascript" src="src/js/menu.js"></script>
        <script type="text/javascript" src="src/js/profil.js"></script>
    </head>
    
    <body>
        
        <?php
            include("menu.php");
        ?>

        <div class="back">
          
            <table>
                <tr>
                    <td>Pseudo</td>
                    <td>Classe</td>
                    <td>Points</td>
                    <td>Victoire</td>
                    <td>Défaite</td>
                </tr>
            <?php

                $reponse = $BDD->query("SELECT * FROM utilisateur
                WHERE idUser = '$id'");

                while($Tab = $reponse->fetch()){
                    ?>
                        <tr>
                            <td><?php echo $Tab['pseudo']; ?></td>
                            <td><?php echo $Tab['idPerso']; ?></td>
                            <td><?php echo $Tab['point']; ?></td>
                            <td><?php echo $Tab['victoire']; ?></td>
                            <td><?php echo $Tab['defaite']; ?></td>
                        </tr>
                    <?php
                }
            ?> 
            </table>

        <form enctype="multipart/form-data"  action="" method="post">

                <img class="imgusers" src="src/img/joueur/joueur<?php echo $id; ?>.png">
            <p>
                <input type="file" name='imgprof' />
            </p>
            <p>
                <input class="input" type="submit" name='pdpModif' value="Sauvegarder l'image">
            </p>
            <p>
                <input class="input" type="submit" name="point" value="Rénitialiser les points" >
            </p>

        </form>

        <?php

        if(isset($_POST['point'])){
            $req = "UPDATE utilisateur SET point=0, victoire=0, defaite=0 WHERE utilisateur.idUser = '$id'";
            $RequetStatement=$BDD->query($req);
        }

        if (isset($_POST['pdpModif'])) {

            $valideType = array('.png');
            
            if ($_FILES['imgprof'] == 0) {
                echo "aucun dossier selectionné";
                die;
            }

            $fileType = ".".strtolower(substr(strrchr($_FILES['imgprof']["name"], '.'), 1));

            $_FILES['imgprof']["name"] = "joueur".$_SESSION['idUser'].".png";
            
            if (!in_array($fileType, $valideType)) {
                echo "le fichier sélectionné n'est pas une image";
                die;
            }
            $tmpName = $_FILES['imgprof']['tmp_name'];
            $Name = $_FILES['imgprof']['name'];
            $fileName = "src/img/joueur/" . $Name;
            $résultUplod = move_uploaded_file($tmpName, $fileName);
            if ($résultUplod) {
                echo "transfere terminer";
            }
        }

            ?>

        </div>      
    </body>
</html>
<?php
    }else{
        include('formulaire.php');
    }
?>