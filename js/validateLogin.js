$( document ).ready(function() {
    var form_el = document.getElementById("form")

    form_el.addEventListener("submit", function(evt) {
        evt.preventDefault()
        validate()
    })
})

function validate(){
    var username = document.getElementById('username').value
    var pw = document.getElementById('password').value

    var firstLetter = username.charAt(0);

    if(username.length < 6 || username.length > 10){
        window.alert("Username and password must contain: 6-10 characters, at least 1 capital letter, at least 1 lowercase letter, at least 1 digit, and the first character must be a letter.")
        return
    }
    else if(!alphanumeric(username)){
        window.alert("Username and password must contain: 6-10 characters, at least 1 capital letter, at least 1 lowercase letter, at least 1 digit, and the first character must be a letter.")
        return 
    }
    else if(!isNaN(firstLetter)){
        window.alert("Username and password must contain: 6-10 characters, at least 1 capital letter, at least 1 lowercase letter, at least 1 digit, and the first character must be a letter.")
        return 
    }
    else if(pw.length < 6 || pw.length > 10){
        window.alert("Username and password must contain: 6-10 characters, at least 1 capital letter, at least 1 lowercase letter, at least 1 digit, and the first character must be a letter.")
        return
    }
    else if(!alphanumeric(pw)){
        window.alert("Username and password must contain: 6-10 characters, at least 1 capital letter, at least 1 lowercase letter, at least 1 digit, and the first character must be a letter.")
        return 
    }
    else if(!hasLowerCase(pw)){
        window.alert("Username and password must contain: 6-10 characters, at least 1 capital letter, at least 1 lowercase letter, at least 1 digit, and the first character must be a letter.")
        return 
    }
    else if(!hasUpperCase(pw)){
        window.alert("Username and password must contain: 6-10 characters, at least 1 capital letter, at least 1 lowercase letter, at least 1 digit, and the first character must be a letter.")
        return 
    }
    else if(!hasDigit(pw)){
        window.alert("Username and password must contain: 6-10 characters, at least 1 capital letter, at least 1 lowercase letter, at least 1 digit, and the first character must be a letter.")
        return 
    }
    else{
        ajaxFunction()
        return 
    }
}

function alphanumeric(inputtxt){ 
    var letters = /^[0-9a-zA-Z]+$/;
    if(inputtxt.match(letters)){
        return true
    }
    else{
        return false
    }
}

function isCharacterALetter(char) {
    return (/[a-zA-Z]/).test(char)
}

function hasLowerCase(str) {
    return (/[a-z]/.test(str))
}

function hasUpperCase(str) {
    return (/[A-Z]/.test(str))
}

function hasDigit(str) {
    return (/[0-9]/.test(str));
}




function ajaxFunction() {
    var ajaxRequest;  // The variable that makes Ajax possible!

    ajaxRequest = new XMLHttpRequest();

    // Create a function that will receive data sent from the server and will update
    // the div section in the same page.

    ajaxRequest.onreadystatechange = function () {
      if (ajaxRequest.readyState == 4) {
        if (ajaxRequest.responseText == "OK") {
          window.location.replace("./search.html");
        }
        else {
          var ajaxDisplay = document.getElementById('ajaxDiv');
          ajaxDisplay.innerHTML = ajaxRequest.responseText;
        }
      }
    }

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    var queryString = "?username=" + username;

    queryString += "&password=" + password;

    ajaxRequest.open("POST", "../backend/login.php" + queryString, true);
    ajaxRequest.send(null);
  }