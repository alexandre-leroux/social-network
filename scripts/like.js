var btn_like = document.querySelectorAll(".btn_like") ; 

                        
                        
for(var i = 0 ; i < btn_like.length ; i++){

    var id_post = btn_like[i].parentElement.parentElement.parentElement.dataset.id ; 

    (function(i){
        $.ajax({
            type: "POST",
            url: "scripts_ajax_php/check_like.php",
            data: {post_id: id_post},
            dataType: "JSON",
            success:function(response){
                if(response.msg == "true")
                {
                    console.log(i)
                    btn_like[i].setAttribute("style" , "color : blue; ") ;
                }
                else if(response.msg == "false")
                {
                    console.log(i)
                    btn_like[i].setAttribute("style" , "color: rgb(250, 95, 90);") ;
                } 
            }
        });
    })(i);
}


// like dislike 

for(var i = 0 ; i < btn_like.length ; i++)
{
    btn_like[i].addEventListener("click" , (e) => {

        var compteur_like = e.target.parentElement.nextElementSibling ;
        let nb_like = Number(compteur_like.innerText) ; 

        let id = e.target.parentElement.parentElement.parentElement.dataset.id ;

        if(e.target.getAttribute("style") == "color: rgb(250, 95, 90);")
        {
            compteur_like.innerHTML = nb_like + 1 ;  
    
            e.target.setAttribute("style" , "color : blue; ") ;

            $.ajax({
                type: "POST",
                url: "scripts_ajax_php/ajout_like.php",
                data: {post: id},
                dataType: "text",
                success: function (response) {

                    console.log("ajout en bdd si tout vas bien") ;
                }
            });
        }
        else{

            compteur_like.innerHTML = nb_like - 1 ;  
    
            e.target.setAttribute("style" , "color: rgb(250, 95, 90);") ;

            $.ajax({
                type: "POST",
                url: "scripts_ajax_php/delete_like.php",
                data: {post: id},
                dataType: "text",
                success: function (response) {
                    $("body").append(response) ; 
                    
                }
            });
        }

    })
}

// fin like dislike 