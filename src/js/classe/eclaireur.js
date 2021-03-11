/*-- Attaque Eclaireur --*/
//-- Attaque Tir --//
var tir = document.getElementById('tir');
document.getElementById('tir_description').hidden = true;
tir.addEventListener('click', function() {
    try{
        fetch('src/attaque/joueur/tir.php', {
            method: 'post'
        }).then(function(response){
            return response.json();        
        }).then(function (data){
            var obj = {"tir": data};
            console.log(JSON.parse(JSON.stringify(obj)))
            document.getElementById('vie_monstre').innerHTML = data;
        })
    }catch (error){
        console.error(error);
    }
});
tir.addEventListener('mouseover', function() {
    document.getElementById('tir_description').hidden = false;
});
tir.addEventListener('mouseout', function() {
    document.getElementById('tir_description').hidden = true;
});

//-- Attaque Boost --//
var boost = document.getElementById('boost');
document.getElementById('boost_description').hidden = true;
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
boost.addEventListener('mouseover', function() {
    document.getElementById('boost_description').hidden = false;
});
boost.addEventListener('mouseout', function() {
    document.getElementById('boost_description').hidden = true;
});

//-- Attaque Soin --//
var soin = document.getElementById('soin');
document.getElementById('soin_description').hidden = true;
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
soin.addEventListener('mouseover', function() {
    document.getElementById('soin_description').hidden = false;
});
soin.addEventListener('mouseout', function() {
    document.getElementById('soin_description').hidden = true;
});
