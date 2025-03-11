<?php
//Funtie: opdrachtHuizen
// Auteur:Abdul


class House {
    private int $floor;
    private int $rooms;
    private float $width;
    private float $height;
    private float $depth;
    private int $volume;
    private const PRICE_PER_M3 = 1500;

    // Constructor
    public function __construct(int $floor, int $rooms, float $width, float $height, float $depth) {
        $this->floor = $floor;
        $this->rooms = $rooms;
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
        $this->setVolume();
    }

    // Setter voor volume
    private function setVolume(): void {
        $this->volume = (int) round($this->width * $this->height * $this->depth);
    }

    // Getter voor volume
    public function getVolume(): int {
        return $this->volume;
    }

    // Getter voor prijs
    public function getPrice(): int {
        return $this->volume * self::PRICE_PER_M3;
    }

    // Methode om details te tonen
    public function getHouseDetails(): string {
        return "Dit huis heeft {$this->floor} verdiepingen, {$this->rooms} kamers en heeft een volume van {$this->getVolume()}m3\n.<br>" .
               "De prijs van het huis is: €{$this->getPrice()}\n.<br>";
    }
}

// Huis-objecten aanmaken
$houseOne = new House(2, 4, 5.0, 4.0, 5.0);
$houseTwo = new House(3, 6, 5.0, 6.0, 5.0);
$houseThree = new House(2, 3, 5.0, 3.0, 5.0);

// Details afdrukken
echo $houseOne->getHouseDetails();
echo $houseTwo->getHouseDetails();
echo $houseThree->getHouseDetails();
?>