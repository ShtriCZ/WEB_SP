<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
    <meta http-equiv="content-style-type" content="text/css">
    <meta charset="utf-8">
    <title>Uživatelé</title>
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

    <a href='role_uzivatele.php' style="color: #00d408">Změnit roli uživatele</a><br><br>
    <?php
    //Udáje od databáze, do které se chceme připojit
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="web_sp";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    //Zajištění že se budou data načítat i v češtině
    $conn->query('set character_set_client=utf8');
    $conn->query('set character_set_connection=utf8');
    $conn->query('set character_set_results=utf8');
    $conn->query('set character_set_server=utf8');
    //Chyba pokud není spojení s databází
    if ($conn->connect_error) {
        die("Chyba: " . $conn->connect_error);
    }
    //Tlačítko pro ukázání a skrytí autorů
    echo("<button id='autor' class='btn btn-light'>Autoři</button><p id='autori'>");
    //Výběr dat z databáze autorů
    $prikaz = "SELECT * FROM autori";
    $resul = $conn->query($prikaz);
    echo "<br><table  cellspacing='5' border='2'>";
    if ($resul->num_rows > 0) {
        //Výpis dat o autorech
        echo("<tr><td>Jméno:</td><td>Příjmení:</td><td>Email:</td><td>Uživatelské jméno:</td><td>Heslo:</td></tr>");
        while($data = $resul->fetch_assoc()) {
            echo  "<tr><td width='1%'>".$data["jmeno"]."</td><td width='1%'>".$data["prijmeni"]."</td><td width='1%'>".$data["email"]."</td>
                <td width='1%'>".$data["uzjmeno"]."</td><td width='1%'>".$data["heslo"]."</td></tr>";
        }}
    echo "</table></p>";

    //Tlačítko pro ukázání a skrytí recenzentů
    echo("<br><br><button id='recenzent' class='btn btn-light'>Recenzenti</button><p id='recenzenti'>");
    //Výběr dat z databáze recenzentů
    $prikaz = "SELECT * FROM recenzenti";
    $resul = $conn->query($prikaz);
    echo "<br><table  cellspacing='5' border='2'>";
    if ($resul->num_rows > 0) {
        //Výpis dat o recenzentech
        echo("<tr><td>Jméno:</td><td>Příjmení:</td><td>Email:</td><td>Uživatelské jméno:</td><td>Heslo:</td></tr>");
        while($data = $resul->fetch_assoc()) {
            echo  "<tr><td width='1%'>".$data["jmeno"]."</td><td width='1%'>".$data["prijmeni"]."</td><td width='1%'>".$data["email"]."</td>
                <td width='1%'>".$data["uzjmeno"]."</td><td width='1%'>".($data["heslo"])."</td></tr>";
        }}
    echo "</table></p>";
    ?>
</div>
</center>
<!--Skript pro obarvení lichých řádků-->
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
    $("tr:odd").addClass("barva").css("background-color","#151515");
</script>
<!--Skripty pro skrývání tabulek-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#recenzent").click(function(){
            $("#recenzenti").toggle();
        });
    });
</script>
<script>
    $(document).ready(function(){
        $("#autor").click(function(){
            $("#autori").toggle();
        });
    });
</script>
</body>
</html>
