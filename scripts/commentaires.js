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