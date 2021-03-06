/*-- Attaque Mage --*/
//-- Attaque Sort --//
var sort = document.getElementById('sort');
document.getElementById('sort_description').hidden = true;
sort.addEventListener('click', function() {
    try{
        fetch('src/attaque/joueur/sort.php', {
            method: 'post'
        }).then(function(response){
            return response.json();        
        }).then(function (data){
            var obj = {"sort": data};
            console.log(JSON.parse(JSON.stringify(obj)))
            document.getElementById('vie_monstre').innerHTML = data;
        })
    }catch (error){
        console.error(error);
    }
});
sort.addEventListener('mouseover', function() {
    document.getElementById('sort_description').hidden = false;
});
sort.addEventListener('mouseout', function() {
    document.getElementById('sort_description').hidden = true;
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