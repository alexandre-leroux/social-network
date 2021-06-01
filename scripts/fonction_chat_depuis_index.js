
displayUser()

function displayUser(){

    $.ajax({
        url: "scripts_ajax_php/search_all_user.php",
        type: "POST",
       
        dataType: "json",
      
        success : function(dataType){

            // console.log(dataType)
            // data = JSON.parse(dataType);
            var count = Object.keys(dataType).length;
            // console.log(count)
            // console.log(dataType)



            $('#users_list').empty();

            let i = 0;
            while ( i < count)
            {

                if(dataType[i]["connecte"] == 0)
                {
                    $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img src=\"img/"+dataType[i][5]+"\"><a href='pages/profil.php'><p class='p_liste_user'>"+dataType[i][1]+"</p></a><a href='pages/chat.php?pseudo="+dataType[i][1]+"'><img class='img_mail_user' src='img/email.png'></a></div>")
                }
                else if(dataType[i]["connecte"] == 1)
                {
                    $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img src=\"img/"+dataType[i][5]+"\"><a href='pages/profil.php'><p class='p_liste_user connecte'>"+dataType[i][1]+"</p></a><a href='pages/chat.php?pseudo="+dataType[i][1]+"'><img class='img_mail_user' src='img/email.png'></a></div>")
                }

                i++
            }
        
        },
    
        error: function (request, status, error) {
            // console.log(request);
            // console.log(status);
            // console.log(error);
        },
    
        complete : function(resultat, statut){
 
        }
    
    })

}