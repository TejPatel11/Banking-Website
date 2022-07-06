<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$fnameErr = $lnameErr = $addressErr = $cityErr = $stateErr = $zipErr = $socialSecurityErr = $phoneErr = $emailErr = "";
$fname = $lname = $address = $city = $state = $zip = $socialSecurity = $phone = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
      $fnameErr = "*First name is required";
    } else {
      $fname = test_input($_POST["fname"]);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["lname"])) {
        $lnameErr = "*Last name is required";
    } else {
        $lname = test_input($_POST["lname"]);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["address"])) {
        $addressErr = "*Address is required";
    } else {
        $address = test_input($_POST["address"]);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["city"])) {
        $cityErr = "*City is required";
     } else {
         $city = test_input($_POST["city"]);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["state"])) {
        $stateErr = "*State is required";
     } else {
         $state = test_input($_POST["state"]);
    }
}
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["zip"])) {
         $zipErr = "*Zip code is required";
    } else {
         $zip = test_input($_POST["zip"]);
    }
 }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["SocialSecurity"])) {
        $socialSecurityErr = "*Social Security number is required";
    } else {
         $socialSecurity = test_input($_POST["socialSecurity"]);
     }
 }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["phone"])) {
        $phoneErr = "*Phone number is required";
    } else {
        $phone = test_input($_POST["phone"]);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "*Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }   
?>

<body>
        <nav id="" class="">
        <script defer src="signup.js"></script>
        </nav>
                <main>
                    <div>
                    <div id="error"></div>
                    <p><span class="error"></span></p>
                    <form action="signUp.php"  onsubmit="return validateForm()" method="post" enctype="multipart/form-data" name="signUp" id="signUp">
                    <label for="fname" id="fnameLabel">First Name:</label>
                        <span class="error"><?php echo $fnameErr;?></span><br>
                        <input type="text" name="fname" id="fname" placeholder="First Name" ><br> 
                    <label for="lname" id="lnameLabel">Last Name: </label>
                        <span class="error"><?php echo $lnameErr;?></span><br>
                        <input type="text" name="lname" id="lname" placeholder="Last Name"><br>
                   <label for="address" id="addressLabel">Address:</label>
                        <span class="error"><?php echo $addressErr;?></span><br>
                        <input type="text" name="address" id="address" placeholder="123Long City Drive"><br>
                    <label for="City" id="cityLabel">City:</label>
                        <span class="error"><?php echo $cityErr;?></span><br>
                        <input type="text" name="city" id="city" placeholder="Scranton"><br>
                    <label for="state" id="stateLabel">State:</label>
                        <span class="error"><?php echo $stateErr;?></span><br>
                        <input type="text" name="state" id="state" placeholder="Pennsylvania"><br>
                    <label for="zip" id="zipLabel">Zip Code:</label>
                        <span class="error"><?php echo $zipErr;?></span><br>
                        <input type="number" name="zip" id="zip" placeholder="12345"><br>
                    <label for="socialSecurity" id="socialLabel">Social Securtiy Number:</label>
                        <span class="error"><?php echo $socialSecurityErr;?></span><br>
                        <input type="password" name="socialSecurity" id="socialSecurity" placeholder="123-45-6789"><br>
                    <label for="phone" id="phoneNumber">Phone: </label>
                        <span class="error"><?php echo $phoneErr;?></span><br>
                        <input type="tel" name="phone" id="phone" placeholder="123-456-7890"><br>
                    <label for="email" id="emailLabel">Email:</label>
                        <span class="error"><?php echo $emailErr;?></span><br>
                        <input type="email" name="email" id="email" placeholder="email@gmail.com" ><br>
                        <br>
    
                        <input type="submit" value="submit">
                        </form>
                    </div>
                </main>
    </body>

    </body>
</html>