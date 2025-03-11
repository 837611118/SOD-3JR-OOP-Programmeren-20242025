<?php
//Funtie: opdracht Herberekening huisprijs
// Auteur:Abdul


// Room Class
class Room {
    private $length;
    private $width;
    private $height;

    // Constructor om de kamer afmetingen in te stellen
    public function __construct($length, $width, $height) {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    // Getters voor de kamer afmetingen
    public function getLength() {
        return $this->length;
    }

    public function getWidth() {
        return $this->width;
    }

    public function getHeight() {
        return $this->height;
    }

    // Methode om het volume van de kamer te berekenen
    public function getVolume() {
        return $this->length * $this->width * $this->height;
    }
}

// House Class
class House {
    private $rooms = [];

    // Methode om een kamer toe te voegen aan het huis
    public function addRoom(Room $room) {
        $this->rooms[] = $room;
    }

    // Methode om alle kamers van het huis op te halen
    public function getRooms() {
        return $this->rooms;
    }

    // Methode om het totale volume van het huis te berekenen
    public function getTotalVolume() {
        $totalVolume = 0;
        foreach ($this->rooms as $room) {
            $totalVolume += $room->getVolume();
        }
        return $totalVolume;
    }

    // Methode om de prijs van het huis te berekenen op basis van het volume
    public function getPrice() {
        $totalVolume = $this->getTotalVolume();
        return $totalVolume * 3000;  // Stel 3000 Euro per kubieke meter in
    }
}

// Voorbeeld van het maken van kamers en een huis
$room1 = new Room(5.2, 5.1, 5.5);
$room2 = new Room(4.8, 4.6, 4.9);
$room3 = new Room(5.9, 2.5, 3.1);

// Maak een nieuw huis en voeg de kamers toe
$house = new House();
$house->addRoom($room1);
$house->addRoom($room2);
$house->addRoom($room3);

// Toon 'Inhoud Kamers
echo "Inhoud Kamers:\n<br><br>";

// Toon de gegevens van de kamers
foreach ($house->getRooms() as $room) {
    echo "*Lengte: " . $room->getLength() . "m, ";
    echo "Breedte: " . $room->getWidth() . "m, ";
    echo "Hoogte: " . $room->getHeight() . "m\n.<br>";
}

// Toon het totale volume en de prijs van het huis
echo "<br>Volume Totaal = " . $house->getTotalVolume() . "m3\n<br>";
echo "Prijs van het huis is= " . $house->getPrice() . " Euro\n<br>";

?>
