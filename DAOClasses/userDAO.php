<?php

require './DBconfig/config.php';

class UserDAO{

    public static function login($emailInput, $passwordInput){

        $statement = "SELECT * FROM users WHERE email=$emailInput AND password=$passwordInput";

        $connect = dbConnect();

        if ($result = $connect->query($statement)){
            return $result;
            $connect->close();
        }
        else {
            die("Connection failed: " . $connect->error);
        }

    }
    public function logout(){
        
    }
    public static function register($nameInput, $emailInput, $passwordInput){

        $statement = "INSERT INTO users (name, email, password)".
        "VALUES ('$nameInput', '$emailInput', '$passwordInput')";

        $connect = dbConnect();

        if ($result = $connect->query($statement)){
            return $result;
            $connect->close();
        }
        else {
            die("Connection failed: " . $connect->error);
        }
    }
}