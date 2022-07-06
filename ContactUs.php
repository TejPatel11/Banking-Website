<?php
define('DB_SERVER','localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'chat');


$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if($conn == false){
    die('Error: Cannot connect');
}

$username = $phone = $email =  $comment = "";
$username_err = $phone_err  = $email_err = $comment_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

  if(empty(trim($_POST["username"]))){
    $username_err = "User name cannot be blank";
}
  else{
    $sql = "SELECT id FROM inquiry WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
      if($stmt)
      {
         mysqli_stmt_bind_param($stmt, "s", $param_username);
         $param_username = trim($_POST['username']);
        
         if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            
        }
        else{
            echo "Something went wrong";
        }
    }
}

if(empty(trim($_POST['username']))){
    $username_err = "User Name cannot be blank";
}

else{
    $username = trim($_POST['username']);
}

if(empty(trim($_POST['email']))){
    $email_err = "Email cannot be blank";
}

else{
    $email = trim($_POST['email']);
}
if(empty(trim($_POST['phone']))){
    $phone_err = "Phone cannot be blank";
}

else{
    $phone = trim($_POST['phone']);
}

if(empty(trim($_POST['comment']))){
  $comment_err = "Comment cannot be blank";
}

else{
  $comment = trim($_POST['comment']);
}



if(empty($username_err) && empty($email_err) && empty($phone_err) && empty($comment_err))
{
    $sql = "INSERT INTO inquiry (username, email, phone, comment) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_email, $param_phone, $param_comment);

        $param_username = $username;
        $param_email=$email;
        $param_phone = $phone;
        $param_comment = $comment;
        
        
        if (mysqli_stmt_execute($stmt))
        {
            header("location: Information.php");
        }
        else{
            echo "Something went wrong cannot redirect.";
        }    
    }

  
    mysqli_stmt_close($stmt);
  
mysqli_close($conn);
  } 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <meta charset="utf-8">
</head>
<link rel="stylesheet" href="styleSheet.css">
<script src="contact.js"></script>
  </head>
  <body>
    <header>
        <a href="HomePage.php">
        <img class="logo" src="Image/American_Bank.png" alt="Logo of the bank">
        </a>
      </header>
    <hr>
    <br>
    <nav>
      <ol>
    <div class="menudown">
      <li><a href="#">Menu</a></li>
      <div class="menudown-content">
      <a href="DigitalBanking.php">Digital Banking</a>
      <a href="DepositRate.php">Deposit Rate</a>
      <a href="AboutUs.php">About Us</a>
      </div>
      </div>
      <li><a href="Login.php">Login</a> </li>
      <li><a href="Register.php">Register</a></li>
        <div class="quickdown">
          <li><a href="#">Quick Links</a></li>
            <div class="quickdown-content">
              <a href="Loan.php">Apply for Loan</a>
              <a href="Credit.php">Credit Card</a>

            </div>
        </div>
        <li><a href="ContactUs.php">Contact Us</a></li>
        <li><a href="signIn.php">Login For Live Chat</a></li>
        </ol>

    </nav>
    </body><br><br><br><br><hr>
<h1 class="under">Contact Us</h1>
<h2>Please press Login For Live Chat button in order to do live chat.</h2>
<form action="" onsubmit="return submissionForm()" enctype="multipart/form-data" method="post" name="Contact" id="Contact">

            <label for="username" id="usernameLabel">Username: </label>
            <input type="text"  name="username" id="username" placeholder="Enter your name: ">

            <label for="email" id="emailLabel">Email: </label>
            <input type="email" name="email" id="email" placeholder="Enter your email address: ">

            <label for="phone" id="phoneLabel">Phone: </label>
            <input type="tel" name="phone" id="phone" placeholder="Enter your phone number: ">

            <label for="comment" id="commentLabel">Comments: </label>
            <textarea id="comment" name="comment" rows="2" cols="20" placeholder="Enter your comments/concerns: "></textarea>
            <button type="submit" value="submit" id="submit">Submit</button>
</form>

    <div id="container2">
    <span>
        To contact us, please reach out through one of the contacts below.<br><br>
        Visit us in-person at:<br>
        2300 Adams Ave<br>
        Scranton, PA 18509<br><br>
        Email us at:<br>
        <a href="www.somedomain.com">www.somedomain.com</a><br><br>
        Call us at:<br>
        (570)222-2222
    </span>
</div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
   
</body>
<footer class="footer" id="pgFooter">
        <div class="CUcolor">Contact Us:<br>
            <a href="tel:5706584586">Call: 5706584586</a> <br>
             <a href="tel:8888693857">Toll Free: 888-869-3857</a><br>
             <a href="mailto:customerserive@ab.com">customerserive@ab.com</a>
</footer>
        </div>
</html>