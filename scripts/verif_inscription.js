var mail = document.getElementById("mail") ; 

mail.addEventListener("keyup", function (e){

    var email = mail.value ;
    console.log(email); 

    $.ajax({

        type: "POST",
        url: "../scripts_ajax_php/verif_inscription.php",
        data: {mail: email},
        dataType: "json",
        success: function (response) {
            if(response.message === "nope"){
                mail.setAttribute("style", "border: 2px solid red;") ;
            } 
            else {
                mail.setAttribute("style", "border: 2px solid green;") ;
            }
        }
    });
    
})

var mdp = document.getElementById("mdp") ; 
var condition = document.getElementById("condition_mpd"); 

mdp.hasFocus(); 

if(mdp.focus() == true)
{
    console.log("yo"); 
    condition.setAttribute("style" ,"display: block;") ; 
}
else{
    condition.setAttribute("style" ,"display: none;") ; 
}

mdp.addEventListener("keyup", function (e){

    

})
