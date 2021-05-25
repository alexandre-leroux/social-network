displayUser()
checkUsersConnect()
setInterval(checkUsersConnect, 10000)
setTimeout(eventsurclick, 20)

checkNewMessage()
setInterval(checkNewMessage, 4000)
setInterval(refreshAffichegaNewMessages, 500)
setInterval(messageLuSiFenetreChatEstSurUser, 500)


function displayUser(){

    $.ajax({
        url: "model/search_all_user.php",
        type: "POST",
       
        dataType: "json",
      
        success : function(dataType){


            var count = Object.keys(dataType).length;
            // console.log(count);
            // console.log(dataType);

            $('#users_list').empty();

            let i = 0;
            while ( i < count)
            {

                if(dataType[i]["connecte"] == 0)
                {
                    $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img src=\"img/pp.jpg\"><p class='p_liste_user'>"+dataType[i][1]+"</p></div>")
                }
                else if(dataType[i]["connecte"] == 1)
                {
                    $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img src=\"img/pp.jpg\"><p class='p_liste_user connecte'>"+dataType[i][1]+"</p></div>")
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
        url: "model/search_all_user.php",
        type: "POST",
        dataType: "json",
      
        success : function(dataType){

            var count = Object.keys(dataType).length;
            // console.log(count);

            utilisateurs = document.getElementsByClassName("users");

            let i = 0;
            while ( i < count)
            {
                // console.log(utilisateurs[i].lastChild)
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









function eventsurclick(){


     utilisateurs = document.getElementsByClassName("users");

   
    for(i = 0; i<utilisateurs.length; i++)
    {
        // console.log(utilisateurs[i].lastChild)
        // let node = utilisateurs[i].lastChild.innerHTML
        // console.log(node)

        let pseudo =  utilisateurs[i].lastChild.innerHTML

        utilisateurs[i].addEventListener('click', function(e){

            // console.log(pseudo)
            parent2 = document.getElementById('conteneur_des_messages')
            parent2.innerHTML = "" 

            $.ajax({
                url: "scripts_ajax_php/chat_prive.php",
                type: "POST",
                data: {  "pseudo":pseudo,  },
                dataType: "JSON",
              
                success : function(dataType){
        
                    // console.log(dataType.data1)
                    // console.log(dataType.data2)
                    parent = document.getElementById('user_selection_chat')
                    // console.log(parent)
                    var p = document.createElement("p");
                    p.innerHTML =  dataType.data1[1]
                    parent.innerHTML = ""
                    parent.appendChild(p);

                    var mess = document.createElement("p");
                    // console.log(dataType.data2.length)

                    for (z=0; z<dataType.data2.length; z++)
                    {
                        console.log('dans foir')
                        parent2 = document.getElementById('conteneur_des_messages')
                        var mess = document.createElement("p");
                         contenur_mess = dataType.data2[z][4]
                         mess.innerHTML = contenur_mess
                         parent2.appendChild(mess);
                    }
                
                
                },
            
                error: function (request, status, error) {
                    // console.log(request.responseText);
                },
            
                complete : function(resultat, statut){
                    // console.log(resultat);
                    // console.log(statut);
                }
        
        
            })

            // console.log(e)
            // console.log(pseudo)
            // console.log(utilisateurs[i])
            $.ajax({
                url: "scripts_ajax_php/update_message_lu.php",
                type: "POST",
                data: {  "pseudo":pseudo,  },
                // dataType: "text",
              
                success : function(dataType){
                    // console.log(dataType) 
                    // console.log(utilisateurs)
                 
                },
            
                error: function (request, status, error) {
                    // console.log(request.responseText);
                },
            
                complete : function(resultat, statut){
                    // console.log(resultat);
                    // console.log(statut);
                }
        
        
            })
        })
    }



}



function checkNewMessage(){




    $.ajax({
        url: "scripts_ajax_php/chat_prive_new_message.php",
        type: "POST",
        // data: {  "pseudo":pseudo,  },
        dataType: "json",
      
        success : function(dataType){

            // console.log(dataType.length)
            // console.log(dataType)

            utilisateurs = document.querySelectorAll(".users")
            // console.log(utilisateurs)

            for(i=0; i<utilisateurs.length; i++ )
            {
                let attribut = utilisateurs[i].getAttribute("id")
                // console.log(attribut)

                for(x=0;  x<dataType.length; x++)
                {
                    // console.log(dataType[x]['fk_id_auteur_message'])
                    // console.log(dataType[x]['non_lu'])

                    if( dataType[x]['fk_id_auteur_message'] == attribut && dataType[x]['non_lu'] == 1)
                    {
                        console.log('jai trouve un user dans if')
                        // console.log(utilisateurs[i])
                        utilisateurs[i].classList.add("new_message");
                        break
                    }
                    else
                    {
                        // console.log('dans else')

                        utilisateurs[i].setAttribute('class', 'users');
                    }
                }

            }
        
        },
    
        error: function (request, status, error) {
            // console.log(request.responseText);
        },
    
        complete : function(resultat, statut){
            // console.log(resultat);
            // console.log(statut);
        }


    })

}


envoyer_message = document.getElementById('button_envoyer_message')

envoyer_message.addEventListener('click', function(){

    message = document.getElementById('input_messages').value

    destinataire = document.querySelector('#user_selection_chat p').innerHTML

    
    $.ajax({
        url: "scripts_ajax_php/chat_prive_add_message.php",
        type: "POST",
        data: {   
                    "message":message, 
                    "destinataire":destinataire, },

        dataType: "text",
      
        success : function(dataType){


            console.log(dataType);
        
        },
    
        error: function (request, status, error) {
            console.log(request.responseText);
        },
    
        complete : function(resultat, statut){
            // console.log(resultat);
            // console.log(statut);
        }


    })


    console.log(message)
    console.log(destinataire)
    document.getElementById('input_messages').value = ""

})


document.addEventListener('keyup', function(e){
    console.log(e)

    if (e.code == 'Enter' && document.getElementById('input_messages').value != "")
    {

        message = document.getElementById('input_messages').value

        destinataire = document.querySelector('#user_selection_chat p').innerHTML
    
        
        $.ajax({
            url: "scripts_ajax_php/chat_prive_add_message.php",
            type: "POST",
            data: {   
                        "message":message, 
                        "destinataire":destinataire, },
    
            dataType: "text",
          
            success : function(dataType){
    
    
                console.log(dataType);
            
            },
        
            error: function (request, status, error) {
                console.log(request.responseText);
            },
        
            complete : function(resultat, statut){
                // console.log(resultat);
                // console.log(statut);
            }
    
    
        })
    
    
        console.log(message)
        console.log(destinataire)
        document.getElementById('input_messages').value = ""
    
    
    }
})



function refreshAffichegaNewMessages(){

    destinataire = document.querySelector('#user_selection_chat p').innerHTML



    $.ajax({
        url: "scripts_ajax_php/chat_prive.php",
        type: "POST",
        data: {  "pseudo":destinataire,  },
        dataType: "JSON",
      
        success : function(dataType){
            parent2 = document.getElementById('conteneur_des_messages').innerHTML = ""
            console.log(dataType)
            // console.log(dataType.data2)
            parent = document.getElementById('user_selection_chat')
            // console.log(parent)
            var p = document.createElement("p");
            p.innerHTML =  dataType.data1[1]
            parent.innerHTML = ""
            parent.appendChild(p);

            var mess = document.createElement("p");
            // console.log(dataType.data2.length)

            for (z=0; z<dataType.data2.length; z++)
            {
                // console.log('dans foir')
                parent2 = document.getElementById('conteneur_des_messages')
                var mess = document.createElement("p");
                 contenur_mess = dataType.data2[z][4]
                 mess.innerHTML = contenur_mess

                 


                 parent2.appendChild(mess);
            }
        
        
        },
    
        error: function (request, status, error) {
            // console.log(request.responseText);
        },
    
        complete : function(resultat, statut){
            // console.log(resultat);
            // console.log(statut);
        }


    })



}



// ---------------------- message lu sur click input


function messageLuSiFenetreChatEstSurUser(){

    pseudo = document.querySelector('#user_selection_chat p').innerHTML

    console.log(pseudo)

    $.ajax({
        url: "scripts_ajax_php/update_message_lu.php",
        type: "POST",
        data: {  "pseudo":pseudo,  },
        // dataType: "text",
      
        success : function(dataType){
            // console.log(dataType) 
            // console.log(utilisateurs)
         
        },
    
        error: function (request, status, error) {
            // console.log(request.responseText);
        },
    
        complete : function(resultat, statut){
            // console.log(resultat);
            // console.log(statut);
        }


    })

}