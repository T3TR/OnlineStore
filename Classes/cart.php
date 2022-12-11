<?php

require_once './DAOClasses/cartDAO.php';
require_once './Classes/cartItem.php';
require_once './DAOClasses/itemDAO.php';

class Cart{

    public $userID;
    private $items;

    public function __construct($userID){
        $this->userID = $userID;
        $allItems = CartDAO::getAllItemsForUser($userID);
        $this->items = [];
        while($row = $allItems->fetch_assoc()){
            array_push($this->items, new CartItem($row));
        }
    }

    public static function addToCart($userID, $itemID){

        $cartItem = CartDAO::getItemforUser($userID, $itemID);

        if ($cartItem != NULL){

            $amountInCart = $cartItem['amount'];

            CartDAO::updateCartItemAmount($userID, $itemID, intval($amountInCart) + 1);
        }
        else{
            CartDAO::addItem($userID, $itemID);
        }
    }
        

    public static function removeFromCart($userID, $itemID){
        
        $cartItem = CartDAO::getItemforUser($userID, $itemID);

        if ($cartItem['amount'] > 1){

            $amountInCart = $cartItem['amount'];

            CartDAO::updateCartItemAmount($userID, $itemID, intval($amountInCart) - 1);
        }
        else{
            CartDAO::removeItem($userID, $itemID);
        }
    }

    public function checkout(){

        for($i= 0; $i < count($this->items); $i++){
            $item = $this->items[$i];
            $amount = $item->amount;
            $stockCount = $item->item->stockCount;
            $itemID = $item->item->ID;

            if($stockCount >= $amount){
                ItemDAO::updateItemAmount($itemID, $stockCount - $amount);
                CartDAO::removeItem($this->userID, $itemID);
            }
        }

    }
}