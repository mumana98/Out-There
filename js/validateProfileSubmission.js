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
    var fn = document.getElementById('firstname').value
    var ln = document.getElementById('lastname').value
    var em = document.getElementById('email').value
    var st = document.getElementById('state').value
    var ct = document.getElementById('city').value

    if(username == ""){window.alert("Missing Field"); return}
    if(pw == ""){window.alert("Missing Field"); return}
    if(fn == ""){window.alert("Missing Field"); return}
    if(ln == ""){window.alert("Missing Field"); return}
    if(em == ""){window.alert("Missing Field"); return}
    if(st == ""){window.alert("Missing Field"); return}
    if(ct == ""){window.alert("Missing Field"); return}

    var firstLetter = username.charAt(0);

    if(username.length < 6 || username.length > 10){
        window.alert("Invalid username or password")
        return
    }
    else if(!alphanumeric(username)){
        window.alert("Invalid username or password")
        return 
    }
    else if(!isNaN(firstLetter)){
        window.alert("Invalid username or password")
        return 
    }
    else if(pw !== rpw){
        window.alert("Invalid username or password")
        return 
    }
    else if(pw.length < 6 || pw.length > 10){
        window.alert("Invalid username or password")
        return
    }
    else if(!alphanumeric(pw)){
        window.alert("Invalid username or password")
        return 
    }
    else if(!hasLowerCase(pw)){
        window.alert("Invalid username or password")
        return 
    }
    else if(!hasUpperCase(pw)){
        window.alert("Invalid username or password")
        return 
    }
    else if(!hasDigit(pw)){
        window.alert("Invalid username or password")
        return 
    }
    else{
        window.alert("User Validated!")
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
            if(ajaxRequest.responseText == "OK"){
                window.location.replace("./search.html");    
            }
            else{
                var ajaxDisplay = document.getElementById('ajaxDiv');
                ajaxDisplay.innerHTML = ajaxRequest.responseText;
            }
        }
    }

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var email = document.getElementById('email').value;
    var city = document.getElementById('city').value;
    var state = document.getElementById('state').value;

    var queryString = "?username=" + username;

    queryString +=  "&password=" + password + "&firstname=" + firstname + "&lastname=" + lastname + "&email=" + email + "&city=" + city + "&state=" + state;

    ajaxRequest.open("POST", "../backend/register.php" + queryString, true);
    ajaxRequest.send(null);
}