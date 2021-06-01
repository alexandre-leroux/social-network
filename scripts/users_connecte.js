displayUser()
checkUsersConnect()
setInterval(checkUsersConnect, 20000)


function displayUser(){



    $.ajax({
        url: "scripts_ajax_php/search_all_user.php",
        type: "POST",
       
        dataType: "json",
      
        success : function(dataType){


            var count = Object.keys(dataType).length;
            console.log(dataType);

            $('#users_list').empty();

            let i = 0;
            while ( i < count)
            {

                if(dataType[i]["connecte"] == 0)
                {
                    $('#users_list').append("<div class=\"users\"><img src=\"img/"+dataType[i][5]+"\"><p class='p_liste_user'>"+dataType[i][1]+"</p></div>")
                }
                else if(dataType[i]["connecte"] == 1)
                {
                    $('#users_list').append("<div class=\"users\"><img src=\"img/"+dataType[i][5]+"\"><p class='p_liste_user connecte'>"+dataType[i][1]+"</p></div>")
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



function checkUsersConnect(){
    
    $.ajax({
        url: "scripts_ajax_php/search_all_user.php",
        type: "POST",
        dataType: "json",
      
        success : function(dataType){

            var count = Object.keys(dataType).length;
            console.log(count);

            utilisateurs = document.getElementsByClassName("users");

            let i = 0;
            while ( i < count)
            {
                console.log(utilisateurs[i].lastChild)
                // utilisateurs[i].lastChild.classList.add("connecte");
                if(dataType[i]["connecte"] == 1)
                {
                    utilisateurs[i].lastChild.classList.add("connecte");
                }
                else if(dataType[i]["connecte"] == 0 )
                {
                    utilisateurs[i].lastChild.classList.remove("connecte");
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

