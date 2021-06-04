var btn_like = document.querySelectorAll(".btn_like") ; 

for(var i = 0 ; i < btn_like.length ; i++)
{
    btn_like[i].addEventListener("click" , (e) => {

        var compteur_like = e.target.parentElement.nextElementSibling ;
        let nb_like = Number(compteur_like.innerText) ; 

        if(e.target.getAttribute("style") == "color: rgb(250, 95, 90);")
        {
            compteur_like.innerHTML = nb_like + 1 ;  
    
            e.target.setAttribute("style" , "color : blue; ") ;
        }
        else{
            compteur_like.innerHTML = nb_like - 1 ;  
    
            e.target.setAttribute("style" , "color: rgb(250, 95, 90);") ;
        }

    })
}