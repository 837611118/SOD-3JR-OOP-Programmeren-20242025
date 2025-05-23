<?php
require_once 'Game.php';
session_start();

if (!isset($_SESSION['game']) || isset($_POST['reset'])) {
    $_SESSION['game'] = new Game();
}

$game = $_SESSION['game'];
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['throw'])) {
    if ($game->canThrow()) {
        $lastThrow = $game->throwDice();
        $message = $game->getBonusMessage($lastThrow);
    }
}

$results = $game->getResults();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Professioneel Dobbelspel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>🎲 Dobbelspel</h1>

    <?php if ($game->canThrow()): ?>
        <form method="post">
            <button type="submit" name="throw">Gooi Dobbelstenen (<?php echo 3 - $game->getThrowCount(); ?> over)</button>
            <button type="submit" name="reset">Reset Spel</button>
        </form>
    <?php else: ?>
        <p><strong>✅ Je hebt alle 3 de worpen gebruikt.</strong></p>
        <form method="post">
            <button type="submit" name="reset">Nieuw Spel</button>
        </form>
    <?php endif; ?>

    <hr>

    <?php foreach ($results as $index => $throw): ?>
        <?php
            $counts = array_count_values($throw);
            $same = max($counts) === 5;
        ?>
        <h3>Worp <?php echo $index + 1; ?>:</h3>
        <?php foreach ($throw as $val): ?>
            <div class="dice <?php echo $same ? 'same-value' : ''; ?>"><?php echo $val; ?></div>
        <?php endforeach; ?>
        <br><br>
    <?php endforeach; ?>

    <?php if ($message): ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>
</body>
</html>
