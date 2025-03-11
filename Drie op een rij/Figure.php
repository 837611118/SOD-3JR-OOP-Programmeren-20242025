namespace Shapes;  // Namespace toevoegen

class Figure {
    protected $color;  // Property voor kleur

    // Constructor
    public function __construct($color) {
        $this->color = $color;
    }

    // Getter voor kleur
    public function getColor() {
        return $this->color;
    }

    // Abstracte draw methode die door child classes moet worden geïmplementeerd
    public abstract function draw();
}
