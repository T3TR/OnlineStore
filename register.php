<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

require_once './Classes/user.php';

if(isset($_POST["register"])){

    $reg_result = User::register($_POST["name"], $_POST["email"], $_POST["password"]);

    if($reg_result == ""){
        header("Location: login.php");
    }
    else{
        echo $reg_result;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHARPSIDE-Register</title>

    <link rel="stylesheet" href="./css/register.css">

</head>
<body>

    <div class="registerForm">
        <form action="register.php" method="post">
            <img class="logo" src="./images/Logo.png" alt="SHARPSIDE">
            <h1>Name</h1>
            <input name="name" type="text" placeholder="Enter Your Name" required>
            <h1>Email</h1>
            <input name="email" type="email" placeholder="Enter Your Email" required>
            <h1>Password</h1>
            <input name="password" type="password" placeholder="Enter Your Password" required>
            <button name="register" class="button-59" type="submit">Register</button>
            <p class="login">Already have an account? <a href="./login.php">Login!</a></p>
        </form>
    </div>
    
</body>
</html>