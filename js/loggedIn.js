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
                $("#login").addClass("far fa-user-circle fa-lg")
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

// function getData() {
//     var ajaxRequest;

//     ajaxRequest = new XMLHttpRequest();

//     ajaxRequest.onreadystatechange = function () {
//       if (ajaxRequest.readyState == 4) {
//         var ajaxDisplay = document.getElementById('ajaxDiv');
//         ajaxDisplay.innerHTML = ajaxRequest.responseText;
//       }
//     }

//     var searchTerm = document.getElementById('searchTerm').value;
//     var queryString = "?searchTerm=" + searchTerm;

//     ajaxRequest.open("POST", "../backend/retrieveData.php" + queryString, true);
//     ajaxRequest.send(null);
// }