<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: Login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
     
    <meta charset="utf-8">
    <link rel=stylesheet href="styleSheet.css">
    <title>PHP login system!</title>
  </head>
<body>
    <header>
        <a href="HomePage.php">
        <img class="logo" src="Image/American_Bank.png" alt="Logo of the bank">
        </a>
      </header>
  
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
    <li><a href="logout.php">Log Out</a> &nbsp;</li>
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
  <br><br><br><br><hr>
  <h1 class="welcome">Login </h1>
  <hr>
  <h3><?php echo "Welcome " . $_SESSION['username']?>. You can now check your account details within 24 hours.</h3>

<hr>
</body>
</html>

