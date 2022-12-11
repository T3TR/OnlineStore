<?php

class Item{

    private $ID;
    private $name;
    private $image;
    private $description;
    private $price;
    private $origID;
    private $stockCount;

    public function __construct($row){
        $this->ID = $row['ID'];
        $this->name = $row['name'];
        $this->image = $row['image'];
        $this->description = $row['description'];
        $this->price = $row['price'];
        $this->origID = $row['originID'];
        $this->stockCount = $row['stockCount'];
    }

    private function checkStock($stock){

        if($stock == 0){
            return "Out of Stock";
        }
        else{
            return $stock;
        }
    }

    public function displayItem(){

            $stock = $this->checkStock($this->stockCount);
            $display = <<< DELIMITER
            
            <li>
                <div class="itemCard">
                    <form method="post">
                        <div class="itemImage">
                            <img class="itemImgEl" src="$this->image" alt="$this->name">
                        </div>

                        <div class="itemName">
                            <h1>$this->name</h1>
                        </div>

                        <div class="itemInfo">
                            <div class="itemPrice">R$this->price</div>
                            <div class="itemStock">Stock: $stock</div>
                        </div>
                        <div class="itemAdd">
                            <button class="button-59">Add To Cart</button>
                        </div>
                    </form>
                </div>
            </li>
    
            DELIMITER;
    
        return $display;
    
    }

}