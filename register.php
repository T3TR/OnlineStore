<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

require './DAOClasses/userDAO.php';

if(isset($_POST["register"])){

    $_SESSION["name"] = $_POST["name"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["password"] = $_POST["password"];
    $_SESSION["congrats"] = "You've successfully registered your account, please login.";

    UserDAO::register($_POST["name"], $_POST["email"], $_POST["password"]);

    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHARPSIDE-Register</title>
</head>
<body>

    <div>
        <form action="register.php" method="post">
            <input name="name" type="text" placeholder="Enter Your Name">
            <input name="email" type="email" placeholder="Enter Your Email">
            <input name="password" type="password" placeholder="Enter Your Password">
            <button name="register" type="submit">Register</button>
        </form>
    </div>
    
</body>
</html>