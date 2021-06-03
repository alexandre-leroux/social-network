console.log("get groupe")


parent2 = document.getElementById('conteneur_des_messages')
parent2.innerHTML = ""
console.log(pseudo_get)
console.log(groupe_get)
$.ajax({
url: "../scripts_ajax_php/messages_chat_groupe.php",
type: "POST",
data: {  "nom_du_groupe":groupe_get  },
dataType: "json",

success : function(dataType){

        // console.log(dataType)  
        parent = document.getElementById('user_selection_chat')
        var p = document.createElement("p");
        p.setAttribute('name', 'groupe');
        p.innerHTML = groupe_get
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

