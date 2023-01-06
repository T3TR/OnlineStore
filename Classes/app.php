<?php

require_once './Classes/user.php';
require_once './Classes/cart.php';

if(isset($_SESSION["userID"])){
    $user = new User($_SESSION["userID"]);
    $cart = new Cart($_SESSION["userID"]);
    $_SESSION['inCart'] = $cart->inCart();
}