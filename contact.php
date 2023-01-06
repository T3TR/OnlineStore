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
    <title>SHARPSIDE-Contact</title>

    <link rel="stylesheet" href="./css/stylesheet.css">
    <link rel="stylesheet" href="./css/contact.css">

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
            <li><a href="./about.php"><button class="button-84">ABOUT</button></a></li>
            <? if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true): ?>
                <li><a href="./cart.php"><button class="button-84">CART (<?php echo $_SESSION['inCart'] ?>)</button></a></li>
            <? else: ?>
                <li><a href="./cart.php"><button class="button-84">CART</button></a></li>
            <? endif; ?>
        </ul>
    </header>


    <div class="contact">
        <div class="heading">
            <h1>Contact Us</h1>
        </div>
        <div class="phone">
            <p>Phone: 0210001111</p>
        </div>
        <div class="email">
            <p>Email: contact-us@sharpside.co.za</p>
        </div>
        <div>
            <p>Site URL: localhost/OnlineStore/index.php</p>
        </div>
        <div class="socials">
            <ul class="socialsList">
                <li>Visit our <a href="www.instagram.com">Insta</a>.</li>
                <li>Visit our <a href="www.facebook.com">Facebook</a>.</li>
            </ul>
        </div>
        <div class="map">
            <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=73%20glen%20alpine%20road&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net">google maps websites</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>
        </div>
    </div>
    
</body>
</html>