



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
                    $('#users_list').append("<div class=\"users\"><img src=\"img/pp.jpg\"><p class='p_liste_user'>"+dataType[i][1]+"</p></div>")
                }
                else if(dataType[i]["connecte"] == 1)
                {
                    $('#users_list').append("<div class=\"users\"><img src=\"img/pp.jpg\"><p class='p_liste_user connecte'>"+dataType[i][1]+"</p></div>")
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

setInterval( chekxUserConnecte, 5000)


function eventsurclick(){


        utilisateurs = document.getElementsByClassName("users");

       
        for(i = 0; i<utilisateurs.length; i++)
        {
            // console.log(utilisateurs[i].lastChild)
            let node = utilisateurs[i].lastChild.innerHTML
            // console.log(node)

            let pseudo =  utilisateurs[i].lastChild.innerHTML

            utilisateurs[i].addEventListener('click', function(){
                console.log(pseudo)
                $.ajax({
                    url: "scripts_ajax_php/chat_prive.php",
                    type: "POST",
                    data: {  "pseudo":pseudo,  },

                    dataType: "JSON",

                  
                    success : function(dataType){
            
                        console.log(dataType.data1)
                        console.log(dataType.data2)
                        parent = document.getElementById('user_selection_chat')
                        // console.log(parent)
                        var p = document.createElement("p");
                        p.innerHTML =  dataType.data1[1]
                        parent.innerHTML = ""
                        parent.appendChild(p);
                    
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

setTimeout(eventsurclick, 20)

setInterval( eventsurclick, 5020)

