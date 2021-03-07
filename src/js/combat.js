for(var i=0; i<3; i++){
    document.getElementsByClassName('boutonAttaque')[i].hidden = true;
}
var start = document.getElementById('start');
start.addEventListener('click', function() {
    document.getElementById('start').disabled = true;
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
    }, 2000);
    function arret(){
        clearInterval(time);
        alert('Fin du combat');
        document.location.reload();
    }
});
