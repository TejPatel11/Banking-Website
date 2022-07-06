<?php
define('DB_SERVER','localhost');
define('DB_USERNAME', 'austin');
define('DB_PASSWORD', 'localhost123');
define('DB_NAME', 'chat');


$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if($conn == false){
    die('Error: Cannot connect');
}

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT user_id FROM login WHERE username = ?";
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





if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO login (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
       

        
        if (mysqli_stmt_execute($stmt))
        {
            header("location: signIn.php");
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
       <div id="wrapper">
       <h3>Please Register Here For Chat:</h3>
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
    
                         
                          
                          <button type="submit" value="submit" id="submit">Register</button>
                          </form>

                      </div>
                  </main>
</div>
    </body>
</html>