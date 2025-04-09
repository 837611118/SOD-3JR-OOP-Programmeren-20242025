<?php
// Klasse Doctor die overerft van Staff
class Doctor extends Staff {
    private $hourlyRate;
    private $appointmentsCount = 0;  // Aantal gemaakte afspraken

    // Constructor
    public function __construct($name, $salary, $hourlyRate) {
        parent::__construct($name, $salary);
        $this->hourlyRate = $hourlyRate;
    }

    // Implementatie van de abstracte methode voor salarisberekening
    public function calculateSalary() {
        return $this->hourlyRate * $this->appointmentsCount;  // Salaris wordt berekend op basis van afspraken
    }

    // Methode om het aantal afspraken bij te houden
    public function addAppointment() {
        $this->appointmentsCount++;
    }

    // Getter voor hourlyRate
    public function getHourlyRate() {
        return $this->hourlyRate;
    }

    // Implementatie van de abstracte methode uit Person
    public function determineRole() {
        return "Doctor";
    }
}
?>
