class Figuur {
    constructor(color) {
        this.color = color;
    }
    draw() { return ""; }
}

class Vierkant extends Figuur {
    constructor(color, size, x, y) {
        super(color);
        this.size = size;
        this.x = x;
        this.y = y;
    }
    draw() {
        return `<rect x="${this.x}" y="${this.y}" width="${this.size}" height="${this.size}" 
                fill="${this.color}" stroke="black" stroke-width="3"/>`;
    }
}

class Cirkel extends Figuur {
    constructor(color, radius, cx, cy) {
        super(color);
        this.radius = radius;
        this.cx = cx;
        this.cy = cy;
    }
    draw() {
        return `<circle cx="${this.cx}" cy="${this.cy}" r="${this.radius}" 
                fill="${this.color}" stroke="black" stroke-width="3"/>`;
    }
}

class Rechthoek extends Figuur {
    constructor(color, width, height, x, y) {
        super(color);
        this.width = width;
        this.height = height;
        this.x = x;
        this.y = y;
    }
    draw() {
        return `<rect x="${this.x}" y="${this.y}" width="${this.width}" height="${this.height}" 
                fill="${this.color}" stroke="black" stroke-width="3"/>`;
    }
}

class Driehoek extends Figuur {
    constructor(color, width, height, x, y) {
        super(color);
        this.width = width;
        this.height = height;
        this.x = x;
        this.y = y;
    }
    draw() {
        return `<polygon points="${this.x},${this.y + this.height} ${this.x + this.width / 2},${this.y} 
                ${this.x + this.width},${this.y + this.height}" fill="${this.color}" 
                stroke="black" stroke-width="3"/>`;
    }
}

const board = document.getElementById("game-board");

let figuren = [
    // Rij 1 - Vierkanten
    new Vierkant("cyan", 60, 0, 0),
    new Vierkant("purple", 60, 70, 0),
    new Vierkant("green", 60, 140, 0),

    // Rij 2 - Cirkels
    new Cirkel("cyan", 30, 30, 100),
    new Cirkel("purple", 30, 100, 100),
    new Cirkel("green", 30, 170, 100),

    // Rij 3 - Rechthoeken
    new Rechthoek("cyan", 60, 30, 0, 160),
    new Rechthoek("purple", 60, 30, 70, 160),
    new Rechthoek("green", 60, 30, 140, 160),

    // Rij 4 - Driehoeken
    new Driehoek("cyan", 60, 60, 0, 210),
    new Driehoek("purple", 60, 60, 70, 210),
    new Driehoek("green", 60, 60, 140, 210),
];

figuren.forEach(figuur => {
    board.innerHTML += figuur.draw();
});
