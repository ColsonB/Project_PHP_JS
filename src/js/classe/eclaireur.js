/*-- Attaque Eclaireur --*/
//-- Attaque Tir --//
var tir = document.getElementById('tir');
tir.addEventListener('click', function() {
    try{
        fetch('src/attaque/tir.php', {
            method: 'post'
        }).then(function(response){
            return response.json();        
        }).then(function (data){
            var obj = {"tir": data};
            console.log(JSON.parse(JSON.stringify(obj)))
            document.getElementById('result').innerHTML = data;
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
