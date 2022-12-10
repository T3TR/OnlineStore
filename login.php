<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

require './DAOClasses/userDAO.php';

if(isset($_SESSION["congrats"])){
    echo $_SESSION["congrats"];
    unset($_SESSION["congrats"]);
}

if(isset($_POST["login"])){

    UserDAO::login($_POST["email"], $_POST["password"]);

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
</head>
<body>

    
    <div>
        <form action="login.php" method="post">
            <input name="email" type="email" value="<?php $_SESSION["email"] ?>">
            <input name="password" type="password" value="<?php $_SESSION["password"] ?>">
            <button name="login" type="submit">Login</button>
        </form>
    </div>

    <?php

    //echo $_POST["password"];

    ?>
    
</body>
</html>