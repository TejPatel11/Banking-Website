<?php
error_reporting(0);
session_start();

 
if(isset($_SESSION['username']))
{
    header("location: index.php");
    exit;
}
define('DB_SERVER','localhost');
define('DB_USERNAME', 'austin');
define('DB_PASSWORD', 'localhost123');
define('DB_NAME', 'chat');


$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if($conn == false){
    die('Error: Cannot connect');
}

$username = $password = "";
$username_err = $password_err = "";


if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])))
    {
        $username_err = "Please enter username ";
    }
    else{
        $username = trim($_POST['username']);
        
    }

    if(empty(trim($_POST['password']))){
      $password_err = "Password cannot be blank";
  }
  
  else{
      $password = trim($_POST['password']);
  }
 

if(empty($username_err) && empty($password_err))
{
    $sql = "SELECT user_id, username, password FROM login WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
     
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $user_id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["user_id"] = $user_id;
                            $_SESSION["loggedin"] = true;

                                  header('location: index.php');
                          }

                        }
                        else 
                        {
                          $password_err = "Enter correct Password ";
                        }
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
        <title>Login</title>
        <script src="LoginScript.js"></script>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styleSheet.css">
    </head>
      <h1  class="under" class="flexBox">Login </h1>
  <body>
  <div id="wrapper">
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
      
         <main>
             
              <form action=""  onsubmit="return validatetheForm()"  method="post" enctype="multipart/form-data" name="Login" id="Login">
                    <label for="username" id="usernameLabel">User Name:</label>
                    <input type="text" name="username" id="username" placeholder="User Name" >
                    <span class="error"><?php echo $username_err;?></span><br><br>
                    <label for="password" id="passwordLabel">Password: </label>
                    <input type="password" name="password" id="password" placeholder="Password">
                    <span class="error"><?php echo $password_err;?></span><br><br>
                    <button type="submit" value="submit" id="submit">Submit</button>
					<a href="Registration.php">Register</a>
              </form>
            </div>
          </main>
  </div>
  </body>
 
</html>