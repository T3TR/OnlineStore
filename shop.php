<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

require_once './DAOClasses/itemDAO.php';
require_once './Classes/item.php';
require_once './Classes/app.php';
require_once './Classes/user.php';

if(isset($_POST['logout'])){
    User::logout();
    header("Location: login.php");
}
if(isset($_POST['login'])){
    header("Location: login.php");
}

if(isset($_POST["addToCart"])){

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHARPSIDE-Shop</title>

    <link rel="stylesheet" href="./css/stylesheet.css">
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
            <li><a href="./index.php"><button class="button-84">HOME</button></a></li>
            <li><a href="./lookbook.php"><button class="button-84">BROWSE</button></a></li>
            <li><a href="./about.php"><button class="button-84">ABOUT</button></a></li>
            <li><a href="./contact.php"><button class="button-84">CONTACT</button></a></li>
            <li><a href="./cart.php"><button class="button-84">CART</button></a></li>
        </ul>
    </header>

    <div class="filter">
        <form method="post">
            <button name="All" type="submit">All</button>
            <button name="European" type="submit" value="1">European</button>
            <button name="Japanese" type="submit" value="2">Japanese</button>
            <button name="Chinese" type="submit" value="3">Chinese</button>
            <button name="Middle-Eastern" type="submit" value="4">Middle-Eastern</button>
        </form> 
    </div>

    <div class="cards">

        <ul class="cardsList">
        <?php
        if(isset($_POST["European"])){

            $origin = $_POST["European"];

            $resultItems = ItemDAO::getItemsByOrigin($origin);
        }
        elseif(isset($_POST["Japanese"])){

            $origin = $_POST["Japanese"];

            $resultItems = ItemDAO::getItemsByOrigin($origin);
        }
        elseif(isset($_POST["Chinese"])){

            $origin = $_POST["Chinese"];

            $resultItems = ItemDAO::getItemsByOrigin($origin);
        }
        elseif(isset($_POST["Middle-Eastern"])){

            $origin = $_POST["Middle-Eastern"];

            $resultItems = ItemDAO::getItemsByOrigin($origin);
        }
        elseif(isset($_POST["All"])){
            $resultItems = ItemDAO::getAllItems();
        }
        else{
            $resultItems = ItemDAO::getAllItems();
        }

        while($row = $resultItems->fetch_assoc()) {
            $item = new Item($row);
            echo $item->displayItem();
        }
        ?>
        </ul>
    </div>





    
</body>
</html>