$( document ).ready(function() {
    populateSaves()
})

function populateSaves(){
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

    ajaxRequest.open("GET", "../backend/profile.php", true);
    ajaxRequest.send(null);
}