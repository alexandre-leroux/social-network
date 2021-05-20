// var mail = document.getElementById("mail") ; 

// mail.addEventListener("keyup", function (e){

//     var email = mail.value ;
//     console.log(email); 

//     $.ajax({

//         type: "POST",
//         url: "../scripts_ajax_php/verif_inscription.php",
//         data: {mail: email},
//         dataType: "json",
//         success: function (response) {
//             if(response.message === "nope"){
//                 mail.setAttribute("style", "border: 2px solid red;") ;
//             } 
//             else {
//                 mail.setAttribute("style", "border: 2px solid green;") ;
//             }
//         }
//     });
// })

function verifInscriptionReg(regex, p, input) {
    if(regex.test(input))
    {
        p.setAttribute("style" , "color : green") ; 
    }
    else{
        p.setAttribute("style" , "color : red") ; 
    }
}

var mdp = document.getElementById("mdp") ; 
var mail = document.getElementById("mail") ;
var condition = document.getElementById("condition_mpd"); 

mdp.addEventListener("focus", function(e){

    condition.setAttribute("style" ,"display: block;") ; 

}); 

mdp.addEventListener("blur" , function(e){
    condition.setAttribute("style" ,"display: none;") ; 
})

mail.addEventListener("keyup", (e) => {

    var input_mail = mail.value; 
    var r_mail = new RegExp('[a-z,A-Z,0-9]@laplateforme.io$') ; 

    verifInscriptionReg(r_mail, mail, input_mail); 
   
})

mdp.addEventListener("keyup", function (e){

    var input_mpd = mdp.value ;
    
    var nb_char = document.getElementById("nb_char") ; 
    var maj = document.getElementById("maj") ;
    var char_spe = document.getElementById("char_spe"); 
    var number = document.getElementById("number"); 
    
    
    var r_maj = new RegExp('[A-Z]') ; 
    var r_number = new RegExp('[0-9]') ;
    var r_char_spe = new RegExp('\\W') ; 

    console.log(r_maj.test(input_mpd)) ; 

    if(input_mpd.length >= 8)
    {
        nb_char.setAttribute("style" , "color : green") ; 
    }
    else{
        nb_char.setAttribute("style" , "color : red") ; 
    }

    verifInscriptionReg(r_maj, maj,input_mpd) ; 
    
    verifInscriptionReg(r_number, number, input_mpd ) ; 

    verifInscriptionReg(r_char_spe, char_spe, input_mpd); 

});

var list_hobbies = document.getElementById("list_hobbies"); 

var btn_hobbies = document.getElementById("btn_hobbies"); 

btn_hobbies.addEventListener("click" , function(e){

    e.preventDefault();

    var hobbies = document.getElementById("input_hobbies").value ;

    if(hobbies == ""){
        alert("Veuillez définir un hobbie") ; 
    }
    else{

        let li = document.createElement("li"); 
    
        li.append(hobbies); 
        
        list_hobbies.append(li); 
    
        li.insertAdjacentHTML('beforeend', '<i class="fa fa-times-circle"></i>');
        
        document.getElementById("input_hobbies").value = "" ; 

    }
    

})



