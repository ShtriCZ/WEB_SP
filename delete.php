<?php
    ob_start();
    unset($conn);
    include_once("connect.php");
    $id=$_POST["id"];
    echo $id.'<br>';
    $deleting = mysqli_query($conn, "DELETE FROM konference WHERE id=$id") or die(mysql_error());
    header('Location: moje_konference.php');

?>