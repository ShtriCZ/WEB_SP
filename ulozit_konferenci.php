<html>
<head>
<title></title>
<meta name="generator" content="Bluefish 2.2.9" >
<meta name="author" content="Student" >
<meta name="date" content="2018-05-30T11:22:42+0100" >
<meta name="copyright" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
    <title>Uložit konferenci</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styl.css" type="text/css">
</head>
<body>
<div class="prihlasen">
    <?php
    session_start();
    echo 'Jste přihlášen jako: <h10 >'.$_SESSION['jmeno'].'</h10>';

    ?>
    <br>
    <a href="odhlaseni.php" style="color: #00d408">Odhlásit se</a><br>
</div>

<h1 style="position: fixed; top:1%; left: 1%">WEB KONFERENCE</h1>
<center>
    <div class="aaa">
            <table cellspacing="5" border="0" cellpadding="0">
                <td style=" padding: 5px;"><a href="autori_menu.php" class="text-success">O STRÁNKÁCH</a></td>
                <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference_autori.php" class="text-success">KONFERENCE</a></td>
                <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="moje_konference.php" class="text-success">MOJE KONFERENCE</a></td>
                <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="pridat_konferenci.php" class="text-success">PŘIDAT KONFERENCI</a></td>
            </table>
    </div>

    <br>
<div class="login">
<?php
include_once("connect.php");
$nazev=htmlspecialchars($_POST['nazev']);
$autor=htmlspecialchars($_POST['autor']);
$text=strip_tags($_POST['text']);
$pdf=($_POST['pdf']);
$pridal=htmlspecialchars($_SESSION['jmeno']);
$stav="nehodnoceno";
$cesta = realpath($pdf);
$text=htmlspecialchars($text);

echo $pdf;
$dstfile='pdf\pdf_'.$pdf.'.pdf';
mkdir(dirname($dstfile), 0777, true);
copy($pdf, $dstfile);

$servername="localhost";
$username="root";
$password="";
$dbname="WEB_SP";
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->query('set character_set_client=utf8');
$conn->query('set character_set_connection=utf8');
$conn->query('set character_set_results=utf8');
$conn->query('set character_set_server=utf8');
$sql = "INSERT INTO `konference` (nazev, autor, text, pdf, pridal, stav)
VALUES ('$nazev', '$autor', '$text', '$cesta', '$pridal', '$stav')";


if ($conn->query($sql) === TRUE) {
    echo "Vytvořen nový záznam:";
} else {
    echo "Chyba: " . $sql . "<br>" . $conn->error;

$conn->close();}

?>

</div>
</body>
</html>