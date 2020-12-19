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
<div class="prihlasen">
    <?php
    session_start();
    echo 'Jste přihlášen jako: <h10 >'.$_SESSION['jmeno'].'</h10>';

    ?>
    <br>
    <a href="odhlaseni.php" style="color: #00d408">Odhlásit se</a><br>
</div>
<h1 style="position: absolute; top: -0.5%; left: 1%">WEB KONFERENCE</h1>
<center>
    <div class="aaa">
        <table cellspacing="5" border="0" cellpadding="0">
            <td style=" padding: 5px;"><a href="autori_menu.php">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference_autori.php">KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="moje_konference.php">MOJE KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="pridat_konferenci.php">PŘIDAT KONFERENCI</a></td>
        </table>
    </div>
    <br>
    <div class="login">


        <?php
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="web_sp";
        $conn=mysqli_connect($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Chyba: " . $conn->connect_error);
        }
        $jmeno = $_SESSION['jmeno'];
        $prikaz = "SELECT * FROM konference WHERE pridal='$jmeno'";
        $resul = $conn->query($prikaz);
        echo "<br><table  cellspacing='5' border='2'>";
        if ($resul->num_rows > 0) {
            // output data of each row
            echo("<tr><td>Název:</td><td>Originalita:</td><td>Téma:</td><td>Technická kvalita:</td><td>Jazyková kvalita:</td><td>Stav:</td>");
            while($data = $resul->fetch_assoc()) {
                echo  "<tr><td width='1%'>".$data["nazev"]."</td><td width='1%'>".$data["originalita"]."</td><td width='1%'>".$data["tema"]."</td>
                <td width='1%'>".$data["technicka_kvalita"]."</td><td width='1%'>".$data["jazykova_kvalita"]."</td><td width='1%'>".$data["stav"]."</td></tr>";
            }}
        echo "</table>";
        ?>
    </div>
</body>
</html>