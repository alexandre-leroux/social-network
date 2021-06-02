var btn = document.querySelectorAll(".button_comment") ; 
console.log(btn.length)

//console.log(bloc); 

// ajoute une venement sur tout les boutons commentaires -> deplie la div au click

for(var i = 0 ; i < btn.length ; i++)
{
    btn[i].addEventListener("click", function(e){
        var bloc = e.target.parentElement.parentElement.parentElement.lastChild.previousElementSibling; 
        var bloc_parent = bloc.parentElement ; 
        var id = bloc_parent.dataset.id ; 

        $.ajax({
            type: "POST",
            url: "scripts_ajax_php/get_last_comment.php",
            data: {id: id},
            dataType: "text",
            success: function (response) {
                e.target.parentElement.parentElement.nextElementSibling.firstElementChild.innerHTML = response ; 
            }
        });
        
        attr = bloc.getAttribute("style") ; 
        if(attr === "display: none;"){
            bloc.setAttribute("style" , "display: block;"); 
        }
        else{
            bloc.setAttribute("style" , "display: none;");
        }
    })
}

// ajoute un evenement sur tout les boutons ajouter un com -> push le nouveau commentaire dans la div parent 

var btn_add_comment = document.querySelectorAll(".input_ajout_comment") ;

console.log(btn_add_comment); 

for(var i = 0 ; i < btn_add_comment.length ; i++)
{
    btn_add_comment[i].addEventListener("click", (e) => {

        var input = e.target.previousElementSibling.value ; 

        var article = e.target.parentElement.parentElement.parentElement.firstElementChild.parentElement.parentElement; 

        var post_id = article.dataset.id ;

        console.log("le bloc" ,article)
        console.log("son id" ,post_id)

        
        // var des_commentaire = document.getElementsByClassName(".text_commentaire").innerText ; 
        
        $.ajax({
            type: "POST",
            url: "scripts_ajax_php/add_comment.php",
            data: {description: input, post_id: post_id},
            dataType: "json",
            success: function (response) {

                console.log("la rep", response)
            
                var div = document.createElement("div"); 
                div.classList.add("comment") ;
        
                div.innerHTML = '<div id="description_comment"><p class="bold" id="user_commentaire">' + response.prenom + '</p><p id="text_commentaire">' + input +'</p></div><div id="img_comment"><img src="img/pp.jpg" alt="#"></div>';
        
                var parent = e.target.parentElement.parentElement.parentElement.firstElementChild;
        
                parent.append(div); 
        
                e.target.previousElementSibling.value = "";  
            },

            error: function (request, status, error) {
                alert("Veuillez vous connecter pour poster un commentaire") ; 
            }
            
        });

    })
}

// search bar permettant de créer un nouveau post 

var input_new_post = document.getElementById("input_text") ; 
var choix_img = document.getElementsByClassName("choix_image"); 

input_new_post.addEventListener("focus" , function (e){
    // var attribut = choix_img.getAttribute("style") ; 
    choix_img[0].setAttribute("style" , "display: flex;"); 
  
})

var input_files = document.getElementById("choix_image") ; 
var i = document.getElementById("pictures_post") ; 

i.addEventListener("click" , function (e){
    input_files.click(); 
})

input_new_post.addEventListener("blur" , function (e){
    // var attribut = choix_img.getAttribute("style") ; 
    setTimeout( function(){
        choix_img[0].setAttribute("style" , "display: none;"); 
    }, 3000); 
  
})

