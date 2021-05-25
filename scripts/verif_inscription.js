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

// partie hobbies list + btn delete 

// add hobbies

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

        li.classList.add("list_hobbies") ;
    
        li.append(hobbies); 
        
        list_hobbies.append(li); 
    
        li.insertAdjacentHTML('beforeend', '<i class="fa fa-times-circle croix"></i>');
        
        document.getElementById("input_hobbies").value = "" ; 
    }

    var list = document.querySelectorAll(".list_hobbies");
    var ul = document.getElementById("list_hobbies") ; 

    for(var i = 0 ; typeof(list[i]) != 'undefined' ; i++){
        console.log("dans le for"); 

        var text_list = ul.innerText ;  

        console.log(text_list) ; 

    }
    
    // btn delete
   
    var btn_croix = document.getElementsByClassName('croix'); 
    console.log(btn_croix) ;

    
    for(let i = 0; i < btn_croix.length; i++) {
        btn_croix[i].addEventListener("click", function(e) {

            e.target.parentElement.remove();

            for(var i = 0 ; typeof(list[i]) != 'undefined' ; i++){
                console.log("dans le for"); 
        
                var text_list = ul.innerText ;  
        
                console.log(text_list) ; 
        
            }
        }); 
    }

})

// envoie pour l'inscription en bdd

$("#form_inscription").submit(function(e) {
    e.preventDefault();    

    $(".message_statut").empty() ;
    
    var formData = new FormData(this);
    var text_list = document.getElementById("list_hobbies").innerText.trim() ;
    formData.append('hobbies', text_list);
    
    
    $.ajax({
        url: '../scripts_ajax_php/verif_inscription.php',
        type: 'POST',
        data: formData, 
        datatype: "text",
        success: function (data) {
            // var message = JSON.parse(data) ; 
            // $(".message_statut").append(message.message) ;

            $("body").append(data) ; 
        },

        cache: false,
        contentType: false,
        processData: false
    });
});

// $("#btn_validate").click( function (e){
//     $.ajax({
//         type: "POST",
//         url: "../scripts_ajax_php/verif_inscription.php",
//         data: {hob: text_list},
//         dataType: "json",
//         success: function (response) {
//             console.log(response); 
//         }
//     });
// })



