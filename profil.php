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
        <title>Profil</title>
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
            <div>
                <label>
                    <span id="value"></span>
                    <input type="range" id="range" min="0" max="10" list="tickmarks" value="0">
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
                </label>
                <span id="value3"></span>
            </div>
            <script>
                var slider = document.getElementById("range");
                var output = document.getElementById("value");
                var output2 = document.getElementById("value2");
                var output3 = document.getElementById("value3");
                output.innerHTML = slider.value;
                output2.innerHTML = Number(slider.value)+50;
                output3.innerHTML = 5-Number(slider.value);
                slider.oninput = function(){
                    output.innerHTML = this.value;
                    output2.innerHTML = Number(this.value)+50;
                    output3.innerHTML = 5-Number(slider.value);
                    slider.setAttribute('value', this.value);
                    if(output3.innerHTML<=0){
                        slider.disabled = true;
                    }
                }
            </script>
        </div>
    </body>
</html>
<?php
    }else{
        include('formulaire.php');
    }
?>