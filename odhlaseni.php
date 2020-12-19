<?php
session_start();
$a=$_SESSION['jmeno'];
session_destroy();
header('Location: index.php');

?>