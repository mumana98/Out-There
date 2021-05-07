var input = document.getElementById("myInput");

$(document).on("keypress", function(e){
    if(e.which == 13){
        e.preventDefault();
        $(input).click();
    }
    else {
        return true;
    }
})

$('.save').on('click', function (e) {
    e.preventDefault();
    console.log("clicked")
    var classList = this.className.split(' ')
    var c = classList[2]
    console.log(c)
});
  

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