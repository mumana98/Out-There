var input = document.getElementById("myInput");

$( document ).ready(function() {
    checkLogin()
})

$(document).on("keypress", function(e){
    if(e.which == 13){
        e.preventDefault();
        $(input).click();
    }
    else {
        return true;
    }
})


$(document).on('click', '.save', function (e) {
    e.preventDefault();
    var classList = this.className.split(' ')
    var c = classList[2]
    var data = $("." + c)
    var dataObj = {}
    data.each(function(idx){
        dataObj[idx] = $( this ).text()
    })
    console.log(dataObj)
    putData(dataObj)
});

function putData(data) {
    var ajaxRequest; 

    ajaxRequest = new XMLHttpRequest();

    ajaxRequest.onreadystatechange = function () {
        if (ajaxRequest.readyState == 4) {
            alert("Opportunity saved!");
            console.log(ajaxRequest.responseText);
        }
    }

    var queryString = "?Title=" + data[0];
    queryString +=  "&Organization=" + data[1] + "&Location=" + data[2] + "&InPerson=" + data[3] + "&Date=" + data[4] + "&Description=" + data[5];

    ajaxRequest.open("GET", "../backend/opportunity.php" + queryString, true);
    ajaxRequest.send(null);
}
  

function getData() {
    var ajaxRequest;  // The variable that makes Ajax possible!

    ajaxRequest = new XMLHttpRequest();

    // Create a function that will receive data sent from the server and will update
    // the div section in the same page.

    ajaxRequest.onreadystatechange = function () {
        if (ajaxRequest.readyState == 4) {
            var ajaxDisplay = document.getElementById('ajaxDiv');
            ajaxDisplay.innerHTML = ajaxRequest.responseText;
        }
    }

    var searchTerm = document.getElementById('searchTerm').value;
    var queryString = "?searchTerm=" + searchTerm;

    ajaxRequest.open("POST", "../backend/retrieveData.php" + queryString, true);
    ajaxRequest.send(null);
}
 
function checkLogin() {
    var ajaxRequest;

    ajaxRequest = new XMLHttpRequest();

    ajaxRequest.onreadystatechange = function () {
        if (ajaxRequest.readyState == 4) {
            if(ajaxRequest.responseText != "LOGGED IN"){
                header("Location: ../pages/login.html");
            }
        }
    }

    ajaxRequest.open("GET", "../backend/checkLogin.php", true);
    ajaxRequest.send(null);
    

}