$( document ).ready(function() {
    ajaxFunction()
})

function ajaxFunction() {
    var ajaxRequest;

    ajaxRequest = new XMLHttpRequest();

    ajaxRequest.onreadystatechange = function () {
        if (ajaxRequest.readyState == 4) {
            if(ajaxRequest.responseText == "LOGGED IN"){
                $("#login").html("")
                $("#login").addClass("fas fa-user-circle")
            }
        }
    }

    ajaxRequest.open("POST", "../backend/checkLogin.php", true);
    ajaxRequest.send(null);
}