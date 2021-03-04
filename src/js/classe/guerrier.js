/*-- Attaque Guerrier --*/
//-- Attaque Tranche --//
var tranche = document.getElementById('tranche');
tranche.addEventListener('click', function() {
    try{
        fetch('src/attaque/tranche.php', {
        method: 'post'
        }).then(function(response){
            return response.json();        
        }).then(function (data){
            console.log(data);
            document.getElementById('result').innerHTML = data;
        })
    }catch (error){
        console.error(error);
    }
});
//-- Attaque Bouclier --//
var tranche = document.getElementById('bouclier');
bouclier.addEventListener('click', function() {
    try{
        fetch('src/attaque/bouclier.php', {
        method: 'post'
        }).then(function(response){
            return response.json();        
        }).then(function (data){
            console.log(data);
            document.getElementById('result').innerHTML = data;
        })
    }catch (error){
        console.error(error);
    }
});
//-- Attaque Boost --//
var esquive = document.getElementById('boost');
boost.addEventListener('click', function() {
    try{
        fetch('src/attaque/boost.php', {
        method: 'post'
        }).then(function(response){
            return response.json();        
        }).then(function (data){
            console.log(data);
            document.getElementById('result').innerHTML = data;
        })
    }catch (error){
        console.error(error);
    }
});