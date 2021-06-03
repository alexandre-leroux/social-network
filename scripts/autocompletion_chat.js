
function displayUser(){

    date = Date.now()
    console.log("displayuser",date  )
    $.ajax({
        url: "../scripts_ajax_php/search_all_user_with_chat.php",
        type: "POST",
        async: false,
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
                    // $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img src=\"../img/pp.jpg\"><p class='p_liste_user'>"+dataType[i][1]+"</p></div>")
                    $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img class='img_avatar_chat' src=\"../img/"+dataType[i][5]+"\"><p class='p_liste_user'>"+dataType[i][1]+"</p></div>")

                }
                else if(dataType[i]["connecte"] == 1)
                {
                    // $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img src=\"../img/pp.jpg\"><p class='p_liste_user connecte'>"+dataType[i][1]+"</p></div>")
                    $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img class='img_avatar_chat' src=\"../img/"+dataType[i][5]+"\"><p class='p_liste_user connecte'>"+dataType[i][1]+"</p></div>")

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
function eventsurclick(){
    date = Date.now()
    console.log("event sur click",date  )
    utilisateurs = document.getElementsByClassName("users");
    // console.log('ok')

  
   for(i = 0; i<utilisateurs.length; i++)
   {

       let pseudo =  utilisateurs[i].lastChild.innerHTML

       utilisateurs[i].addEventListener('click', function(e){
           console.log('ok')

           parent2 = document.getElementById('conteneur_des_messages')
           parent2.innerHTML = "" 

           $.ajax({
               url: "../scripts_ajax_php/chat_prive.php",
               type: "POST",
               data: {  "pseudo":pseudo,  },
               dataType: "JSON",
             
               success : function(dataType){
       
                console.log(dataType)
                   parent = document.getElementById('user_selection_chat')
                   var p = document.createElement("p");
                   var img = document.createElement("IMG");
                   img.setAttribute("src", "../img/"+dataType.data1[5]+"");
                   p.innerHTML =  dataType.data1[1]
                   parent.innerHTML = ""
                   parent.appendChild(img);
                   parent.appendChild(p);

                   var mess = document.createElement("p");

                   for (z=0; z<dataType.data2.length; z++)
                   {
                       if(dataType.data2[z].fk_id_auteur_message == session_id_php)
                       {
                           // console.log(dataType.data2)
                           parent2 = document.getElementById('conteneur_des_messages')
                           var mess = document.createElement("p");
                           mess.className  = "auteur_message_moi"
                            contenur_mess = dataType.data2[z][4]
                            mess.innerHTML = contenur_mess
                            parent2.appendChild(mess);
                       }
                       else{

                           // console.log(dataType.data2)
                           parent2 = document.getElementById('conteneur_des_messages')
                           var mess = document.createElement("p");
                            contenur_mess = dataType.data2[z][4]
                            mess.innerHTML = contenur_mess
                            parent2.appendChild(mess);

                       }
                   }
               
               
               },
           
               error: function (request, status, error) {
                   // console.log(request)
                   // console.log(status)
                   // console.log(error)
               },
           
               complete : function(resultat, statut){
                   // console.log('ok')
               }
       
       
           })

           $.ajax({
               url: "../scripts_ajax_php/update_message_lu.php",
               type: "POST",
               data: {  "pseudo":pseudo,  },
             
               success : function(dataType){
                
               },
           
               error: function (request, status, error) {
               },
           
               complete : function(resultat, statut){
               }
       
       
           })
       })
   }

}

displayUser()
eventsurclick()
refresh_users = setInterval(displayUser, 10000)
refresh_click_user = setInterval(eventsurclick, 10000)

// pour relancer lorsque l'on vide la searchbarre en cliquant sur la croix
$('#search_bar_users').on('search', function () {
    // search logic here
    // this function will be executed on click of X (clear button)
    displayUser()
    eventsurclick()
    refresh_users = setInterval(displayUser, 10000)
    refresh_click_user = setInterval(eventsurclick, 10000)
});

// ------------------------------------------------fonction sur les touches, lance une recherche dans la bdd à chaque touche utilisée
var input = document.getElementById("search_bar_users")

input.addEventListener("keyup", function(e){

    donnees = document.getElementById("search_bar_users").value

    if(donnees.length<1)
    {
        console.log('dans if')
        displayUser()
        eventsurclick()
        refresh_users = setInterval(displayUser, 10000)
        refresh_click_user = setInterval(eventsurclick, 10000)

    }
    else
    {
       
        clearInterval(refresh_users);
        setTimeout(eventsurclick,50)
        clearInterval(refresh_click_user);
     
            $.ajax({
                url: "../scripts_ajax_php/moteur_autocompletion.php",
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
                            // $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img src=\"../img/pp.jpg\"><p class='p_liste_user'>"+dataType[i][1]+"</p></div>")
                            $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img class='img_avatar_chat' src=\"../img/"+dataType[i][5]+"\"><p class='p_liste_user'>"+dataType[i][1]+"</p></div>")
        
                        }
                        else if(dataType[i]["connecte"] == 1)
                        {
                            // $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img src=\"../img/pp.jpg\"><p class='p_liste_user connecte'>"+dataType[i][1]+"</p></div>")
                            $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img class='img_avatar_chat' src=\"../img/"+dataType[i][5]+"\"><p class='p_liste_user connecte'>"+dataType[i][1]+"</p></div>")
        
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