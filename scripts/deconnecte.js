function deconnexion(){
    console.log('script deco tourne')

    $.ajax({
        url: "scripts_ajax_php/deco_user.php",
        type: "POST",
        // data: {"motclef":donnees},
        // dataType: "json",
      
        success : function(dataType){

            console.log('ok')
        
        },
    
        error: function (request, status, error) {
            console.log(request.responseText);
        },
    
        complete : function(resultat, statut){
            // console.log(resultat);
            // console.log(statut);
        }


    })
}

// continue la fonction avec 1s d'interval
setInterval( deconnexion, 60000)