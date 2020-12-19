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
<link rel="stylesheet" href="styl.css" type="text/css">
</head>
<body>
<div class="prihlaseni">
    <a href="prihlaseni.php">Přihlásit se</a><br>
</div>

<h1 style="position: fixed; top: -0.5%; left: 1%">WEB KONFERENCE</h1>
<center>
    <div class="aaa">
        <table cellspacing="5" border="0" cellpadding="0">
            <td></td>
            <td style=" padding: 5px;"><a href="about.php">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference.php">KONFERENCE</a></td>
        </table>
    </div>

    <br>
<div class="login">
<?php
include_once("connect.php"); 
$jmeno=htmlspecialchars($_POST['jmeno']);
$prijmeni=htmlspecialchars($_POST['prijmeni']);
$email=htmlspecialchars($_POST['email']);
$uzjmeno=htmlspecialchars($_POST['uzjmeno']);
$heslo=md5($_POST['heslo']);
if ($conn->connect_error) {
    die("Chyba: " . $conn->connect_error);
}
$sql = "INSERT INTO `autori` (jmeno, prijmeni, email, uzjmeno, heslo)
VALUES ('$jmeno', '$prijmeni', '$email', '$uzjmeno', '$heslo')";
if ($conn->query($sql) === TRUE) {
    echo "Uživatel uložen.";
} else {
    echo "Chyba: " . $sql . "<br>" . $conn->error;

$conn->close();}
?>
</div>
    </body>
</html>