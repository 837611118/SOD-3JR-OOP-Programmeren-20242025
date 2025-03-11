<?php
// Functie: classdefinitie User 
// Auteur: Abdul

class User {
    private $db;
    public $username;
    public $email;
    private $password;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=user_database", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connectie mislukt: " . $e->getMessage());
        }
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function SetPassword($password) {
        $this->password = $password;
    }

    public function GetPassword() {
        return $this->password;
    }

    public function ShowUser() {
        echo "<br>Username: $this->username<br>";
        echo "<br>Email: $this->email<br>";
    }

    public function RegisterUser() {
        $errors = [];

        if (strlen($this->username) < 3) {
            array_push($errors, "Gebruikersnaam moet minimaal 3 tekens bevatten.");
        }
        if (strlen($this->password) < 3) {
            array_push($errors, "Wachtwoord moet minimaal 3 tekens bevatten.");
        }
        if (empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Voer een geldig e-mailadres in.");
        }

        if (count($errors) == 0) {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$this->username]);

            if ($stmt->rowCount() > 0) {
                array_push($errors, "Gebruikersnaam bestaat al.");
            } else {
                $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
                $stmt = $this->db->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
                try {
                    $stmt->execute([$this->username, $hashedPassword, $this->email]);
                } catch (PDOException $e) {
                    die("Database fout: " . $e->getMessage());
                }
            }
        }
        return $errors;
    }

    public function LoginUser() {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$this->username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($this->password, $user['password'])) {
            $_SESSION['user'] = [
                'username' => $user['username'],
                'email' => $user['email']
            ];
            return true;
        }
        return false;
    }

    public function IsLoggedin() {
        return isset($_SESSION['user']);
    }

    public function GetUser($username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function Logout() {
        session_unset();
        session_destroy();
        header('location: index.php');
        exit();
    }
}
?>
