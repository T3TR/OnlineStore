<?php

require_once './DAOClasses/cartDAO.php';
require_once './Classes/cartItem.php';
require_once './DAOClasses/itemDAO.php';

class Cart{

    private $userID;
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

        for($i = 0; $i < count($this->items); $i++){
            $item = $this->items[$i];
            $amount = $item->getAmount();
            $stockCount = $item->getItem()->getStockCount();
            $itemID = $item->getItem()->getID();

            if($stockCount >= $amount){
                ItemDAO::updateItemAmount($itemID, $stockCount - $amount);
                CartDAO::removeItem($this->userID, $itemID);
            }
        }

    }

    public function inCart(){
        
        $inCart = 0;

        for($i = 0; $i < count($this->items); $i++){

            $item = $this->items[$i];
            $cartItem = CartDAO::getItemforUser($this->userID, $item->getItem()->getID());
        
            $itemAmount = $cartItem['amount'];
            $inCart = $inCart + $itemAmount;
        }

        return $inCart;
    }


    public function displayCart(){

        $totalItemsInCart = 0;
        $cartTotal = 0;

        if(count($this->items) > 0){

            for($i = 0; $i < count($this->items); $i++){

                $item = $this->items[$i];
                $cartItem = CartDAO::getItemforUser($this->userID, $item->getItem()->getID());

                $itemName = $item->getItem()->getName();
                $itemAmount = $cartItem['amount'];
                $totalItemsInCart = $totalItemsInCart + $itemAmount;
                $itemPrice = $item->getItem()->getPrice();
                $itemID = $item->getItem()->getID();

                $cartTotal = $cartTotal + ($itemPrice * $itemAmount);

                $display = <<< DELIMITER

                    <li>
                        <div class="cartCard">
                            <form method="post">
                                <div class="itemName">
                                    <h1>$itemName</h1>
                                </div>

                                <div class="amountInCart">
                                    <p>In Cart: $itemAmount</p>
                                </div>

                                <div class="price">
                                    <p>R$itemPrice ea</p>
                                </div>
                                <div class="removeFromCart">
                                    <button name="removeFromCart" class="button-59" type="submit" value="$itemID">Remove From Cart</button>
                                </div>
                            </form>
                        </div>
                    </li>
            
                DELIMITER;
                echo $display;

            }
        }
        else{
            $display = <<< DELIMITER

                <li>
                    <div class="cartEmpty">
                        <h1>Your Cart is Empty</h1>
                    </div>
                </li>

            DELIMITER;
            echo $display;
        }

        $cartInfo = <<< DELIMITER

            <li>
                <div class="cartInfo">
                    <form method="post">
                        <div class="totalItemsInCart">
                            <p>Total Items in your Cart: $totalItemsInCart</p>
                        </div>

                        <div class="cartTotal">
                            <p>Total Price: R$cartTotal</p>
                        </div>

                        <div class="chechout">
                            <button name="checkout" class="button-84" type="submit">Proceed to Checkout</button>
                        </div>
                    </form>
                </div>
            </li>

        DELIMITER;

        echo $cartInfo;
    }



    public function getItems()
    {
        return $this->items;
    }
}