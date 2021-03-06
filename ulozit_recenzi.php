<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
    <meta http-equiv="content-style-type" content="text/css">
    <title>Uložit recenzi</title>
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
            <td style=" padding: 5px;"><a href="recenzenti_menu.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference.php" class="text-success">KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference_k_recenzi.php" class="text-success">KONFERENCE K RECENZI</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="ohodnotit.php" class="text-success">OHODNOTIT KONFERENCI</a></td>
        </table>
    </div>
<br>
<div class="login">
    <?php
    include_once("connect.php");
    //Načtení dat
    $konference=htmlspecialchars($_POST['konference']);
    $originalita=htmlspecialchars($_POST['originalita']);
    $tema=htmlspecialchars($_POST['tema']);
    $technicka_kvalita=htmlspecialchars($_POST['technicka_kvalita']);
    $jazykova_kvalita=htmlspecialchars($_POST['jazykova_kvalita']);
    $doporuceni=htmlspecialchars($_POST['doporuceni']);
    $poznamky=htmlspecialchars($_POST['poznamky']);

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

    $origi="";
    $tem="";
    $technicka_kval="";
    $jazykova_kval="";
    $doporuc="";
    $poznam="";
    //Načtení dat z databáze
    $prikaz = "SELECT * FROM konference WHERE id='$konference'";
    $resul = $conn->query($prikaz);
    if ($resul->num_rows > 0) {
        while($data = $resul->fetch_assoc()) {
            $origi=$data["originalita"];
            $tem=$data["tema"];
            $technicka_kval=$data["technicka_kvalita"];
            $jazykova_kval=$data["jazykova_kvalita"];
            $doporuc=$data["doporuceni"];
            $poznam=$data["poznamky"];
        }}

    //Přidání nového záznamu ke starému místo přepsání
    $origi=$origi.$originalita;
    $tem=$tem.$tema;
    $technicka_kval=$technicka_kval.$technicka_kvalita;
    $jazykova_kval=$jazykova_kval.$jazykova_kvalita;
    $doporuc=$doporuc.$doporuceni;
    $poznam=$poznam.$poznamky;

    //Upravení dat v databázi
    $sql = "UPDATE `konference` SET originalita = '$origi,', tema='$tem,', technicka_kvalita='$technicka_kval,', 
        jazykova_kvalita='$jazykova_kval,', doporuceni='$doporuc,', poznamky='$poznam,', stav='ohodnoceno' WHERE id='$konference'";
    if ($conn->query($sql) === TRUE) {
        echo "Hodnocení uloženo.";
    } else {
        echo "Chyba: " . $sql . "<br>" . $conn->error;

        $conn->close();}

    ?>
</center>
</div>
</body>
</html>
