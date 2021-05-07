//this js is responsible for changing the login link to the profile link when logged in

$( document ).ready(function() {
    ajaxFunction()
})

function ajaxFunction() {
    var ajaxRequest;

    ajaxRequest = new XMLHttpRequest();
    var path = window.location.pathname;
    var page = path.split("/").pop();
    //console.log(page)

    ajaxRequest.onreadystatechange = function () {
        if (ajaxRequest.readyState == 4) {
            if(ajaxRequest.responseText == "LOGGED IN"){
                $("#login").html("")
                $("#login").addClass("far fa-user-circle")
            }
        }
    }
    // var loginCheck = document.getElementById('login').value;
    // var queryString = "?loginCheck=" + loginCheck;
    if(page == "index.html"){
        ajaxRequest.open("GET", "./backend/checkLogin.php", true);
        ajaxRequest.send(null);
    }
    else{
        ajaxRequest.open("GET", "../backend/checkLogin.php", true);
        ajaxRequest.send(null);
    }

}