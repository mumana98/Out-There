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
            userInfo = userInfo.split(" ");
            $("#name").html(userInfo[0] + " " + userInfo[1])
            $("#email").html(userInfo[2])
            $("#city").html(userInfo[3])
            $("#state").html(userInfo[4])
            console.log(userInfo)
        }
    }

    ajaxRequest.open("GET", "../backend/getUserInfo.php", true);
    ajaxRequest.send(null);
}