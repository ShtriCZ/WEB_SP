<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
    <meta http-equiv="content-style-type" content="text/css">
    <title>Uložit uživatele</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styl.css" type="text/css">
</head>
<body>
<div class="prihlaseni">
    <p class="text-success"><a href="prihlaseni.php" style="text-decoration: none;color:#007901;">Přihlásit se</a></p> <br>
</div>

<!--Nadpis stránky s odkazem na úvodní stránku-->
<a href="index.php"><h1 style="position: fixed; top:1%; left: 1%">WEB KONFERENCE</h1></a>
<!--Menu s odkazy na další stránky-->
<center>
    <div class="aaa">
        <table cellspacing="5" border="0" cellpadding="0">
            <td></td>
            <td style=" padding: 5px;"><a href="about.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference.php" class="text-success">KONFERENCE</a></td>
        </table>
    </div>
</center>
<br>
<div class="login">
    <?php
    include_once("connect.php");
    //Načtení dat
    $jmeno=htmlspecialchars($_POST['jmeno']);
    $prijmeni=htmlspecialchars($_POST['prijmeni']);
    $email=htmlspecialchars($_POST['email']);
    $uzjmeno=htmlspecialchars($_POST['uzjmeno']);
    $heslo=md5($_POST['heslo']);

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
    //Chyba pokud není spojení s databází
    if ($conn->connect_error) {
        die("Chyba: " . $conn->connect_error);
    }
    //Vložení dat do databáze
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
