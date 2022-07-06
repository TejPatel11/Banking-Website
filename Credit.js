function validatetheForm(){
    var myForm = document.forms["Credit"];
    var firstName = myForm["firstName"];
    var lastName = myForm["lastName"];
    var address = myForm["address"];
    var zip = myForm["zip"];
    var socialSecurity = myForm["socialSecurity"];
    var phoneNumber = myForm["phoneNumber"];
    var Credit = myForm["Credit"];

        var required1="<b>First Name: *required</b>";
        var required2="<b>Last Name: *Required</b>";
        var required3="<b>Address: *Required</b>";
        var required4="<b>Zip Code: *Required</b>";
        var required5="<b>Social Security Number: *Required</b>";
        var required6="<b>Phone Number: *Required</b>";
        var required7="<b>Credit Score: *Required</b>";

            var isValid = new Boolean(true);
                if(firstName.value === ""){
                    var firstNameLabel = document.getElementById("firstNameLabel");
                    firstNameLabel.style.color = "Red";
                    firstNameLabel.innerHTML = required1;
                    isValid = false;
                }
                if(lastName.value === ""){
                    var lastNameLabel = document.getElementById("lastNameLabel");
                    lastNameLabel.style.color = "Red";
                    lastNameLabel.innerHTML = required2;
                    isValid = false;
                }
                if(address.value === ""){
                    var addressLabel = document.getElementById("addressLabel");
                    addressLabel.style.color = "Red";
                    addressLabel.innerHTML = required3;
                    isValid = false;
                }
                if(zip.value === ""){
                    var zipLabel = document.getElementById("zipLabel");
                    zipLabel.style.color = "Red";
                    zipLabel.innerHTML = required4;
                    isValid = false;
                }
                if(socialSecurity.value === ""){
                    var socialSecurityLabel = document.getElementById("socialSecurityLabel");
                    socialSecurityLabel.style.color = "Red";
                    socialSecurityLabel.innerHTML = required5;
                    isValid = false;
                }
                if(phoneNumber.value === ""){
                    var phoneNumberLabel = document.getElementById("phoneNumberLabel");
                    phoneNumberLabel.style.color = "Red";
                    phoneNumberLabel.innerHTML = required6;
                    isValid = false;
                }
                if(Credit.value === ""){
                    var CreditLabel = document.getElementById("CreditLabel");
                    CreditLabel.style.color = "Red";
                    CreditLabel.innerHTML = required7;
                    isValid = false;
                }

                return isValid;
}