<?php
// Klasse Patient die overerft van Person
class Patient extends Person {
    private $payment;

    // Constructor
    public function __construct($name, $payment) {
        parent::__construct($name, 'Patient');
        $this->payment = $payment;
    }

    // Implementatie van de abstracte methode
    public function determineRole() {
        return "Patient";
    }

    // Getter voor betaling
    public function getPayment() {
        return $this->payment;
    }

    // Setter voor betaling
    public function setPayment($payment) {
        $this->payment = $payment;
    }
}
?>
