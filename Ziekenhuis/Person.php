<?php
// Abstracte klasse voor Person
abstract class Person {
    private $name;
    private $role;

    // Constructor
    public function __construct($name, $role) {
        $this->name = $name;
        $this->role = $role;
    }

    // Getters
    public function getName() {
        return $this->name;
    }

    public function getRole() {
        return $this->role;
    }

    // Abstracte methode om de rol te bepalen
    abstract public function determineRole();
}
?>
