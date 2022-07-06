function validatetheForm(){
    var isValid = true;
    var myForm = document.forms["Login"];
    var username = myForm["username"];
    var password = myForm["password"];
var required1="<b>User Name: *Required</b>";
var required2="<b>Password: *Required</b>";
if(username.value === ""){
    var usernameLabel = document.getElementById("usernameLabel");
    usernameLabel.style.color = "Red";
    usernameLabel.innerHTML = required1;
    isValid = false;
}
if(password.value === ""){
    var passwordLabel = document.getElementById("passwordLabel");
    passwordLabel.style.color = "Red";
    passwordLabel.innerHTML = required2;
    isValid = false;
}
return isValid;
}
