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
    <link rel="stylesheet" href="./css/about.css">

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
            <? if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true): ?>
                <li><a href="./cart.php"><button class="button-84">CART (<?php echo $_SESSION['inCart'] ?>)</button></a></li>
            <? else: ?>
                <li><a href="./cart.php"><button class="button-84">CART</button></a></li>
            <? endif; ?>
        </ul>
    </header>

    <div class="wrapper">
        <h1 class="aboutTitle">ABOUT</h1>
        <div class="mission">
            <h1>Our Mission</h1>
            <p>We love swords, as such we want to share that love. At Sharpside we made it our mission to give the average Arthur a place they could go and get the hands on one of these beautiful blades with ease!</p>
        </div>
        <div class="business">
            <h1>Our Business</h1>
            <p>With the desire to get swords out en masse, we decided on a lean business plan with low cost and high quality blades. As such we can deal in large quantities with low profit margins per peice. However we make it back in volume of sales.</p>
        </div>
        <div class="team">
            <h1>Our Team</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam nam accusamus repudiandae perspiciatis accusantium, dignissimos possimus, tempore dolore officia delectus nemo laborum cupiditate et quae architecto nisi? Veritatis, ea fugit! lor</p>
        </div>
    </div>

</body>
</html>