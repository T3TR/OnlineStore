<?php

require_once './DAOClasses/itemDAO.php';
require_once './Classes/item.php';

class CartItem{

    private $ID;
    private $userID;
    private $item;
    private $amount;

    public function __construct($row){
        $this->ID = $row['ID'];
        $this->userID = $row['userID'];
        $this->amount = $row['amount'];
        $item = ItemDAO::getOneItem($row['itemID']);
        $this->item = new Item($item);
    }

    public static function displayCartItems(){

        $display = <<< DELIMITER

            <li>
                <div class="cartItem">
                    <form method="post">
                        <div class="itemName">
                            <p></p>
                        </div>

                        <div class="amountInCart">
                            <p></p>
                        </div>

                        <div class="price">
                            <p></p>
                        </div>
                    </form>
                </div>
            </li>
        
        DELIMITER;

        return $display;


    }
}