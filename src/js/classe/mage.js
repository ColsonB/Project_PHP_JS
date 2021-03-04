/*-- Attaque Mage --*/
//-- Attaque Sort --//
var sort = document.getElementById('sort');
sort.addEventListener('click', function() {
    try{
        fetch('src/attaque/sort.php', {
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
//-- Attaque Déferlement --//
var deferlement = document.getElementById('deferlement');
deferlement.addEventListener('click', function() {
    try{
        fetch('src/attaque/deferlement.php', {
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