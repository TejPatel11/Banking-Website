function validateForm(){
    var isValid = true;
    var myForm = document.forms["Register"];
    var username = myForm["username"];
    var password = myForm["password"];
    var confirm_password = myForm["confirm_password"];
    var address = myForm["address"];
    var city = myForm["city"];
    var state = myForm["state"];
    var zip = myForm["zip"];
    
   
              
        var required1="<b> Username: *Required</b>";
        var required2="<b>Password: *Required</b>";
        var required3="<b>Confirm Password: *Required</b>";
        var required4="<b> Address: *Required</b>";
        var required5="<b>City: *Required</b>";
        var required6="<b>State: *Required</b>";
        var required7="<b>Zip: *Required</b>";
        
       

            
                if (username.value === ""){
                    var usernameLabel = document.getElementById("usernameLabel");
                    usernameLabel.style.color = "Red";
                    usernameLabel.innerHTML =  required1;
                    isValid = false;
                }
                if (password.value === ""){
                    var passwordLabel = document.getElementById("passwordLabel");
                    passwordLabel.style.color = "Red";
                    passwordLabel.innerHTML =  required2;
                    isValid = false;
                }
                if(confirm_password.value ===""){
                    var confirmpasswordLabel = document.getElementById("confirmpasswordLabel");
                    confirmpasswordLabel.style.color = "Red";
                    confirmpasswordLabel.innerHTML = required3;
                    isValid = false;
                }
                if(address.value === ""){
                    var addressLabel = document.getElementById("addressLabel");
                    addressLabel.style.color = "Red";
                    addressLabel.innerHTML = required4;
                    isValid = false;
                }
                if(city.value === ""){
                    var cityLabel = document.getElementById("cityLabel");
                    cityLabel.style.color = "Red";
                    cityLabel.innerHTML = required5;
                    isValid = false;
                }
                if(state.value === ""){
                    var stateLabel = document.getElementById("stateLabel");
                    stateLabel.style.color = "Red";
                    stateLabel.innerHTML = required6;
                    isValid = false;
                }
                if(zip.value === ""){
                    var zipLabel = document.getElementById("zipLabel");
                    zipLabel.style.color = "Red";
                    zipLabel.innerHTML = required7;
                    isValid = false;
                }
                
               return isValid;
           
}