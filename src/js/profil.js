var reset_point = document.getElementById('reset_point');
var reset_confirm = document.getElementById('reset_confirm');
var reset_cancel = document.getElementById('reset_cancel');
document.getElementById('reset_confirm').hidden = true;
document.getElementById('reset_cancel').hidden = true;
reset_point.addEventListener('click', function(){
    document.getElementById('reset_point').disabled = true;
    document.getElementById('reset_confirm').hidden = false;
    document.getElementById('reset_cancel').hidden = false;
});

reset_cancel.addEventListener('click', function(){
    document.getElementById('reset_point').disabled = false;
    document.getElementById('reset_confirm').hidden = true;
    document.getElementById('reset_cancel').hidden = true;
});

reset_confirm.addEventListener('click', function() {
    try{
        fetch('src/autre/reset_point.php', {
            method: 'post'
        }).then(function(response){
            return response.json();        
        }).then(function (data){
            var obj = {"etat": data};
            console.log(JSON.parse(JSON.stringify(obj)));
        })
    }catch (error){
        console.error(error);
    }
    document.location.reload();
});

var suppr_compte = document.getElementById('suppr_compte');
var suppr_confirm = document.getElementById('suppr_confirm');
var suppr_cancel = document.getElementById('suppr_cancel');
document.getElementById('suppr_confirm').hidden = true;
document.getElementById('suppr_cancel').hidden = true;
suppr_compte.addEventListener('click', function(){
    document.getElementById('suppr_compte').disabled = true;
    document.getElementById('suppr_confirm').hidden = false;
    document.getElementById('suppr_cancel').hidden = false;
});

suppr_cancel.addEventListener('click', function(){
    document.getElementById('suppr_compte').disabled = false;
    document.getElementById('suppr_confirm').hidden = true;
    document.getElementById('suppr_cancel').hidden = true;
});

suppr_confirm.addEventListener('click', function() {
    try{
        fetch('src/autre/suppr_compte.php', {
            method: 'post'
        }).then(function(response){
            return response.json();        
        }).then(function (data){
            var obj = {"etat": data};
            console.log(JSON.parse(JSON.stringify(obj)));
        })
    }catch (error){
        console.error(error);
    }
    document.location.reload();
});