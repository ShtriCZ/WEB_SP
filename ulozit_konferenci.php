<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
    <meta http-equiv="content-style-type" content="text/css">
    <title>Uložit konferenci</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styl.css" type="text/css">
</head>
<body>
<!--Výpis uživatelského jména přihlášeného uživatele-->
<?php
session_start();
if(isset($_SESSION['jmeno'])){
    echo '
<div class="prihlasen">Jste přihlášen jako: <h10 >'.$_SESSION['jmeno'].'</h10>';
    echo '<br><a href="odhlaseni.php" style="color: #00d408">Odhlásit se</a><br>

</div>';}
else{
    header('Location: index.php');
}
?>

<!--Nadpis stránky s odkazem na úvodní stránku-->
<a href="index.php"><h1 style="position: fixed; top:1%; left: 1%">WEB KONFERENCE</h1></a>
<!--Menu s odkazy na další stránky-->
<center>
    <div class="aaa">
        <table cellspacing="5" border="0" cellpadding="0">
            <td style=" padding: 5px;"><a href="autori_menu.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference.php" class="text-success">KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="moje_konference.php" class="text-success">MOJE KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="pridat_konferenci.php" class="text-success">PŘIDAT KONFERENCI</a></td>
        </table>
    </div>
<br>
<div class="login">
    <?php
    include_once("connect.php");
    //Načtení dat
    $nazev=htmlspecialchars($_POST['nazev']);
    $autor=htmlspecialchars($_POST['autor']);
    $text=($_POST['text']);
    $text=trim($text);
    $text=stripslashes($text);
    $text=htmlspecialchars($text);
    $pdf=htmlspecialchars($_POST['pdf']);
    $pridal=htmlspecialchars($_SESSION['jmeno']);
    $stav="nehodnoceno";

    //Udáje od databáze, do které se chceme připojit
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="WEB_SP";
    $conn = new mysqli($servername, $username, $password, $dbname);
    //Zajištění že se budou data ukládat i v češtině
    $conn->query('set character_set_client=utf8');
    $conn->query('set character_set_connection=utf8');
    $conn->query('set character_set_results=utf8');
    $conn->query('set character_set_server=utf8');
    //Uložení dat do databáze
    $sql = "INSERT INTO `konference` (nazev, autor, text, pdf, pridal, stav)
VALUES ('$nazev', '$autor', '$text', '$pdf', '$pridal', '$stav')";


    if ($conn->query($sql) === TRUE) {
        echo "Konference uložena.";
    } else {
        echo "Chyba: " . $sql . "<br>" . $conn->error;

        $conn->close();}

    ?>

</div>
</center>
</body>
</html>
