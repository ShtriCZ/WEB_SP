<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
    <title>Moje konference</title>
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
</center>
    <br>
    <div class="login">


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
        //Chyba pokud neexistuje připojení k databázi
        if ($conn->connect_error) {
            die("Chyba: " . $conn->connect_error);
        }
        $jmeno = $_SESSION['jmeno'];
        //Načtení údajů z databáze konferencí pokud ji přidal přihlášený autor
        $sql = "SELECT * FROM konference WHERE pridal='$jmeno'";

        $resul = $conn->query($sql);

        echo "<br><table  cellspacing='5' border='2' style='text-align: center'>";
        if ($resul->num_rows > 0) {
            //Výpis dat do tabulky
            echo("<tr><td>Název:</td><td>Originalita:</td><td>Téma:</td><td>Technická kvalita:</td><td>Jazyková kvalita:</td><td>Stav:</td>");
            while($data = $resul->fetch_assoc()) {
                echo  "<tr><td width='1%'>".$data["nazev"]."</td><td width='1%'>".$data["originalita"]."</td><td width='1%'>".$data["tema"]."</td>
                <td width='1%'>".$data["technicka_kvalita"]."</td><td width='1%'>".$data["jazykova_kvalita"]."</td><td width='1%'>".$data["stav"]."</td>";
                echo "<form method='POST' action='delete.php'>";

                //Pokud konference není schválena může jí autor odstranit
                if($data["stav"]!='schvaleno'){
                   echo "<td width='1%'><input type='hidden' name='id' value='". $data["id"] . "'> <button type='submit' class='btn btn-danger'>Odstranit
        </button></td>";
                }
                echo"</form></tr>";
            }}
        echo "</table>";
        ?>
    </div>
<!--Script pro obarvení řádků v tabulce-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $("tr:odd").addClass("barva").css("background-color","#151515");
    </script>
</body>
</html>
