var btn = document.getElementById("button_comment") ; 
console.log(btn)
var bloc = document.querySelector(".comment_post") ; 

console.log(bloc); 

btn.addEventListener("click", function(){
    attr = bloc.getAttribute("style") ; 
    if(attr === "display: none;"){
        bloc.setAttribute("style" , "display: block;"); 
    }
    else{
        bloc.setAttribute("style" , "display: none;");
    }
})