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

            $stock = $this->stockCount;

            if($stock > 0){

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
                            <button name="addToCart" class="button-59" type="submit" value="$this->ID">Add To Cart</button>
                        </div>
                    </form>
                </div>
            </li>
    
            DELIMITER;
    
            return $display;
            }
            else{

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
                            <h2 style="color:red;">OUT OF STOCK</h2>
                        </div>
                    </form>
                </div>
            </li>
    
            DELIMITER;
    
            return $display;

            }
    
    }



    public function getID()
    {
        return $this->ID;
    }


    public function getName()
    {
        return $this->name;
    }


    public function getImage()
    {
        return $this->image;
    }


    public function getDescription()
    {
        return $this->description;
    }


    public function getPrice()
    {
        return $this->price;
    }


    public function getOrigID()
    {
        return $this->origID;
    }

    
    public function getStockCount()
    {
        return $this->stockCount;
    }
}