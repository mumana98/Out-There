var form_el = document.getElementById("form")

form_el.addEventListener("submit", function(evt) {
    evt.preventDefault()
    validate()
})

function validate(){
    var username = document.getElementById('name').value
    var pw = document.getElementById('pw').value
    var rpw = document.getElementById('rpw').value

    var firstLetter =  username.charAt(0);

    if(!username || !pw || !rpw){
        window.alert("Invalid username or password")
        return
    }
    else if(username.length < 6 || username.length > 10){
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
