<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
    <title>Uložit recenzenty</title>
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
            <td></td>
            <td style=" padding: 5px;"><a href="admin_menu.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference.php" class="text-success">KONFERENCE</a></td>
               <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="sprava_konference.php" class="text-success">SPRÁVA KONFERENCÍ</a></td>
                <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="uzivatele.php" class="text-success">UŽIVATELÉ</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="zverejnit_konferenci.php" class="text-success">ZVEŘEJNIT KONFERENCI</a></td>
        </table>
    </div>

    <br>
<div class="login">
<?php
include_once("connect.php");
//Načtení dat
$id=htmlspecialchars($_POST['id']);
$id_konf=htmlspecialchars($_POST['id_konf']);
//Udáje od databáze, do které se chceme připojit
$servername="localhost";
$username="root";
$password="";
$dbname="WEB_SP";
//Zajištění že se budou data ukládat i v češtině
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->query('set character_set_client=utf8');
$conn->query('set character_set_connection=utf8');
$conn->query('set character_set_results=utf8');
$conn->query('set character_set_server=utf8');

if(isset($id)){
    //Chyba pokud není spojení s databází
if ($conn->connect_error) {
    die("Chyba: " . $conn->connect_error);
}
    $zaznam="";
    //Načtení dat z databáze
    $prikaz = "SELECT recenzent FROM konference WHERE id='$id_konf'";
    $resul = $conn->query($prikaz);
    if ($resul->num_rows > 0) {
        while($data = $resul->fetch_assoc()) {
            $zaznam=$data["recenzent"];
        }}

    //Přidání nového záznamu ke starému místo přepsání
    $zaznam = $zaznam . $id;
    //Uložení dat do databáze
    $sql = "UPDATE  konference SET recenzent = '$zaznam,' WHERE id='$id_konf'";
    if ($conn->query($sql) === TRUE) {
        echo "Recenzent uložen";
    } else {
        echo "Chyba: " . $sql . "<br>" . $conn->error;
    }}
    else{
        echo "Žádný vstup!";
    }
    $conn->close();
?>
</div>
    </body>
</html>