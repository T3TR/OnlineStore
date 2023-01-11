<?php  

error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

require_once './Classes/app.php';
require_once './Classes/user.php';
require_once './DAOClasses/itemDAO.php';
require_once './Classes/item.php';

if(isset($_POST['logout'])){
    User::logout();
    header("Location: login.php");
}
if(isset($_POST['login'])){
    header("Location: login.php");
}

if(isset($_POST["addToCart"])){

    if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){

        Cart::addToCart($_SESSION['userID'], $_POST['addToCart']);
        header("Location: index.php");


    }
    else{
        header("Location: login.php");
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHARPSIDE-Home</title>

    <link rel="stylesheet" href="./css/stylesheet.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/shopItems.css">

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
            <li><a href="./shop.php"><button class="button-84">SHOP</button></a></li>
            <li><a href="./lookbook.php"><button class="button-84">BROWSE</button></a></li>
            <li><a href="./about.php"><button class="button-84">ABOUT</button></a></li>
            <li><a href="./contact.php"><button class="button-84">CONTACT</button></a></li>
            <? if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true): ?>
                <li><a href="./cart.php"><button class="button-84">CART (<?php echo $_SESSION['inCart'] ?>)</button></a></li>
            <? else: ?>
                <li><a href="./cart.php"><button class="button-84">CART</button></a></li>
            <? endif; ?>
        </ul>
    </header>

    <div class="banner">
        <img class="bannerIMG" src="./images/heroBannner.png" alt="Banner">
    </div>

    
    <div class="section">
        <h1 class="sectionTitle">RECENT ADDITIONS</h1>

        <div class="cards">
            <ul class="cardsList">
                <?php
                $recentAdditions = ItemDAO::recentlyAdded();

                while($row = $recentAdditions->fetch_assoc()) {
                    $item = new Item($row);
                    echo $item->displayItem();
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="section">
        <h1 class="sectionTitle">FEATURED</h1>
        <div class="cards">
            <ul class="cardsList">
                <?php
                $featured = ItemDAO::featuredItem();

                while($row = $featured->fetch_assoc()) {
                    $item = new Item($row);
                    echo $item->displayItem();
                }
                ?>
            </ul>
        </div>
    </div>
    
</body>
</html>