for(var i=0; i<3; i++){
    document.getElementsByClassName('boutonAttaque')[i].addEventListener('click', function(){
        for(var i=0; i<3; i++){
            document.getElementsByClassName('boutonAttaque')[i].disabled = true;
        }
        setTimeout(function(){
            try{
                fetch('src/attaque/monstre.php', {
                    method: 'post'
                }).then(function(response){
                    return response.json();        
                }).then(function (data){
                    var obj = {"vie_joueur": data};
                    console.log(JSON.parse(JSON.stringify(obj)))
                    document.getElementById('vie_joueur').innerHTML = data;
                })
            }catch (error){
                console.error(error);
            }
            for(var i=0; i<3; i++){
                document.getElementsByClassName('boutonAttaque')[i].disabled = false;
            }
        }, 2000);
    });
}