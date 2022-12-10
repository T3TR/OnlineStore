<?php

class Item{

    private $ID;
    private $name;
    private $image;
    private $description;
    private $price;
    private $origID;
    private $stockCount;

    public function __construct()
    {
        
    }

    public function displayItems(){

        for($i = 0 ; $i < ; $i++){

            $item = new Item;

            $display = <<< DELIMITER
            
            <div>
            <form method="GET">
                <div class="itemImage">
                    <img src="" alt="">
                </div>

                <div class="ItemName">
                    <h6></h6>
                </div>

                <div class="itemInfo">
                    <div class="itemStock"></div>
                    <div class="itemPrice"></div>
                </div>
            </form>
        </div>

            DELIMITER;
        }

        echo $diplay;

    }

}