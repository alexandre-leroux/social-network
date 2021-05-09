
function chekxUserConnecte(){

    $.ajax({
        url: "model/search_all_user.php",
        type: "POST",
       
        dataType: "json",
      
        success : function(dataType){


            var count = Object.keys(dataType).length;
            console.log(count);

            $('#div1').empty();

            let i = 0;
            while ( i < count)
            {

                if(dataType[i]["connecte"] == 0)
                {
                    $('#div1').append("<p class='p_liste_user'>"+dataType[i][1]+"</p>")
                }
                else if(dataType[i]["connecte"] == 1)
                {
                    $('#div1').append("<p class='p_liste_user_connecte'>"+dataType[i][1]+"</p>")
                }
       

                  i++
            }
        
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

chekxUserConnecte()

setInterval( chekxUserConnecte, 1000)
