<?php
 require_once "../vendor/autoload.php";
 use Login\classes\user;
 if (isset($_POST['register-btn'])) {
    //require_once('classes/user.php');

    $user = new user();
    $user->username = $_POST['username'];
    $user->SetPassword($_POST['password']);
    $user->email = $_POST['email'];

    $errors = $user->RegisterUser();

    if (count($errors) > 0) {
        echo "<script>alert('" . implode("\\n", $errors) . "');</script>";
    } else {
        echo "<script>alert('Gebruiker geregistreerd!'); window.location='login_form.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <h3>PHP - PDO Login and Registration</h3>
    <hr/>
    <form action="" method="POST">
        <h4>Registreer hier...</h4>
        <label>Username</label>
        <input type="text" name="username" required>
        <br>
        <label>Email</label>
        <input type="email" name="email" required>
        <br>
        <label>Password</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit" name="register-btn">Register</button>
        <br>
        <a href="index.php">Home</a>
    </form>
</body>
</html>
