$( document ).ready(function() {
    ajaxFunction()
})

function ajaxFunction() {
    var ajaxRequest;

    ajaxRequest = new XMLHttpRequest();
    var path = window.location.pathname;
    console.log(path)

    ajaxRequest.onreadystatechange = function () {
        if (ajaxRequest.readyState == 4) {
            if(ajaxRequest.responseText == "LOGGED IN"){
                $("#login").html("")
                $("#login").addClass("fas fa-user-circle")
            }
        }
    }
    var loginCheck = document.getElementById('login').value;
    var queryString = "?loginCheck=" + loginCheck;

    ajaxRequest.open("GET", "../backend/checkLogin.php" + queryString, true);
    ajaxRequest.send(null);
}