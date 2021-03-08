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
        <link rel='stylesheet' type='text/css' href='src/css/accueil.css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <script type="text/javascript" src="src/js/menu.js"></script>
    </head>
    
    <body>
        <?php
            include("menu.php");
        ?>
        <div class="back">
            <h1 class="titre">SN1 Battle Simulator</h1>
            <div class="regle">
                <h2>Règles du jeu</h2>
                <p>SN1 Battle Simulator est un jeu PVE qui se joue au tour par tour. Le but est de tuer les Monstres 
                    qui se dresseront contre vous dans l'Arène. Un Monstre tué vous rapporte des points. 
                    Plus vous accumulerez des points, plus vous vous hisserez haut dans le classement des Héros.
                </p>
            </div>
            <div class="hero">
                <h2>Héros de SN1 World</h2>
                <p>Dans le monde de SN1 World, chaque Joueur dispose d'un unique héros avec les caractéristiques
                    suivante :
                </p>
                <table>
                    <tr>
                        <th>Classe</th>
                        <th>Vie</th>
                        <th>Attaque</th>
                        <th>Défense</th>
                    </tr>
                <?php
                    $req = "SELECT classe, vie, attaque, defense FROM personnage WHERE 1";
                    $RequetStatement=$BDD->query($req);
                    while($Tab=$RequetStatement->fetch()){
                        ?>
                            <tr>
                                <td><?php echo $Tab[0]; ?></td>
                                <td><?php echo $Tab[1]; ?></td>
                                <td><?php echo $Tab[2]; ?></td>
                                <td><?php echo $Tab[3]; ?></td>
                            </tr>
                        <?php
                    }
                ?> 
                </table>
            </div>
            <div class="bestiaire">
                <h2>Bestiaire de SN1 World</h2>
                <p>Dans le monde de SN1 World, il existe de nombreux Monstres. Affrontez-les dans l'Arène et gagnez des
                    points. Voici les Monstre disponible dans l'Arène :
                </p>
                <table>
                    <tr>
                        <th>Nom</th>
                        <th>Vie</th>
                        <th>Attaque</th>
                        <th>Défense</th>
                    </tr>
                <?php
                    $req = "SELECT nom, vie, attaque, defense FROM monstre WHERE 1 ORDER BY nom";
                    $RequetStatement=$BDD->query($req);
                    while($Tab=$RequetStatement->fetch()){
                        ?>
                            <tr>
                                <td><?php echo $Tab[0]; ?></td>
                                <td><?php echo $Tab[1]; ?></td>
                                <td><?php echo $Tab[2]; ?></td>
                                <td><?php echo $Tab[3]; ?></td>
                            </tr>
                        <?php
                    }
                ?> 
                </table>
            </div>
        </div>
    </body>
</html>
<?php
    }else{
        include('formulaire.php');
    }
?>