for(var i=0; i<3; i++){
    document.getElementsByClassName('boutonAttaque')[i].addEventListener('click', function(){
        document.getElementById('joueur_tour').hidden = true;
        document.getElementById('monstre_tour').hidden = false;
        for(var i=0; i<3; i++){
            document.getElementsByClassName('boutonAttaque')[i].hidden = true;
        }
        document.getElementById('monstre_chargement').hidden = false;
        var rand = Math.floor(Math.random() * 2);
        if(rand == 0){
            setTimeout(function(){
                document.getElementById('joueur_tour').hidden = false;
                document.getElementById('monstre_tour').hidden = true;
                try{
                    fetch('src/attaque/monstre/coup.php', {
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
                    document.getElementsByClassName('boutonAttaque')[i].hidden = false;
                }
                document.getElementById('monstre_chargement').hidden = true;
            }, 2000);
        }else{
            setTimeout(function(){
                document.getElementById('joueur_tour').hidden = false;
                document.getElementById('monstre_tour').hidden = true;
                try{
                    fetch('src/attaque/monstre/boost.php', {
                        method: 'post'
                    }).then(function(response){
                        return response.json();        
                    }).then(function (data){
                        var obj = {"attaque_monstre": data};
                        console.log(JSON.parse(JSON.stringify(obj)))
                        document.getElementById('attaque_monstre').innerHTML = data;
                    })
                }catch (error){
                    console.error(error);
                }
                for(var i=0; i<3; i++){
                    document.getElementsByClassName('boutonAttaque')[i].hidden = false;
                }
                document.getElementById('monstre_chargement').hidden = true;
            }, 2000);
        }        
    });
}