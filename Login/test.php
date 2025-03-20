<?php
require_once "vendor/autoload.php";

use Login\src\User;

$user = new User();

if ($user) {
    echo "✅ User klasse is correct geladen!";
} else {
    echo "❌ Fout: User klasse wordt niet gevonden.";
}
?>
