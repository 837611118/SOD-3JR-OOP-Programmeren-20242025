<?php 
session_start(); // Start the session
 require_once "../vendor/autoload.php";
 use Login\classes\User;

if (isset($_POST['login-btn'])) {
    //require_once('classes/user.php');
   
    $user = new User();
    $user->username = $_POST['username'];
    $user->SetPassword($_POST['password']);

    if ($user->LoginUser()) {
        $_SESSION['username'] = $_POST['username']; // Store username in session
        $_SESSION['password'] = $_POST['password']; // Optionally store password
        header("location: index.php");
        exit();
    } else {
        echo "<script>alert('Login mislukt. Controleer je gegevens.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <h3>PHP - PDO Login and Registration</h3>
    <hr/>
    <form action="" method="POST">
        <h4>Login hier...</h4>
        <label>Username</label>
        <input type="text" name="username" required>
        <br>
        <label>Password</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit" name="login-btn">Login</button>
        <br>
        <a href="register_form.php">Registreren</a>
    </form>
</body>
</html> 
