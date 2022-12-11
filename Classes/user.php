<?php

require_once './DAOClasses/userDAO.php';

class User{

    private $ID;
    private $name;
    private $email;
    private $password;

    public function __construct($ID){
        $row = UserDAO::getUserByID($ID);
        $this->ID = $row['ID'];
        $this->name = $row['name'];
        $this->email = $row['email'];
        $this->password = $row['password'];
    }

    public static function login($emailInput, $passwordInput){

        $userQuery = UserDAO::getUserByCredentials($emailInput, $passwordInput);

        if($userQuery != null){

            $_SESSION["userID"] = $userQuery['ID'];
            $_SESSION["userName"] = $userQuery['name'];
            $_SESSION["logged_in"] = true;
            unset($_SESSION["email"]);
            unset($_SESSION["password"]);

        }
        else{
            $log_failed = "Your email and password were entered incorrect, please try again.";
            return $log_failed;
        }

    }

    public function logout(){

        unset($_SESSION["userID"]);
        unset($_SESSION["userName"]);
        $_SESSION["logged_in"] = false;
        
    }

    public static function register($nameInput, $emailInput, $passwordInput){

        if(str_contains($emailInput, "@")){

            $_SESSION["email"] = $emailInput;
            $_SESSION["password"] = $passwordInput;
            $_SESSION["congrats"] = "You've successfully registered your account, please login.";

            UserDAO::createUser($nameInput, $emailInput, $passwordInput);

            return "";

        }
        else{

            $reg_failed = "Failed to create account, please try again.";
            return $reg_failed;
        }
    }
}