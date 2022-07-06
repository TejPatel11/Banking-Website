<?php
define('DB_SERVER','localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'chat');


$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if($conn == false){
    die('Error: Cannot connect');
}
error_reporting(0);
$Firstname = $Lastname = $address =  $city = $state = $zip = $ssnumber = $phone = $creditscore = "";
$Firstname_err = $Lastname_err  = $address_err = $city_err = $state_err = $zip_err = $ssnumber_err = $phone_err = $creditscore_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
if(empty(trim($_POST["Firstname"]))){
    $Firstname_err = "First name cannot be blank";
}
else{
    $sql = "SELECT id FROM loanqualification WHERE Firstname = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt)
    {
        mysqli_stmt_bind_param($stmt, "s", $param_Firstname);

        $param_Firstname = trim($_POST['Firstname']);
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
        }
        else{
            echo "Something went wrong";
        }
    }
}

if(empty(trim($_POST['Firstname']))){
    $Firstname_err = "First Name cannot be blank";
}

else{
    $Firstname = trim($_POST['Firstname']);
}

if(empty(trim($_POST['Lastname']))){
    $Lastname_err = "Last Name cannot be blank";
}

else{
    $Lastname = trim($_POST['Lastname']);
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

if(empty(trim($_POST['ssnumber']))){
    $ssnumber_err = "Social security cannot be blank";
}

else{
    $ssnumber = trim($_POST['ssnumber']);
}
if(empty(trim($_POST['phone']))){
    $phone_err = "Phone number cannot be blank";
}

else{
    $phone = trim($_POST['phone']);
}

if(empty(trim($_POST['creditscore']))){
    $creditscore_err = "Credit Score cannot be blank";
}

else{
    $creditscore = trim($_POST['creditscore']);
}

if(empty($Fristname_err) && empty($Lastname_err) && empty($address_err) && empty($city_err) && empty($state_err) && empty($zip_error) && empty($ssnumber_err) && empty ($phone_err) && empty($creditscore_err))
{
    $sql = "INSERT INTO loanqualifications (Firstname, Lastname, address, city, state, zip, ssnumber, phone, creditscore) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sssssssss", $param_Firstname, $param_Lastname, $param_address, $param_city, $param_state, $param_zip, $param_ssnumber, $param_phone, $param_creditscore);

        
        $param_Firstname = $Firstname;
        $param_Lastname=$Lastname;
        $param_address = $address;
        $param_city = $city;
        $param_state = $state;
        $param_zip = $zip;
        $param_ssnumber = $ssnumber;
        $param_phone = $phone;
        $param_creditscore = $creditscore;
        
        if (mysqli_stmt_execute($stmt))
        {
          
        if($creditscore<400){
          echo '<h1 class="loan">You do not qualify for the loan. </h1>';
        }
        else if($creditscore>=400 && $creditscore<600){
          echo '<h1 class="loan">You qualify for loan with intrest rate 5%. </h1>';
        }
        else if ($creditscore>=600 && $creditscore <700){
          echo '<h1 class="loan">You qualify for loan with intrest rate 3%. </h1>';
        }
        else if($creditscore>=700 && $creditscore<=850){
          echo '<h1 class="loan">You qualify for the loan with intrest rate 1%.</h1>';
        }
        else{
          echo '<h1 class="loan">Enter a valid number !</h1>';
        }
        
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
<title>Quick Links</title>
<script src="Script.js"></script>
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
      <li><a href="Register.php">Register</a> &nbsp; </li>
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
<body>
    <h2>Apply for loan</h2>
    <h3>Loan Products</h3>
    <p>Since 1905, American Bank has been a trusted financial partner in providing lending solutions to meet your unique needs. 
       Our loan products are competitively priced and have flexible terms to assist you in attaining your short and long-term goals. 
       Our community banking approach provides for local decision making and easy access to our banking professionals.
       Please call or stop by one of our branch offices for rates and additional information</p>
    
    <h3>We offer a wide range of loans</h3>
        <ul>
            <li>New Automobile Loan</li>
            <li>Used Automobile Loan</li>
            <li>Personal Term Loan</li>
            <li>Secured Saving Loan</li>
            <li>House Loan</li>
            <li>Medical Loan</li>
        </ul>
       <main>
           <div>Please fill the following data to know if you qualify for any loans.</div>
        <br>
           <div>
            <form action="" onsubmit="return validatemyForm()"  method="post" enctype="multipart/form-data" name="Loan" id="Loan">
                <label for="Firstname" id="fnameLabel">Firstname:</label>
                    <input type="text" name="Firstname" id="Firstname" placeholder="First Name">
                    <span class="error"><?php echo $Firstname_err;?></span><br><br>
                <label for="Lastname" id="lnameLabel">Lastname: </label>
                    <input type="text" name="Lastname" id="Lastname" placeholder="Last Name">
                    <span class="error"><?php echo $Lastname_err;?></span><br><br>
               <label for="address" id="addressLabel">Address:</label>
                    <input type="text" name="address" id="address" placeholder="123Long City Drive">
                    <span class="error"><?php echo $address_err;?></span><br><br>
                <label for="city" id="cityLabel">City:</label>
                    <input type="text" name="city" id="city" placeholder="Scranton">
                    <span class="error"><?php echo $city_err;?></span><br><br>
                <label for="state" id="stateLabel">State:</label>
                    <input type="text" name="state" id="state" placeholder="Pennsylvania">
                    <span class="error"><?php echo $state_err;?></span><br><br>
                <label for="zip" id="zipLabel">Zip Code:</label>
                    <input type="text" name="zip" id="zip" placeholder="12345">
                    <span class="error"><?php echo $zip_err;?></span><br><br>
                <label for="ssnumber" id="socialLabel">Social Securtiy Number:</label>
                    <input type="password" name="ssnumber" id="ssnumber" placeholder="123-45-6789">
                    <span class="error"><?php echo $ssnumber_err;?></span><br><br>
                <label for="phone" id="phoneNumberLabel">Phone: </label>
                    <input type="tel" name="phone" id="phone" placeholder="123-456-7890">
                    <span class="error"><?php echo $phone_err;?></span><br><br>
                <label for="creditscore" id="creditLabel">Credit Score:</label>
                    <input type="text" name="creditscore" id="creditscore" placeholder="800">
                    <span class="error"><?php echo $creditscore_err;?></span><br><br>
                    <br>
                    
                    <button type="submit">Submit</button>
            </form>
            </div>
            </main>
  </body>
            <footer class="footer" id="pgFooter">
            <div class="CUcolor">Contact Us:<br>
            <a href="tel:5706584586">Call: 5706584586</a> <br>
             <a href="tel:8888693857">Toll Free: 888-869-3857</a><br>
             <a href="mailto:customerserive@ab.com">customerserive@ab.com</a>
             </div>
            </footer>
</html>