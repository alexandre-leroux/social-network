
function chekxUserConnecte(){

    $.ajax({
        url: "model/search_all_user.php",
        type: "POST",
       
        dataType: "json",
      
        success : function(dataType){


            var count = Object.keys(dataType).length;
            console.log(count);

            $('#users_list').empty();

            let i = 0;
            while ( i < count)
            {

                if(dataType[i]["connecte"] == 0)
                {
                    $('#users_list').append("<div class=\"users\"><a href=''><img src=\"img/pp.jpg\"><p class='p_liste_user'>"+dataType[i][1]+"</p></a></div>")
                }
                else if(dataType[i]["connecte"] == 1)
                {
                    $('#users_list').append("<div class=\"users\"><a href=''><img src=\"img/pp.jpg\"><p class='p_liste_user connecte'>"+dataType[i][1]+"</p></a></div>")
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
