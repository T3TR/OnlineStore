<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

require_once './Classes/app.php';
require_once './Classes/user.php';

if(isset($_POST['logout'])){
    User::logout();
    header("Location: login.php");
}
if(isset($_POST['login'])){
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHARPSIDE-About</title>

    <link rel="stylesheet" href="./css/stylesheet.css">

</head>
<body>

    <header>
    <div class="logo-log">
            <div>
                <img src="./images/Logo.png" alt="SHARPSIDE">
                <div class="log-reg">  
                    <form method="post">
                    <? if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true): ?>
                        <a href="login.php"><button name="logout" class="button-59">Logout</button></a>
                    <? else: ?>
                        <a href="login.php"><button name="login" class="button-59">Login</button></a>
                    <? endif; ?>
                    </form>
                </div>
            </div>
        </div>

        <ul class="nav">
            <li><a href="./index.php"><button class="button-84">HOME</button></a></li>
            <li><a href="./shop.php"><button class="button-84">SHOP</button></a></li>
            <li><a href="./lookbook.php"><button class="button-84">BROWSE</button></a></li>
            <li><a href="./contact.php"><button class="button-84">CONTACT</button></a></li>
            <li><a href="./cart.php"><button class="button-84">CART</button></a></li>
        </ul>
    </header>
</body>
</html>