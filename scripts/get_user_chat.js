parent2 = document.getElementById('conteneur_des_messages')
parent2.innerHTML = "" 

// console.log("get user chat")
$.ajax({
    url: "../scripts_ajax_php/chat_prive.php",
    type: "POST",
    data: {  "pseudo":pseudo_get,  },
    dataType: "JSON",
  
    success : function(dataType){

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