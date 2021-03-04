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
            console.log(data);
            document.getElementById('result').innerHTML = data;
        })
    }catch (error){
        console.error(error);
    }
});
//-- Attaque Esquive --//
var esquive = document.getElementById('esquive');
esquive.addEventListener('click', function() {
    try{
        fetch('src/attaque/esquive.php', {
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
var boost = document.getElementById('boost');
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
