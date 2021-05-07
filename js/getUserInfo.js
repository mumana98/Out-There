$( document ).ready(function() {
    ObtainUserInfo()
})

function ObtainUserInfo(){
    var ajaxRequest;

    ajaxRequest = new XMLHttpRequest();

    var userInfo = ""

    ajaxRequest.onreadystatechange = function () {
        if (ajaxRequest.readyState == 4) {
            userInfo = ajaxRequest.responseText;
            console.log(userInfo)
        }
    }

    ajaxRequest.open("GET", "../backend/getUserInfo.php", true);
    ajaxRequest.send(null);
}