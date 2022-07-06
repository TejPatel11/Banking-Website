function submissionForm(){
    var isValid= true;
    var Form = document.forms["Contact"];
    var username = Form["username"];
    var email = Form["email"];
    var phone = Form["phone"];
    var comment = Form["comment"];
        var required2="<b>Username: *Required</b>";
        var required3="<b>Email: *Required</b>";
        var required4="<b>Phone: *Required</b>";
        var required5="<b>Comments: *Required</b>";

       
        if (username.value === ""){
            var usernameLabel = document.getElementById("usernameLabel");
            usernameLabel.style.color = "Red";
            usernameLabel.innerHTML =  required2;
            isValid = false;
        }
        if (email.value === ""){
            var emailLabel = document.getElementById("emailLabel");
            emailLabel.style.color = "Red";
            emailLabel.innerHTML =  required3;
            isValid = false;
        }
        if (phone.value === ""){
            var phoneLabel = document.getElementById("phoneLabel");
            phoneLabel.style.color = "Red";
            phoneLabel.innerHTML =  required4;
            isValid = false;
        }
        if (comment.value === ""){
            var commentLabel = document.getElementById("commentLabel");
            commentLabel.style.color = "Red";
            commentLabel.innerHTML =  required5;
            isValid = false;
        }

        return isValid;
}

