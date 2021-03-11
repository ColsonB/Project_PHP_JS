/* Réinitialisation des points, des victoires et des défaites du joueur */
var reset_point = document.getElementById('reset_point');
var reset_confirm = document.getElementById('reset_confirm');
var reset_cancel = document.getElementById('reset_cancel');
document.getElementById('reset_confirm').hidden = true;
document.getElementById('reset_cancel').hidden = true;

//Dès que l'utilisateur clique sur le bouton "Réinitialiser les points", un bouton "Confirmer" et "Annuler" apparait
reset_point.addEventListener('click', function(){
    document.getElementById('reset_point').disabled = true;
    document.getElementById('reset_confirm').hidden = false;
    document.getElementById('reset_cancel').hidden = false;
});

//Dès que l'utilisateur clique sur le bouton "Annuler", on cache le bouton "Confirmation" et "Annuler" pour annuler la réinitialisation
reset_cancel.addEventListener('click', function(){
    document.getElementById('reset_point').disabled = false;
    document.getElementById('reset_confirm').hidden = true;
    document.getElementById('reset_cancel').hidden = true;
});

//Dès que l'utilisateur clique sur le bouton "Confirmer", on réinitilise les points, les victoires et les défaites de l'utilisateur
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

/* Suppression d'un compte utilisateur */
var suppr_compte = document.getElementById('suppr_compte');
var suppr_confirm = document.getElementById('suppr_confirm');
var suppr_cancel = document.getElementById('suppr_cancel');
document.getElementById('suppr_confirm').hidden = true;
document.getElementById('suppr_cancel').hidden = true;

//Dès que l'utilisateur clique sur le bouton "Supprimer le compte", un bouton "Confirmer" et "Annuler" apparait
suppr_compte.addEventListener('click', function(){
    document.getElementById('suppr_compte').disabled = true;
    document.getElementById('suppr_confirm').hidden = false;
    document.getElementById('suppr_cancel').hidden = false;
});

//Dès que l'utilisateur clique sur le bouton "Annuler", on cache le bouton "Confirmation" et "Annuler" pour annuler la suppression du compte
suppr_cancel.addEventListener('click', function(){
    document.getElementById('suppr_compte').disabled = false;
    document.getElementById('suppr_confirm').hidden = true;
    document.getElementById('suppr_cancel').hidden = true;
});

//Dès que l'utilisateur clique sur le bouton "Confirmer", on supprime le compte de l'utilisateur
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