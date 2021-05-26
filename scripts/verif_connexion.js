$("#form_connexion").submit(function(e) {
    e.preventDefault();    

    $(".message_statut").empty() ;

    var mail = document.getElementById("mail").value ; 
    var mdp = document.getElementById("mdp").value ; 

    console.log("mail" , mail); 
    console.log("mdp" , mdp); 

    $.ajax({
        type: "POST",
        url: "../scripts_ajax_php/connexion_user.php",
        data: {mail: mail, mdp: mdp},
        dataType: "json",
        success: function (response) {
   
            $(".message_statut").append(response.message); 
            setTimeout(function(){ window.location.href = '../index.php';}, 1500);
        }
    });
}); 