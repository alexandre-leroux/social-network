
function connexion(){
    console.log('script connexion tourne')

    $.ajax({
        url: "scripts_ajax_php/connexion_user.php",
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
// setInterval( connexion, 1000)