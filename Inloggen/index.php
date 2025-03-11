<?php
require_once 'classes/user.php';
$user = new User();

if (isset($_GET['logout'])) {
    $user->Logout();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PDO Login and Registration</title>
</head>
<body>

    <h3>PDO Login and Registration</h3>
    <hr/>

    <h3>Welcome op de HOME-pagina!</h3>
    <br/>

    <?php if (!$user->IsLoggedin()): ?>
        <p>U bent niet ingelogd. Login in om verder te gaan.</p>
        <a href="login_form.php">Login</a>
    <?php else: ?>
        <h2>Het spel kan beginnen</h2>
        <p>Je bent ingelogd met:</p>
        <p>Inlognaam: <?php echo $_SESSION['username']; ?></p>
        <p>Password: <?php echo $_SESSION['password']; ?></p>
        <br/>
        <a href="?logout=true">Logout</a>
    <?php endif; ?>

</body>
</html>
