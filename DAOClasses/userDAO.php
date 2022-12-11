<?php

require_once './DBconfig/config.php';

class UserDAO{

    public static function getUserByCredentials($emailInput, $passwordInput){

        $statement = "SELECT * FROM users WHERE email='$emailInput' AND password='$passwordInput'";

        $connect = dbConnect();

        if ($result = $connect->query($statement)){
            return $result->fetch_assoc();
            $connect->close();
        }
        else {
            die("Connection failed: " . $connect->error);
        }

    }
    
    public static function createUser($nameInput, $emailInput, $passwordInput){

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

    public static function getUserByID($ID){
        
        $statement = "SELECT * FROM users WHERE ID=$ID";

        $connect = dbConnect();

        if ($result = $connect->query($statement)){
            return $result->fetch_assoc();
            $connect->close();
        }
        else {
            die("Connection failed: " . $connect->error);
        }

    }
    
}