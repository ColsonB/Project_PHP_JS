/*-- Attaque Guerrier --*/
//-- Attaque Tranche --//
var tranche = document.getElementById('tranche');
tranche.addEventListener('click', function() {
    try{
        fetch('src/attaque/joueur/tranche.php', {
            method: 'post'
        }).then(function(response){
            return response.json();        
        }).then(function (data){
            var obj = {"vie_monstre": data};
            console.log(JSON.parse(JSON.stringify(obj)))
            document.getElementById('vie_monstre').innerHTML = data;
        })
    }catch (error){
        console.error(error);
    }
});
//-- Attaque Boost --//
var boost = document.getElementById('boost');
boost.addEventListener('click', function() {
    try{
        fetch('src/attaque/joueur/boost.php', {
        method: 'post'
        }).then(function(response){
            return response.json();        
        }).then(function (data){
            var obj = {"attaque_joueur": data};
            console.log(JSON.parse(JSON.stringify(obj)))
            document.getElementById('attaque_joueur').innerHTML = data;
        })
    }catch (error){
        console.error(error);
    }
});
//-- Attaque Soin --//
var soin = document.getElementById('soin');
soin.addEventListener('click', function() {
    try{
        fetch('src/attaque/joueur/soin.php', {
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
});