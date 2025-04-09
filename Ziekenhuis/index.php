<?php
// Laad de benodigde klassen
require_once 'Person.php';
require_once 'Patient.php';
require_once 'Staff.php';
require_once 'Doctor.php';
require_once 'Nurse.php';
require_once 'Appointment.php';

// Maak een patiënt aan
$patient = new Patient("John Doe", 100);

// Maak een dokter aan met een uurloon van 50
$doctor = new Doctor("Dr. Smith", 0, 50);

// Maak een verpleegkundige aan met een salaris van 2000 en een bonus van 30 per afspraak
$nurse = new Nurse("Nurse Jane", 2000, 30);

// Voeg een afspraak toe aan de dokter
$doctor->addAppointment();

// Maak een afspraak tussen de patiënt, dokter en verpleegkundige
$appointment = new Appointment($patient, $doctor, "2025-04-04 09:00:00", "2025-04-04 10:00:00", $nurse);

// Bereken het salaris van de dokter en de verpleegkundige
$doctorSalary = $doctor->calculateSalary();
$nurseSalary = $nurse->calculateSalary();

// Toon de resultaten
echo "Dokter's salaris per uur : " . $doctorSalary . " EUR<br>\n";
echo "Verpleegkundige's salaris: " . $nurseSalary . " EUR<br>\n";
echo "Totale kosten van de afspraak: " . $appointment->getCost() . " EUR<br>\n";
?>
