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
                    <td>Avatar</td>
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
                            <td><?php echo $Tab['photoProfil']; ?></td>
                            <td><?php echo $Tab['idPerso']; ?></td>
                            <td><?php echo $Tab['point']; ?></td>
                            <td><?php echo $Tab['victoire']; ?></td>
                            <td><?php echo $Tab['defaite']; ?></td>
                        </tr>
                    <?php
                }
            ?> 
            </table>

            <form method="post" name=photoprofil>
            <input type="file" required>
            <input type="submit">
            </form>

            <?php

    if (isset($_POST['photoprofil'])) {

        $valideType = array('.jpg', '.jpeg', '.gif', '.png');
        
        if ($_FILES['img'] == 0) {
            echo "aucun dossier selectionné";
            die;
        }

        $fileType = ".".strtolower(substr(strrchr($_FILES['img']["pseudo"], '.'), 1));

        $_FILES['img']["pseudo"] = $_SESSION['idUser']."_".$_FILES['img']["pseudo"];
        
        if (!in_array($fileType, $valideType)) {
            echo "le fichier sélectionné n'est pas une image";
            die;
        }
        $tmpName = $_FILES['img']['tmp_pseudo'];
        $Name = $_FILES['img']['pseudo'];
        $fileName = "images/utilisateur/" . $Name;
        $résultUplod = move_uploaded_file($tmpName, $fileName);
        if ($résultUplod) {
            echo "transfere terminer";
        }
        $update = $BDD->query("UPDATE `utilisateur` SET `photoProfil`='".$_FILES['img']['pseudo']."' WHERE $id =".$_SESSION['idUser']." ");
            if($update){
                echo "votre image a bien été changé";
            }else{  
                echo 'une erreur est survenue';
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