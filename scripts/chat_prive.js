displayUser()
checkUsersConnect()
setInterval(checkUsersConnect, 10000)
setTimeout(eventsurclick, 20)
setTimeout(clickSurUnGroupe, 40)

checkNewMessage()
setInterval(checkNewMessage, 4000)

// setInterval(refreshMessagesGroupe, 500)
setInterval(refreshAffichegaNewMessages, 1250)

setInterval(messageLuSiFenetreChatEstSurUser, 1000)
setInterval(messageLuSiFenetreChatEstSurGroupe, 1500)
setInterval(checkNewMessageDansGroupe, 1250)

// setTimeout(checkNewMessageDansGroupe, 100)        



function displayUser(){

    $.ajax({
        url: "../scripts_ajax_php/search_all_user.php",
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
                    $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img src=\"../img/pp.jpg\"><p class='p_liste_user'>"+dataType[i][1]+"</p></div>")
                }
                else if(dataType[i]["connecte"] == 1)
                {
                    $('#users_list').append("<div id=\""+dataType[i][0]+"\" class=\"users\"><img src=\"../img/pp.jpg\"><p class='p_liste_user connecte'>"+dataType[i][1]+"</p></div>")
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
    
    $.ajax({
        url: "../scripts_ajax_php/search_all_user.php",
        type: "POST",
        dataType: "json",
      
        success : function(dataType){

            var count = Object.keys(dataType).length;

            utilisateurs = document.getElementsByClassName("users");

            let i = 0;
            while ( i < count)
            {

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

        },
    
        complete : function(resultat, statut){

        }
    
    })
}



function eventsurclick(){

     utilisateurs = document.getElementsByClassName("users");

   
    for(i = 0; i<utilisateurs.length; i++)
    {

        let pseudo =  utilisateurs[i].lastChild.innerHTML

        utilisateurs[i].addEventListener('click', function(e){
            // console.log('ok')

            parent2 = document.getElementById('conteneur_des_messages')
            parent2.innerHTML = "" 

            $.ajax({
                url: "../scripts_ajax_php/chat_prive.php",
                type: "POST",
                data: {  "pseudo":pseudo,  },
                dataType: "JSON",
              
                success : function(dataType){
        
                    parent = document.getElementById('user_selection_chat')
                    var p = document.createElement("p");
                    p.innerHTML =  dataType.data1[1]
                    parent.innerHTML = ""
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


function checkNewMessage(){

    $.ajax({
        url: "../scripts_ajax_php/chat_prive_new_message.php",
        type: "POST",
        dataType: "json",
      
        success : function(dataType){

            utilisateurs = document.querySelectorAll(".users")

            for(i=0; i<utilisateurs.length; i++ )
            {
                let attribut = utilisateurs[i].getAttribute("id")

                for(x=0;  x<dataType.length; x++)
                {

                    if( dataType[x]['fk_id_auteur_message'] == attribut && dataType[x]['non_lu'] == 1)
                    {
                        // console.log('jai trouve un user dans if')
                        utilisateurs[i].classList.add("new_message");
                        break
                    }
                    else
                    {
                        utilisateurs[i].setAttribute('class', 'users');
                    }
                }

            }
        
        },
    
        error: function (request, status, error) {
            console.log(request)
            console.log(status)
            console.log(error)
        },
    
        complete : function(resultat, statut){
        }

    })

}



// -----------------------------------------------envoye le message quand on click sur le bouton envoyer
function envoyerMessage(){
    
    message = document.getElementById('input_messages').value

    destinataire = document.querySelector('#user_selection_chat p').innerHTML
    destinataire_type = document.querySelector('#user_selection_chat p')
    type_detinataire = destinataire_type.getAttribute('name');
    // console.log(destinataire_type)

    if(type_detinataire == 'groupe')
    {
        $.ajax({
            url: "../scripts_ajax_php/chat_groupe_add_new_message.php",
            type: "POST",
            data: {     "message":message, 
                        "destinataire":destinataire, },
    
            dataType: "text",
          
            success : function(dataType){
    
                // console.log(dataType);
            
            },
        
            error: function (request, status, error) {
                // console.log(request.responseText);
            },
        
            complete : function(resultat, statut){
            }
    
    
        })
    }
    else
    {
        console.log('dans else')
        $.ajax({
            url: "../scripts_ajax_php/chat_prive_add_message.php",
            type: "POST",
            data: {     "message":message, 
                        "destinataire":destinataire, },
    
            dataType: "text",
          
            success : function(dataType){
    
                // console.log(dataType);
            
            },
        
            error: function (request, status, error) {
                // console.log(request.responseText);
            },
        
            complete : function(resultat, statut){
            }
    
    
        })

    }
    

    // console.log(message)
    // console.log(destinataire)
    document.getElementById('input_messages').value = ""
}

envoyer_message = document.getElementById('button_envoyer_message')

envoyer_message.addEventListener('click', function(){
    console.log('ok')
    envoyerMessage()
    // console.log(message)
    // console.log(destinataire)
    document.getElementById('input_messages').value = ""

})

// -------------------------------------------------envoye le message quand on appuye sur la touche entrée
document.addEventListener('keyup', function(e){

    if (e.code == 'Enter' && document.getElementById('input_messages').value != "")
    {

        envoyerMessage()
        document.getElementById('input_messages').value = ""
    
    }
})

// ------------------------------------------------------fin de l'envoie des messages

function refreshAffichegaNewMessages(){

    type_de_chat = document.querySelector('#user_selection_chat p')
    chat_groupe = type_de_chat.getAttribute('name');
    // console.log(chat_groupe)
    if(chat_groupe == 'groupe')
    {
        nom_du_groupe = document.querySelector('#user_selection_chat p').innerHTML
        // console.log(nom_du_groupe)



   $.ajax({
       url: "../scripts_ajax_php/messages_chat_groupe.php",
       type: "POST",
       data: {  "nom_du_groupe":nom_du_groupe,  },
       dataType: "json",
     
       success : function(dataType){

                // console.log(dataType)  
                // parent = document.getElementById('user_selection_chat')
                // var p = document.createElement("p");
                // p.setAttribute('name', 'groupe');
                // p.innerHTML = nom_du_groupe
                // parent.innerHTML = ""
                // parent.appendChild(p);
                parent2 = document.getElementById('conteneur_des_messages')
                parent2.innerHTML = ""
                var mess = document.createElement("p");

                for (z=0; z<dataType.length; z++)
                {


                    if(dataType[z][7] == session_prenom_php)
                    {
                        // console.log('dans foir')
                        parent2 = document.getElementById('conteneur_des_messages')
                        var mess = document.createElement("p");
                        mess.className  = "auteur_message_moi"
                         mess.innerHTML =  dataType[z].message
                         parent2.appendChild(mess);
                    }
                    else{

                        // console.log('dans foir')
                        parent2 = document.getElementById('conteneur_des_messages')
                        var mess = document.createElement("p");
                         mess.innerHTML =  "<b> "+dataType[z][7]+"</b> - "+dataType[z].message+"   "
                         parent2.appendChild(mess);
                        
                    }
                }
                       
       
       },
   
       error: function (request, status, error) {
        //    console.log(request)
        //    console.log(status)
        //    console.log(error)
       },
   
       complete : function(resultat, statut){
        //    console.log('ok')
       }


        })
    }
    else
    {

        destinataire = document.querySelector('#user_selection_chat p').innerHTML

        $.ajax({
            url: "../scripts_ajax_php/chat_prive.php",
            type: "POST",
            data: {  "pseudo":destinataire,  },
            dataType: "JSON",
          
            success : function(dataType){
    
                parent2 = document.getElementById('conteneur_des_messages').innerHTML = ""
                parent = document.getElementById('user_selection_chat')
                var p = document.createElement("p");
                p.innerHTML =  dataType.data1[1]
                parent.innerHTML = ""
                parent.appendChild(p);
    
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
            },
        
            complete : function(resultat, statut){
            }
    
        })
    }


}


// ---------------------- message lu quand on est sur l'utilisateur en cours dansle chat, pour pas avoir son pseudo rouge tout le temps

function messageLuSiFenetreChatEstSurUser(){

    pseudo = document.querySelector('#user_selection_chat p').innerHTML

    // console.log(pseudo)

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

}



// ------------------------fonction sur faux boutton creer un groupe

$("#div_like_button_creer_groupe").click(function(){
    $("#liste_user_pour_creer_groupe").toggle();
    
    $.ajax({
        url: "../scripts_ajax_php/search_all_user.php",
        type: "POST",
        dataType: "json",
      
        success : function(dataType){

            var count = Object.keys(dataType).length;

            $('#liste_user_pour_creer_groupe').empty();

            let i = 0;
            while ( i < count)
            {
                $('#liste_user_pour_creer_groupe').append("<p id=\""+dataType[i][0]+"\" class=\"liste_pseudo_groupe\">"+dataType[i][1]+"</p>")
                  i++
            }
               
            $('#liste_user_pour_creer_groupe').append("<input class='animate__animated ' placeholder='nom du groupe' id='nom_du_groupe'>")
            $('#liste_user_pour_creer_groupe').append("<button id='boutton_creer_groupe'>créer</button>")
        },
    
        error: function (request, status, error) {
            // console.log(request.responseText);
        },
    
        complete : function(resultat, statut){
 
        }
    
    })
        setTimeout(listeUserGroupe, 50)
        setTimeout(creerGroupe, 50)
    
  });

/*  lancement de la fonction à l'ouverture de la page car le toogle est
 display par defaut, cause héritage css d'une autre div*/
  function toogleGroupe(){
    $("#liste_user_pour_creer_groupe").toggle();
  }
  toogleGroupe()


// --------------------------------------fonction sur click - selection des users pour créer groupe

function listeUserGroupe(){

    user_pour_groupe = document.getElementsByClassName('liste_pseudo_groupe')
    // console.log(user_pour_groupe)
    for(i = 0; i<user_pour_groupe.length; i++)
    {
        user_pour_groupe[i].addEventListener('click', function(){
            // console.log("ok")
       
                $(this).toggleClass("creer_groupe_green");
            
        })
    
    }

}

// ----------------------------------fonction creer le groupe
function creerGroupe(){
    boutton_creer = document.getElementById('boutton_creer_groupe')

    boutton_creer.addEventListener('click', function(){
    
        choix_user_groupe = document.getElementsByClassName('creer_groupe_green')
        array_users = []

        for(i=0; i<choix_user_groupe.length; i++)
        {
            array_users.push(choix_user_groupe[i].innerHTML)
        }
        nom_groupe = document.getElementById('nom_du_groupe')
        // console.log(nom_groupe.value.length)

        if(nom_groupe.value.length == 0)
        {
            input = document.getElementById('nom_du_groupe')
            input.classList.add("animate__shakeX");

        }
        else{
            nom_groupe = document.getElementById('nom_du_groupe').value
            // console.log(array_users)


        $.ajax({
            url: "../scripts_ajax_php/creation_groupe_chat.php",
            type: "POST",
            data: {"donnees":array_users,
                    "nom_groupe":nom_groupe},
            dataType: "html",
        
            success : function(dataType){

                // console.log(dataType)
                document.location.reload();
            },
        
            error: function (request, status, error) {
                // console.log(request.responseText);
            },
        
            complete : function(resultat, statut){
    
            }
        
        })

        }

    })

}



// fonction sur click d'un groupe, pour afficher les messages

function clickSurUnGroupe(){

    groupes = document.getElementsByClassName("liste_groupes");
    // nom_groupes = document.querySelectorAll(" .nom_du_groupe p");

        for(i = 0; i<groupes.length; i++)
        {  
            // console.log(groupes[i])
            var nom_groupes = document.querySelectorAll(" .nom_du_groupe p");
            let first = nom_groupes[i]
            // console.log(first)

            groupes[i].addEventListener('click', function(e){
    console.log('groupe')
    console.log(groupes)
               
                nom_du_groupe = first.innerHTML
                console.log(nom_du_groupe)

                parent2 = document.getElementById('conteneur_des_messages')
                parent2.innerHTML = ""

           $.ajax({
               url: "../scripts_ajax_php/messages_chat_groupe.php",
               type: "POST",
               data: {  "nom_du_groupe":nom_du_groupe  },
               dataType: "json",
             
               success : function(dataType){
       
                        // console.log(dataType)  
                        parent = document.getElementById('user_selection_chat')
                        var p = document.createElement("p");
                        p.setAttribute('name', 'groupe');
                        p.innerHTML = nom_du_groupe
                        parent.innerHTML = ""
                        parent.appendChild(p);
    
                        var mess = document.createElement("p");
    
                        for (z=0; z<dataType.length; z++)
                        {


                            if(dataType[z][7] == session_prenom_php)
                            {
                                // console.log('dans foir')
                                parent2 = document.getElementById('conteneur_des_messages')
                                var mess = document.createElement("p");
                                mess.className  = "auteur_message_moi"
                                 mess.innerHTML =  dataType[z].message
                                 parent2.appendChild(mess);
                            }
                            else{

                                // console.log('dans foir')
                                parent2 = document.getElementById('conteneur_des_messages')
                                var mess = document.createElement("p");
                                 mess.innerHTML =  "<b> "+dataType[z][7]+"</b> - "+dataType[z].message+"   "
                                 parent2.appendChild(mess);
                                
                            }
                        }
                               
               
               },
           
               error: function (request, status, error) {
                //    console.log(request)
                //    console.log(status)
                //    console.log(error)
               },
           
               complete : function(resultat, statut){
                //    console.log('ok')
               }
       
       
                })

              })}}




function refreshMessagesGroupe(){

            var nom_groupe = document.querySelector(" #user_selection_chat p").innerHTML;
            // let first = nom_groupes[i]
            // console.log(first)


               
                // nom_du_groupe = first.innerHTML
                // console.log(nom_groupe)

                parent2 = document.getElementById('conteneur_des_messages')
                parent2.innerHTML = ""

           $.ajax({
               url: "../scripts_ajax_php/messages_chat_groupe.php",
               type: "POST",
               data: {  "nom_du_groupe":nom_groupe,  },
               dataType: "json",
             
               success : function(dataType){
       
                        // console.log(dataType)  
                        parent = document.getElementById('user_selection_chat')
                        var p = document.createElement("p");
                        p.setAttribute('name', 'groupe');
                        p.innerHTML = nom_du_groupe
                        parent.innerHTML = ""
                        parent.appendChild(p);
    
                        var mess = document.createElement("p");
    
                        for (z=0; z<dataType.length; z++)
                        {


                            if(dataType[z][7] == session_prenom_php)
                            {
                                // console.log('dans foir')
                                parent2 = document.getElementById('conteneur_des_messages')
                                var mess = document.createElement("p");
                                mess.className  = "auteur_message_moi"
                                 mess.innerHTML =  dataType[z].message
                                 parent2.appendChild(mess);
                            }
                            else{

                                // console.log('dans foir')
                                parent2 = document.getElementById('conteneur_des_messages')
                                var mess = document.createElement("p");
                                 mess.innerHTML =  "<b> "+dataType[z][7]+"</b> - "+dataType[z].message+"   "
                                 parent2.appendChild(mess);
                                
                            }
                        }
                               
               
               },
           
               error: function (request, status, error) {
                //    console.log(request)
                //    console.log(status)
                //    console.log(error)
               },
           
               complete : function(resultat, statut){
                //    console.log('ok')
               }
       
       
                })
        }

   
    

// ---------------------------------------check si new messages de groupe non lu
function checkNewMessageDansGroupe(){

    $.ajax({
        url: "../scripts_ajax_php/chat_groupe_new_message.php",
        type: "POST",
        dataType: "json",
      
        success : function(dataType){

            // console.log(dataType)

            groupes = document.getElementsByClassName("liste_groupes");
            // nom_groupes = document.querySelectorAll(" .nom_du_groupe p");
            // console.log(groupes)
           
                for(i = 0; i<groupes.length; i++)
                {  
                    // console.log(groupes[i])
                    var nom_groupes = document.querySelectorAll(" .nom_du_groupe p");
                    let nom_du_groupe = nom_groupes[i].innerHTML
                    // console.log(nom_du_groupe)
                    // console.log(dataType[i][5])

                    if(nom_du_groupe == dataType[i][5] && dataType[i].new_message == 1 )
                    {
                        // console.log('hourra')
                        groupes[i].classList.add("new_message");
                    }
                    else
                    {
                        groupes[i].classList.remove("new_message");
                        
                    }
        
                
                       
                    //     nom_du_groupe = first.innerHTML
                    //     console.log(nom_du_groupe)
        
                    //     parent2 = document.getElementById('conteneur_des_messages')
                    //     parent2.innerHTML = ""
                }
        
        },
    
        error: function (request, status, error) {
            // console.log(request)

            // console.log(status)

            // console.log(error)

        },
    
        complete : function(resultat, statut){
        }

    })

}

// --------------------------------------------update les messages de groupe une fois qu'ils sont lus
function messageLuSiFenetreChatEstSurGroupe(){

    groupe = document.querySelector('#user_selection_chat p').innerHTML

    // console.log(groupe)

    $.ajax({
        url: "../scripts_ajax_php/update_message_groupe_lu.php",
        type: "POST",
        data: {  "groupe":groupe  },
        datatype : "html",
      
        success : function(dataType){
            // console.log(dataType)
        },
    
        error: function (request, status, error) {
        },
    
        complete : function(resultat, statut){
        }


    })

}