<?php 
//Sukurkime pirkiniu krepseli
// //  $items = [
//     [
//         'id' => 1,    
//         'name' => 'Playstation 5',
//         'price' => 849.99
//         ],
//         [
//         'id' => 2,   
//         'name' => 'Iphone 13',
//         'price' => 999.99
//         ],
//         [
//             'id' => 3,      
//         'name' => 'Bulviu tarkavimo masina migris',
//         'price' => 89.99
//         ],
//         [
//             'id' => 4,   
//         'name' => 'Mikrobangų krosnelė DOMO DO2342CG',
//         'price' => 253
//         ]
//     ];



class ShoppingCart {
    //argumentai
    public $products; //masyvas

    //metodai
    public function addProduct($product) {
        $this->products[] = $product;
    }

    public function getProductCount()  {
        return count($this->products);
    }

    public function getTotalPrice()  {
        $suma = 0;
        foreach( $this->products as $product) {
            $suma +=$product->price;
        }
        return $suma;
    }

    public function getAveragePrice()  {
        return $this->getTotalPrice()/ $this->getProductCount();
    }

    public function getCheapestProduct()  {
        // ????
    }
    public function getMostExpensiveItem()  {
        // ??????
    }

}


class Product {
    public $id;
    public $name;
    public $price;

    public function __construct($id,$name,$price) {
       $this->id =  $id;
       $this->name =  $name;
       $this->price =  $price;
    }
}



//masyva pavertem i objektus
$product1 = new Product(1,"Playstation 5",849.99);
$product2 = new Product(2,"Iphone 13",999.99);
$product3 = new Product(3,"Bulviu tarkavimo masina migris",89.99);
$product4 = new Product(4,"Mikrobangų krosnelė DOMO DO2342CG",253);

$shoppingCart = new ShoppingCart;

$shoppingCart->addProduct($product1);
$shoppingCart->addProduct($product2);
$shoppingCart->addProduct($product3);
$shoppingCart->addProduct($product4);

$product5 = new Product(5,"Samsung TV",600);
$shoppingCart->addProduct($product5);

var_dump($shoppingCart->products);


echo $shoppingCart->getTotalPrice();
echo "<br>";
echo $shoppingCart->getProductCount();
echo "<br>";
echo $shoppingCart->getAveragePrice();



?>