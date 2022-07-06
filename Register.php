<?php
define('DB_SERVER','localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'chat');


$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if($conn == false){
    die('Error: Cannot connect');
}

$username = $password = $confirm_password = $address =  $city = $state = $zip = "";
$username_err = $password_err = $confirm_password_err = $address_err = $city_err = $state_err = $zip_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            
            $param_username = trim($_POST['username']);

            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}


if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}
if(empty(trim($_POST['confirm_password']))){
  $confirm_password_err = "Confirm Password cannot be blank";
}

else{
  $confirm_password = trim($_POST['confirm_password']);
}

if(empty(trim($_POST['address']))){
    $address_err = "Address cannot be blank";
}

else{
    $address = trim($_POST['address']);
}

if(empty(trim($_POST['city']))){
  $city_err = "City cannot be blank";
}

else{
  $city = trim($_POST['city']);
}

if(empty(trim($_POST['state']))){
  $state_err = "State cannot be blank";
}

else{
  $state = trim($_POST['state']);
}

if(empty(trim($_POST['zip']))){
  $zip_err = "zip cannot be blank";
}

else{
  $zip = trim($_POST['zip']);
}



if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($address_err) && empty($city_err) && empty($state_err) && empty($zip_error))
{
    $sql = "INSERT INTO users (username, password, address, city, state, zip) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_password, $param_address, $param_city, $param_state, $param_zip);

        
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        $param_address = $address;
        $param_city = $city;
        $param_state = $state;
        $param_zip = $zip;

        
        if (mysqli_stmt_execute($stmt))
        {
            header("location: Login.php");
        }
        else{
            echo "Something went wrong cannot redirect.";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Register</title>
    <script src= "signup.js"></script>
    <link rel="stylesheet" href="styleSheet.css">
    <meta charset="utf-8">
  </head>
      <body>
          <header>
              <a href="HomePage.php">
              <img class="logo" src="Image/American_Bank.png" alt="Logo of the bank">
              </a>
            </header>
        <hr>
        <br>
        <nav >
          <ol>
        <div class="menudown">
          <li><a href="#">Menu</a></li>
          <div class="menudown-content">
          <a href="DigitalBanking.php">Digital Banking</a>
          <a href="DepositRate.php">Deposit Rate</a>
          <a href="AboutUs.php">About Us</a>
          </div>
          </div>
          <li><a href="Login.php">Login</a> &nbsp; </li>
            <div class="quickdown">
              <li><a href="#">Quick Links</a></li>
                <div class="quickdown-content">
                  <a href="Loan.php">Apply for Loan</a>
                  <a href="Credit.php">Credit Card</a>
            
                </div>
            </div>
            <li><a href="ContactUs.php">Contact Us</a></li> 
          </ol>
       
        </nav>
        </body><br><br><br><br><hr>
        <h1  class="under" class="flexBox">Register for your account. </h1>
    <body>
       
        
       <div id="wrapper">
       <h3>Please Register Here:</h3>
                <main>
                          <form action="" onsubmit="return validateForm()" method="post" enctype="multipart/form-data" name="Register" id="Register">
  
                          <label for="username" id="usernameLabel">Username: </label>
                          <input type="text"  name="username" id="username"  placeholder="Enter Username given by bank">
                          <span class="error"><?php echo $username_err;?></span><br><br>
    
                          <label for="password" id="passwordLabel">Password: </label>
                          <input type="password"  name ="password" id="password" placeholder="Password">
                          <span class="error"><?php echo $password_err;?></span><br><br>
  
                          <label for="confirm_password" id="confirmpasswordLabel">Confirm Password: </label>
                          <input type="password"  name ="confirm_password" id="confirm_password" placeholder= "Confirm Password">
                          <span class="error"><?php echo $confirm_password_err;?></span><br><br>
    
                          <label for="address" id="addressLabel">Address: </label>
                          <input type="text"  name="address" id="address" placeholder="Address">
                          <span class="error"><?php echo $address_err;?></span><br><br>

                          <label for="city" id="cityLabel">City: </label>
                          <input type="text" name="city" id="city" placeholder="City">
                          <span class="error"><?php echo $city_err;?></span><br><br>

    
                          <label for="state" id="stateLabel">State: </label>
                          <input type="text"  name ="state" id="state" placeholder="State">
                          <span class="error"><?php echo $state_err;?></span><br><br>
                          
                          <label for="zip" id="zipLabel">Zip: </label>
                          <input type="text" name="zip" id="zip" placeholder="Zip Code">
                          <span class="error"><?php echo $zip_err;?></span><br><br>
                          
                          <button type="submit" value="submit" id="submit">Register</button>
                          </form>

                      
                  </main>
    </div>
    </body>
    <footer class="footer" id="pgFooter">
        <div class="CUcolor">Contact Us:<br>
            <a href="tel:5706584586">Call: 5706584586</a> <br>
             <a href="tel:8888693857">Toll Free: 888-869-3857</a><br>
             <a href="mailto:customerserive@ab.com">customerserive@ab.com</a>
        </div>
    </footer>
</html>