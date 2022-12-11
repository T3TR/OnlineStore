<?php

require_once './DBconfig/config.php';

class CartDAO{

    public static function getAllItemsForUser($userID){

        $statement = "SELECT * FROM cart_items WHERE userID=$userID";

        $connect = dbConnect();

        if ($result = $connect->query($statement)){
            return $result;
            $connect->close();
        }
        else {
            die("Connection failed: " . $connect->error);
        }
    }

    public static function addItem($userID, $itemID){

        $connect = dbConnect();
        
        $statement = "INSERT INTO cart_items ( userID, itemID, amount)".
        "VALUES ('$userID', '$itemID', 1)";

        if ($result = $connect->query($statement)){
            return $result;
            $connect->close();
        }
        else {
            die("Connection failed: " . $connect->error);
        }
    }
        
    

    public static function removeItem($userID, $itemID){

        $connect = dbConnect();
        
        $statement = "DELETE FROM cart_items WHERE userID=$userID AND itemID=$itemID";

        if ($result = $connect->query($statement)){
            return $result;
            $connect->close();
        }
        else {
            die("Connection failed: " . $connect->error);
        }
        
    }

    public static function getItemforUser($userID, $itemID){

        $connect = dbConnect();

        $statement = "SELECT * FROM cart_items WHERE userID=$userID AND itemID=$itemID";

        if ($result = $connect->query($statement)){
            return $result->fetch_assoc();
            $connect->close();
        }
        else {
            die("Connection failed: " . $connect->error);
        }

    }

    public static function updateCartItemAmount($userID, $itemID, $amount){

        $connect = dbConnect();
        
        $statement = "UPDATE cart_items SET amount=$amount WHERE userID=$userID AND itemID=$itemID";

        if ($result = $connect->query($statement)){
            return $result;
            $connect->close();
        }
        else {
            die("Connection failed: " . $connect->error);
        }

    }
}