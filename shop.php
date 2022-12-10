<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

require './DAOClasses/itemDAO.php';
require './Classes/item.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHARPSIDE</title>
</head>
<body>

    <header>
        <h1>SHARPSIDE</h1>
        <div><a href="./index.php">HOME</a></div>
        <div><a href="./lookbook.php">BROWSE</a></div>
        <div><a href="./about.php">ABOUT</a></div>
        <div><a href="./contact.php">CONTACT</a></div>
    </header>

    <div>
        <form method="post">
            <button name="All" type="submit" value="1">All</button>
            <button name="European" type="submit" value="1">European</button>
            <button name="Japanese" type="submit" value="2">Japanese</button>
            <button name="Chinese" type="submit" value="3">Chinese</button>
            <button name="Middle-Eastern" type="submit" value="4">Middle-Eastern</button>
        </form> 
    </div>

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

    while($row = $resultItems->fetch_assoc()) {
        $item = new Item($row);
        echo $item->displayItem();
    }

    ?>


    
</body>
</html>