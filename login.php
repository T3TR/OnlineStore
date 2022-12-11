<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

require_once './Classes/user.php';

if(isset($_SESSION["congrats"])){
    echo $_SESSION["congrats"];
    unset($_SESSION["congrats"]);
}

if(isset($_POST["login"])){

    User::login($_POST["email"], $_POST["password"]);

    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHARPSIDE-Login</title>

    <link rel="stylesheet" href="./css/login.css">

</head>
<body>

    
    <div class="loginForm">
        <form action="login.php" method="post">
            <img class="logo" src="./images/Logo.png" alt="SHARPSIDE">
            <h1>Email</h1>
            <input name="email" type="email" placeholder="Enter Your Email" required>
            <h1>Password</h1>
            <input name="password" type="password" placeholder="Enter Your Password" required>
            <button name="login" class="button-59" type="submit">Login</button>
            <p class="register">Don't have an accout? <a href="./register.php">Register here!</a></p>
        </form>
    </div>

    <?php

    //echo $_POST["password"];

    ?>
    
</body>
</html>