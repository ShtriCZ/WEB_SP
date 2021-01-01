<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
    <meta http-equiv="content-style-type" content="text/css">
    <title>Konference</title>
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
            <td style=" padding: 5px;"><a href="admin_menu.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference.php" class="text-success">KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="sprava_konference.php" class="text-success">SPRÁVA KONFERENCÍ</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="uzivatele.php" class="text-success">UŽIVATELÉ</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="zverejnit_konferenci.php" class="text-success">ZVEŘEJNIT KONFERENCI</a></td>
        </table>
    </div>
</center>
<br>
<div class="login" style="width: 1500px;">
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
    if ($conn->connect_error) {
        die("Chyba: " . $conn->connect_error);
    }
    //Výběr dat z konference
    $prikaz = "SELECT * FROM konference";
    $resul = $conn->query($prikaz);
    echo "<br><table  cellspacing='5' border='2' style='text-align: center; '>";
    if ($resul->num_rows > 0) {
        //Výpis dat z databáze konference
        echo "<tr><td>Název:</td><td>Autor:</td><td>Přidal:</td><td>PDF:</td><td>Originalita:</td><td>Téma</td><td>Technická kvalita:</td>
                <td>Jazyková kvalita:</td><td>Doporučení:</td><td>Poznámky:</td><td>Stav:</td><td>Přidat recenzenta:</td></tr>";
        while($data = $resul->fetch_assoc()) {
            $id=$data["id"];
            echo  "<tr><td width='1%'>".$data["nazev"]."</td><td>".$data["autor"]."</td><td>".$data["pridal"]."</td><td><a style='text-decoration: none;color:#007901;' href='pdf/".$data["pdf"]."' target='blank'>".$data["pdf"]."</a></td>
                        <td>".$data["originalita"]."</td><td>".$data["tema"]."</td><td>".$data["technicka_kvalita"]."</td>
                        <td>".$data["jazykova_kvalita"]."</td><td>".$data["doporuceni"]."</td><td title='".$data["poznamky"]."'>".mb_substr($data["poznamky"],0,10)."...</td><td>".$data["stav"]."</td>";
            //Vybrání dat z konference a možnost přiřadit recenzenty ke konferenci
            $prika = "SELECT * FROM recenzenti";
            $result = $conn->query($prika);
            echo "<td><form method='post' action='ulozit_recenzenty.php'><input type='hidden' name='id_konf' value='$id'>";
            if ($result->num_rows > 0) {
                // output data of each row
                echo " <br><select name='id' >";
                while($dat = $result->fetch_assoc()) {
                    echo  "<option value='".$dat["id"]."'>".$dat["jmeno"] ." ". $dat["prijmeni"]."</option>";
                }}
            echo "<input type='submit'value='Uložit'></form></td></tr>";
        }}
    echo "</table>";
    ?>
</div>
<!--Skript pro obarvení lichých řádků-->
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
    $("tr:odd").addClass("barva").css("background-color","#151515");
</script>
</body>
</html>
