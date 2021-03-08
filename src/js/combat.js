for(var i=0; i<3; i++){
    document.getElementsByClassName('boutonAttaque')[i].hidden = true;
}
document.getElementById('versus').hidden = true;
document.getElementById('joueur_tour').hidden = true;
document.getElementById('monstre_tour').hidden = true;
document.getElementById('monstre_chargement').hidden = true;
document.getElementById('finAffronte').hidden = true;
document.getElementById('end').hidden = true;
var adversaire = document.getElementById('adversaire');
adversaire.addEventListener('click', function(){
    document.location.reload();
});
var start = document.getElementById('start');
start.addEventListener('click', function() {
    document.getElementById('debutAffronte').hidden = true;
    document.getElementById('start').hidden = true;
    document.getElementById('adversaire').hidden = true;
    document.getElementById('versus').hidden = false;
    document.getElementById('joueur_tour').hidden = false;
    for(var i=0; i<3; i++){
        document.getElementsByClassName('boutonAttaque')[i].hidden = false;
    }
    var time = setInterval(function(){
        try{
            fetch('src/degat/etat_combat.php', {
                method: 'post'
            }).then(function(response){
                return response.json();        
            }).then(function (data){
                var obj = {"combat": data};
                console.log(JSON.parse(JSON.stringify(obj)))
                if(data == 0){
                    arret();
                };
            })
        }catch (error){
            console.error(error);
        }        
    }, 1000);
    function arret(){
        clearInterval(time);
        setInterval(function(){
            document.getElementById('versus').hidden = true;
            document.getElementById('joueur_tour').hidden = true;
            document.getElementById('monstre_tour').hidden = true;
            for(var i=0; i<3; i++){
                document.getElementsByClassName('boutonAttaque')[i].hidden = true;
            }
            document.getElementById('monstre_chargement').hidden = true;
            document.getElementById('finAffronte').hidden = false;
            document.getElementById('end').hidden = false;
        });
        var end = document.getElementById('end');
        end.addEventListener('click', function(){
            document.location.reload();
        });
    }
});
