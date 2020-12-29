<?php
session_start();
//Ukončení session
session_destroy();
//Přesunutí na úvodní stranu
header('Location: index.php');
?>
