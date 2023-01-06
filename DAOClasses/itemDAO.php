<?php

require_once './DBconfig/config.php';

class ItemDAO{


    public static function getAllItems(){

        $statement = "SELECT * FROM items";

        $connect = dbConnect();

        if ($result = $connect->query($statement)){
            return $result;
            $connect->close();
        }
        else {
            die("Connection failed: " . $connect->error);
        }


    }

    public static function getItemsByOrigin($originID){

        $statement = "SELECT * FROM items WHERE originID=$originID";

        $connect = dbConnect();

        if ($result = $connect->query($statement)){
            return $result;
            $connect->close();
        }
        else {
            die("Connection failed: " . $connect->error);
        }


    }

    public static function getOneItem($id){

        $statement = "SELECT * FROM items WHERE ID=$id";

        $connect = dbConnect();

        if ($result = $connect->query($statement)){
            return $result->fetch_assoc();
            $connect->close();
        }
        else {
            die("Connection failed: " . $connect->error);
        }


    }

    public static function updateItemAmount($itemID, $amount){

        $connect = dbConnect();

        $statement = "UPDATE items SET stockCount=$amount WHERE ID=$itemID";

        if ($result = $connect->query($statement)){
            return $result;
            $connect->close();
        }
        else {
            die("Connection failed: " . $connect->error);
        }

    }

}