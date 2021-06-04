

displayUser()
checkUsersConnect()
check_user_connect = setInterval(checkUsersConnect, 5000)

// pour relancer lorsque l'on vide la searchbarre en cliquant sur la croix
$('#search_bar_users').on('search', function () {
    // search logic here
    // this function will be executed on click of X (clear button)
    displayUser()
    checkUsersConnect()
    check_user_connect = setInterval(checkUsersConnect, 5000)
});

// ------------------------------------------------fonction sur les touches, lance une recherche dans la bdd à chaque touche utilisée
var input = document.getElementById("search_bar_users")
input.addEventListener("keyup", function(e){
    donnees = document.getElementById("search_bar_users").value

    if(donnees.length==0)
    {
       console.log('dansif')

        displayUser()
        checkUsersConnect()
        check_user_connect = setInterval(checkUsersConnect, 5000)
    }
    else if(donnees.length==1)
    {
       console.log('dans else if')
       displayUser()
       checkUsersConnect()
        clearInterval(check_user_connect);
        
        
    }
    else
    {
        clearInterval(check_user_connect);
       console.log('dans else')

     
            $.ajax({
                url: "scripts_ajax_php/moteur_autocompletion.php",
                type: "POST",
                data: {"motclef":donnees},
                dataType: "json",
              
                success : function(dataType){

                    console.log(dataType)
                    var count = Object.keys(dataType).length;
                    $('#users_list').empty();

                    let i = 0;
                    while ( i < count)
                    {
        
                        if(dataType[i]["connecte"] == 0)
                        {
                            $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img class='img_avatar_chat' src=\"img/"+dataType[i][5]+"\"><a href='pages/profil.php'><p class='p_liste_user'>"+dataType[i][1]+"</p></a><a href='pages/chat.php?pseudo="+dataType[i][1]+"'><img class='img_mail_user' src='img/email.png'></a></div>")
                        }
                        else if(dataType[i]["connecte"] == 1)
                        {
                            $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img class='img_avatar_chat' src=\"img/"+dataType[i][5]+"\"><a href='pages/profil.php'><p class='p_liste_user connecte'>"+dataType[i][1]+"</p></a><a href='pages/chat.php?pseudo="+dataType[i][1]+"'><img class='img_mail_user' src='img/email.png'></a></div>")
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
    

    
        // finChargement()

    }

})










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
                    $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img class='img_avatar_chat' src=\"img/"+dataType[i][5]+"\"><a href='pages/profil.php'><p class='p_liste_user'>"+dataType[i][1]+"</p></a><a href='pages/chat.php?pseudo="+dataType[i][1]+"'><img class='img_mail_user' src='img/email.png'></a></div>")
                }
                else if(dataType[i]["connecte"] == 1)
                {
                    $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img class='img_avatar_chat' src=\"img/"+dataType[i][5]+"\"><a href='pages/profil.php'><p class='p_liste_user connecte'>"+dataType[i][1]+"</p></a><a href='pages/chat.php?pseudo="+dataType[i][1]+"'><img class='img_mail_user' src='img/email.png'></a></div>")
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


function checkUsersConnect(){
            console.log('check user connecte');
    
    $.ajax({
        url: "scripts_ajax_php/search_all_user.php",
        type: "POST",
        dataType: "json",
      
        success : function(dataType){

            var count = Object.keys(dataType).length;

            utilisateurs = document.getElementsByClassName("users");

            let i = 0;
            while ( i < count)
            {
                // console.log(utilisateurs[i].children[1].children[0])
                // console.log(dataType)
                // utilisateurs[i].lastChild.classList.add("connecte");
                if(dataType[i]["connecte"] == 1)
                {
                    utilisateurs[i].children[1].children[0].classList.add("connecte");
                }
                else if(dataType[i]["connecte"] == 0 )
                {
                    utilisateurs[i].children[1].children[0].classList.remove("connecte");
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

