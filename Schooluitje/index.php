<?php
//Autor: Abdul Argalah
//Datum: 09-04-2025

// Definieer de abstracte Person klasse
abstract class Person {
    protected $name;
    protected $role;

    public function __construct($name, $role) {
        $this->name = $name;
        $this->role = $role;
    }

    abstract public function getRole();
    abstract public function getName();
}

// Definieer de Student klasse, die afgeleid is van Person
class Student extends Person {
    private $classname;
    private $paid;

    public function __construct($name, $classname, $paid) {
        parent::__construct($name, 'Student');
        $this->classname = $classname;
        $this->paid = $paid;
    }

    public function getRole() {
        return $this->role;
    }

    public function getName() {
        return $this->name;
    }

    public function getPaid() {
        return $this->paid;
    }

    public function getClassname() {
        return $this->classname;
    }
}

// Definieer de Teacher klasse, die afgeleid is van Person
class Teacher extends Person {
    private $salary;

    public function __construct($name, $salary) {
        parent::__construct($name, 'Teacher');
        $this->salary = $salary;
    }

    public function getRole() {
        return $this->role;
    }

    public function getName() {
        return $this->name;
    }

    public function getSalary() {
        return $this->salary;
    }
}

// Schooltrip klasse om gegevens van het schooluitje op te slaan
class Schooltrip {
    private $name;
    private $schooltripLists = [];
    private $totalAmount = 0;
    private $totalAmountPerClass = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function addSchooltripList($schooltripList) {
        $this->schooltripLists[] = $schooltripList;
    }

    public function getSchooltripLists() {
        return $this->schooltripLists;
    }

    public function calculateTotalAmount() {
        foreach ($this->schooltripLists as $list) {
            $this->totalAmount += $list->getTotalAmount();
            $this->totalAmountPerClass[$list->getClassname()] = $list->getTotalAmount();
        }
    }

    public function getTotalAmount() {
        return $this->totalAmount;
    }

    public function getTotalAmountPerClass() {
        return $this->totalAmountPerClass;
    }

    public function getSchooltripName() {
        return $this->name;
    }
}

// SchooltripList klasse voor het beheren van studenten per klas
class SchooltripList {
    private $studentList = [];
    private $teacher;
    private $classname;

    public function __construct($classname) {
        $this->classname = $classname;
    }

    public function addStudentToList($student) {
        $this->studentList[] = $student;
    }

    public function setTeacher($teacher) {
        $this->teacher = $teacher;
    }

    public function getTeacher() {
        return $this->teacher;
    }

    public function getClassname() {
        return $this->classname;
    }

    public function getTotalAmount() {
        $totalAmount = 0;
        foreach ($this->studentList as $student) {
            if ($student->getPaid() == 'Ja') {
                $totalAmount += 10; //  elke student €10 betaalt
            }
        }
        return $totalAmount;
    }

    public function getStudentList() {
        return $this->studentList;
    }

    public function getPercentageOfStudents() {
        $totalStudents = count($this->studentList);
        $paidStudents = 0;

        foreach ($this->studentList as $student) {
            if ($student->getPaid() == 'Ja') {
                $paidStudents++;
            }
        }

        return ($paidStudents / $totalStudents) * 100;
    }

    public function calculateRequiredTeachers() {
        $paidStudents = 0;
        foreach ($this->studentList as $student) {
            if ($student->getPaid() == 'Ja') {
                $paidStudents++;
            }
        }

        return ceil($paidStudents / 5); // 1 docent per 5 betalende studenten
    }
}

// Voorbeeldgegevens
$teacher1 = new Teacher('Mevrouw Jansen', 3200);
$teacher2 = new Teacher('Meneer De Vries', 3200);
$teacher3 = new Teacher('Mevrouw Bakker', 3200);

$student1 = new Student('Abdul', 'SOD2A', 'Ja');
$student2 = new Student('Ali', 'SOD2A', 'Ja');
$student3 = new Student('Ahmed', 'SOD2A', 'Nee');
$student4 = new Student('Mohammed', 'SOD2A', 'ja');
$student5 = new Student('Yahia', 'SOD2A', 'Nee');
$student6 = new Student('Jon', 'SOD2A', 'Ja');
$student7 = new Student('Patrick', 'SOD2A', 'Ja');
$student8 = new Student('Wisaam', 'SOD2A', 'Ja');


$schooltripList1 = new SchooltripList('SOD2A');
$schooltripList1->addStudentToList($student1);
$schooltripList1->addStudentToList($student2);
$schooltripList1->addStudentToList($student8);
$schooltripList1->setTeacher($teacher1);

$schooltripList2 = new SchooltripList('SOD2B');
$schooltripList2->addStudentToList($student3);
$schooltripList2->addStudentToList($student4);
$schooltripList2->addStudentToList($student5);
$schooltripList2->addStudentToList($student6);
$schooltripList2->addStudentToList($student7);
$schooltripList2->setTeacher($teacher2);

// Schooltrip object aanmaken
$schooltrip = new Schooltrip('Pretpark Uitje');
$schooltrip->addSchooltripList($schooltripList1);
$schooltrip->addSchooltripList($schooltripList2);

// Bereken totaalbedrag en percentage
$schooltrip->calculateTotalAmount();

// Toon de gegevens in een HTML-tabel
echo "<h1>Schooluitje: " . $schooltrip->getSchooltripName() . "</h1>";
echo "<p><strong>Totaal ingezameld bedrag:</strong> €" . $schooltrip->getTotalAmount() . "</p>";

// de HTML-tabel 
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>Docent</th><th>Student</th><th>Klas</th><th>Betaald</th></tr>";

foreach ($schooltrip->getSchooltripLists() as $list) {
    $teacher = $list->getTeacher();
    $classname = $list->getClassname();
    $students = $list->getStudentList();

    foreach ($students as $student) {
        echo "<tr>";
        echo "<td>" . $teacher->getName() . "</td>";
        echo "<td>" . $student->getName() . "</td>";
        echo "<td>" . $student->getClassname() . "</td>";
        echo "<td>" . $student->getPaid() . "</td>";
        echo "</tr>";
    }
}




?>
