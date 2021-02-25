function action(){
    var tranche = document.getElementById("tranche");
    tranche.onclick = Tranche();
}

function Tranche(){
    fetch('../class/attaque.php').then((resp) => resp.json())
        .then(function (tranche) {
            console.log(data);
        })
        .catch(function (error) {
            console.log(error);
        });
}