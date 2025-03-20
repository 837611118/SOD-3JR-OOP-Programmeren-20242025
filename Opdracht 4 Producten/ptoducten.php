<?php

// Auteur : Abdul

abstract class Product {
    protected $name;
    protected $purchasePrice;
    protected $tax;
    protected $profit;
    protected $description;

    public function __construct($name, $purchasePrice, $tax, $profit, $description) {
        $this->name = $name;
        $this->purchasePrice = $purchasePrice;
        $this->tax = $tax;
        $this->profit = $profit;
        $this->description = $description;
    }

    abstract public function getInfo();

    public function getSalePrice() {
        return round($this->purchasePrice + $this->profit + ($this->purchasePrice * $this->tax / 100), 2);
    }
}

class Music extends Product {
    private $artist;
    private $numbers;

    public function __construct($name, $purchasePrice, $tax, $profit, $description, $artist, $numbers) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
        $this->artist = $artist;
        $this->numbers = $numbers;
    }

    public function getInfo() {
        return [
            "Category" => "Music",
            "Name" => $this->name,
            "Sale Price" => $this->getSalePrice(),
            "Info" => [
                "Artist" => $this->artist,
                "Extra Info" => $this->numbers
            ]
        ];
    }
}

class Movie extends Product {
    private $quality;

    public function __construct($name, $purchasePrice, $tax, $profit, $description, $quality) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
        $this->quality = $quality;
    }

    public function getInfo() {
        return [
            "Category" => "Movie",
            "Name" => $this->name,
            "Sale Price" => $this->getSalePrice(),
            "Info" => $this->quality
        ];
    }
}

class Game extends Product {
    private $genre;
    private $requirements;

    public function __construct($name, $purchasePrice, $tax, $profit, $description, $genre, $requirements) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
        $this->genre = $genre;
        $this->requirements = $requirements;
    }

    public function getInfo() {
        return [
            "Category" => "Game",
            "Name" => $this->name,
            "Sale Price" => $this->getSalePrice(),
            "Info" => [
                "Genre" => $this->genre,
                "Extra Info" => $this->requirements
            ]
        ];
    }
}

class ProductList {
    private $products = [];

    public function addProduct($product) {
        $this->products[] = $product;
    }

    public function getProducts() {
        return $this->products;
    }
}

// Bijgewerkte productgegevens
$productList = new ProductList();
$productList->addProduct(new Music("The Symphony of Nature", 15, 19, 7, "A Beautiful Classical Music Album", "Artist: A. Mozart", ["Number: Symphony No. 40", "Number: The Magic Flute"]));
$productList->addProduct(new Music("Calm Seas", 20, 19, 9, "Peaceful Relaxation Music", "Artist: E. Ocean", ["Number: Tranquil Shores", "Number: Sunset Over the Horizon"]));
$productList->addProduct(new Movie("The Lost City", 25, 19, 12, "Adventure Movie", "Director: R. Johnson"));
$productList->addProduct(new Movie("The Time Traveler", 30, 19, 16, "Sci-Fi Drama", "Director: J. Nolan"));
$productList->addProduct(new Game("Fantasy Quest", 35, 19, 18, "Action RPG", "RPG", ["16GB RAM", "RTX 2070"]));
$productList->addProduct(new Game("Speed Racer X", 40, 19, 20, "Fast-Paced Racing Game", "Racing", ["32GB RAM", "RTX 3080"]));

// HTML Display
echo "<table border='1'>";
echo "<tr><th>Category</th><th>Product Name</th><th>Sale Price</th><th>Info</th></tr>";
foreach ($productList->getProducts() as $product) {
    $info = $product->getInfo();
    echo "<tr>";
    echo "<td>" . $info["Category"] . "</td>";
    echo "<td>" . $info["Name"] . "</td>";
    echo "<td>" . number_format($info["Sale Price"], 2) . "</td>";
    echo "<td>";
    if (is_array($info["Info"])) {
        echo "<ul>";
        foreach ($info["Info"] as $key => $value) {
            if (is_array($value)) {
                echo "<li>$key<ul>";
                foreach ($value as $item) {
                    echo "<li>$item</li>";
                }
                echo "</ul></li>";
            } else {
                echo "<li>$value</li>";
            }
        }
        echo "</ul>";
    } else {
        echo $info["Info"];
    }
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

?>
