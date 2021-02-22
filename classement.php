<?php
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if($_SESSION['connect']==true){

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accueil</title>
        <link rel="icon" type="image/png" href="src/img/.png">
        <link rel='stylesheet' type='text/css' href='src/css/menu.css'>
        <link rel='stylesheet' type='text/css' href='src/css/page.css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <script type="text/javascript" src="src/js/menu.js"></script>
    </head>
    
    <body>
        <?php
            include("menu.php");
        ?>
        <div class="back">
            <table>
                <tr>
                    <td>Rang</td>
                    <td>Pseudo</td>
                    <td>Classe</td>
                    <td>Points</td>
                    <td>Victoire</td>
                    <td>Défaite</td>
                </tr>
            <?php
                $req = "SELECT utilisateur.pseudo, personnage.classe, utilisateur.point, utilisateur.victoire, utilisateur.defaite FROM utilisateur, personnage 
                WHERE 
                    utilisateur.idPerso = personnage.idPerso 
                ORDER BY 
                    utilisateur.point ASC";
                $RequetStatement=$BDD->query($req);
                for($i=1; $Tab=$RequetStatement->fetch(); $i++){
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $Tab[0]; ?></td>
                            <td><?php echo $Tab[1]; ?></td>
                            <td><?php echo $Tab[2]; ?></td>
                            <td><?php echo $Tab[3]; ?></td>
                            <td><?php echo $Tab[4]; ?></td>
                        </tr>
                    <?php
                }
            ?> 
            </table>   
        </div>
    </body>
</html>
<?php
    }else{
        include('formulaire.php');
    }
?>