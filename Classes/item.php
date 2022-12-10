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
        $this->ID=$row['ID'];
        $this->name=$row['name'];
        $this->image=$row['image'];
        $this->description=$row['description'];
        $this->price=$row['price'];
        $this->origID=$row['originID'];
        $this->stockCount=$row['stockCount'];
    }

    public function displayItem(){
    
            $display = <<< DELIMITER
            
            <div>
            <form method="GET">
                <div class="itemImage">
                    <img src="$this->image" alt="$this->name">
                </div>
    
                <div class="ItemName">
                    <h4>$this->name</h4>
                </div>
    
                <div class="itemInfo">
                    <div class="itemStock">Stock: $this->stockCount</div>
                    <div class="itemPrice">R$this->price</div>
                </div>
            </form>
            </div>
    
            DELIMITER;
    
        return $display;
    
    }

}