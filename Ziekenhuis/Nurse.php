<?php
// Klasse Nurse die overerft van Staff
class Nurse extends Staff {
    private $bonusPerAppointment;
    private $appointmentsCount = 0;  // Aantal gemaakte afspraken

    // Constructor
    public function __construct($name, $salary, $bonusPerAppointment) {
        parent::__construct($name, $salary);
        $this->bonusPerAppointment = $bonusPerAppointment;
    }

    // Implementatie van de abstracte methode voor salarisberekening
    public function calculateSalary() {
        return $this->getSalary() + ($this->bonusPerAppointment * $this->appointmentsCount);  // Basis salaris + bonus
    }

    // Methode om het aantal afspraken bij te houden
    public function addAppointment() {
        $this->appointmentsCount++;
    }

    // Getter voor bonusPerAppointment
    public function getBonusPerAppointment() {
        return $this->bonusPerAppointment;
    }

    // Implementatie van de abstracte methode uit Person
    public function determineRole() {
        return "Nurse";
    }
}
?>
