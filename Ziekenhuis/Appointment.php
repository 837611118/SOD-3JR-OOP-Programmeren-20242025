<?php
// Klasse Appointment die afspraken bijhoudt
class Appointment {
    private $patient;
    private $doctor;
    private $nurse;
    private $beginTime;
    private $endTime;
    private $cost;

    // Constructor
    public function __construct($patient, $doctor, $beginTime, $endTime, $nurse = null) {
        $this->patient = $patient;
        $this->doctor = $doctor;
        $this->nurse = $nurse;
        $this->beginTime = $beginTime;
        $this->endTime = $endTime;
        $this->cost = $this->calculateCost();
    }

    // Bereken de kosten van de afspraak
    private function calculateCost() {
        $duration = $this->getTimeDifference();
        $doctorCost = $duration * $this->doctor->getHourlyRate();  // Kosten voor de dokter, uurtarief * duur
        $nurseCost = $this->nurse ? $this->nurse->calculateSalary() : 0;  // Als er een verpleegkundige is, wordt deze ook meegerekend

        return $doctorCost + $nurseCost;
    }

    // Bereken het tijdsverschil tussen begin- en eindtijd in uren
    private function getTimeDifference() {
        $start = strtotime($this->beginTime);
        $end = strtotime($this->endTime);
        return ($end - $start) / 3600;  // Duur in uren
    }

    // Getters voor de patiënt, dokter en verpleegkundige
    public function getPatient() {
        return $this->patient;
    }

    public function getDoctor() {
        return $this->doctor;
    }

    public function getNurse() {
        return $this->nurse;
    }

    // Getter voor de kosten van de afspraak
    public function getCost() {
        return $this->cost;
    }
}
?>
