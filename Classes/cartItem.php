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
}