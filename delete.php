<?php
    ob_start();
    unset($conn);
    include_once("connect.php");
    $id=$_POST["id"];

    //Udáje od databáze, do které se chceme připojit
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="web_sp";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    //Zajištění že se budou údaje načítat i v češtině
    $conn->query('set character_set_client=utf8');
    $conn->query('set character_set_connection=utf8');
    $conn->query('set character_set_results=utf8');
    $conn->query('set character_set_server=utf8');
    $deleting = mysqli_query($conn, "DELETE FROM konference WHERE id=$id") or die(mysql_error());
    header('Location: moje_konference.php');

?>
