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
        
        <?php
    
        ?>

            <div>
            <label oninput="range()"> Attaque
                    <span id="value"></span>
                    <input type="range" id="range" min="0" max="10" list="tickmarks" value="0" >
                        <datalist id="tickmarks">
                            <option value="0"></option>
                            <option value="1"></option>
                            <option value="2"></option>
                            <option value="3"></option>
                            <option value="4"></option>
                            <option value="5"></option>
                            <option value="6"></option>
                            <option value="7"></option>
                            <option value="8"></option>
                            <option value="9"></option>
                            <option value="10"></option>
                        </datalist>
                    <span id="value2"></span>
                    <span id="value3"></span>
                </label>
                
                <label oninput="range2()"> Défense
                    <span id="value4"></span>
                    <input type="range" id="range2" min="0" max="10" list="tickmarks" value="0">
                        <datalist id="tickmarks">
                            <option value="0"></option>
                            <option value="1"></option>
                            <option value="2"></option>
                            <option value="3"></option>
                            <option value="4"></option>
                            <option value="5"></option>
                            <option value="6"></option>
                            <option value="7"></option>
                            <option value="8"></option>
                            <option value="9"></option>
                            <option value="10"></option>
                        </datalist>
                     <span id="value5"></span>
                    <span id="value6"></span>
                </label>

                <label oninput="range3()"> Vitesse
                    <span id="value7"></span>
                    <input type="range" id="range3" min="0" max="10" list="tickmarks" value="0">
                        <datalist id="tickmarks">
                            <option value="0"></option>
                            <option value="1"></option>
                            <option value="2"></option>
                            <option value="3"></option>
                            <option value="4"></option>
                            <option value="5"></option>
                            <option value="6"></option>
                            <option value="7"></option>
                            <option value="8"></option>
                            <option value="9"></option>
                            <option value="10"></option>
                        </datalist>
                    <span id="value8"></span>
                    <span id="value9"></span>
                </label>  
            </div>
            
            <table>
                <tr>
                    <td>Pseudo</td>
                    <td>Classe</td>
                    <td>Points</td>
                    <td>Victoire</td>
                    <td>Défaite</td>
                </tr>
            <?php
                $req = "SELECT utilisateur.pseudo, personnage.classe, utilisateur.point, utilisateur.victoire, utilisateur.defaite FROM utilisateur, personnage 
                WHERE 
                    utilisateur.idPerso = personnage.idPerso";
                $RequetStatement=$BDD->query($req);
                for($i=1; $Tab=$RequetStatement->fetch(); $i++){
                    ?>
                        <tr>
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