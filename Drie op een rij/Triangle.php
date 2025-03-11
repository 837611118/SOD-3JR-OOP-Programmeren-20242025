class Triangle extends Figure {
    private $height;
    private $width;

    public function __construct($color, $height, $width) {
        parent::__construct($color);
        $this->height = $height;
        $this->width = $width;
    }

    public function draw() {
        // Gebruik SVG om een driehoek te tekenen
        return "<svg width='$this->width' height='$this->height'>
                    <polygon points='0,$this->height, $this->width, $this->height, " . ($this->width / 2) . ",0' style='fill:$this->color;'/>
                </svg>";
    }
}
