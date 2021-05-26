var btn = document.querySelectorAll(".button_comment") ; 
console.log(btn.length)


//console.log(bloc); 

for(var i = 0 ; i < btn.length ; i++)
{
    btn[i].addEventListener("click", function(e){
        var bloc = e.target.parentElement.parentElement.parentElement.lastChild.previousElementSibling; 
    
        attr = bloc.getAttribute("style") ; 
        if(attr === "display: none;"){
            bloc.setAttribute("style" , "display: block;"); 
        }
        else{
            bloc.setAttribute("style" , "display: none;");
        }
    })
}

var btn_add_comment = document.querySelectorAll(".input_ajout_comment") ;

console.log(btn_add_comment); 

for(var i = 0 ; i < btn_add_comment.length ; i++)
{
    btn_add_comment[i].addEventListener("click", (e) => {
        var input = e.target.previousElementSibling.value ; 

        var div = document.createElement("div"); 
        div.classList.add("comment") ;

        div.innerHTML = '<div id="description_comment"><p class="bold"> Nom de la personne</p>' + input +'</p></div><div id="img_comment"><img src="img/pp.jpg" alt="#"></div>';

        var parent = e.target.parentElement.parentElement.parentElement.firstElementChild; 

        parent.append(div); 
        

    })
}