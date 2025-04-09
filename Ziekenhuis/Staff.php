<?php
// Abstracte klasse Staff die overerft van Person
abstract class Staff extends Person {
    private $salary;

    // Constructor
    public function __construct($name, $salary) {
        parent::__construct($name, 'Staff');
        $this->salary = $salary;
    }

    // Getter en Setter voor salaris
    public function getSalary() {
        return $this->salary;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    // Abstracte methode voor salarisberekening
    abstract public function calculateSalary();
}
?>
