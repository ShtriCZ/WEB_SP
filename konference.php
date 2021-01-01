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
<!--zjištění uživatelského jména uživatele a jeho vypsání, pokud není uživatel přihlášen je vypsán odkaz pro přihlášení-->
<?php
session_start();
if(isset($_SESSION['jmeno'])){
    echo '
<div class="prihlasen">Jste přihlášen jako: <h10 >'.$_SESSION['jmeno'].'</h10>';
    echo '<br><a href="odhlaseni.php" style="color: #00d408">Odhlásit se</a><br>

</div>';}
else{
    echo '<div class="prihlaseni">
    <p class="text-success"><a href="prihlaseni.php" style="text-decoration: none;color:#007901;">Přihlásit se</a></p> <br>
</div>';
}
?>

<!--Nadpis stránky s odkazem na úvodní stránku-->
<a href="index.php"><h1 style="position: fixed; top:1%; left: 1%">WEB KONFERENCE</h1></a>
<!--Menu s odkazy na další stránky podle toho zda je uživatel přihlášen jako admin nebo není přihlášen vůbec-->
<center>
    <div class="aaa">
        <table cellspacing="5" border="0" cellpadding="0">
            <?php
            //Odkazy v hlaním menu se mění podle přihlášeného uživatele, pokud je nějaký přihlášený
            if(isset($_SESSION['jmeno'])){
                $jmeno=$_SESSION['jmeno'];
                if($_SESSION['jmeno']=="admin"){
                    echo('<td style=" padding: 5px;"><a href="admin_menu.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference.php" class="text-success">KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="sprava_konference.php" class="text-success">SPRÁVA KONFERENCÍ</a></td>
                        <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="uzivatele.php" class="text-success">UŽIVATELÉ</a></td>
                    <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="zverejnit_konferenci.php" class="text-success">ZVEŘEJNIT KONFERENCI</a></td>');
                }

                //Udáje od databáze, do které se chceme připojit
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "web_sp";
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                //Zajištění že se budou data načítat i v češtině
                $conn->query('set character_set_client=utf8');
                $conn->query('set character_set_connection=utf8');
                $conn->query('set character_set_results=utf8');
                $conn->query('set character_set_server=utf8');
                if ($conn->connect_error) {
                    die("Chyba: " . $conn->connect_error);
                }
                //Výběr dat z databáze autorů podle jména
                $prikaz = "SELECT * FROM autori WHERE uzjmeno='$jmeno'";
                $resul = $conn->query($prikaz);

                if ($resul->num_rows > 0) {
                    //Ukáže dané odkazy
                    while ($data = $resul->fetch_assoc()) {
                        echo ' <td style=" padding: 5px;"><a href="autori_menu.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference.php" class="text-success">KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="moje_konference.php" class="text-success">MOJE KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="pridat_konferenci.php" class="text-success">PŘIDAT KONFERENCI</a></td>';
                    }
                }
                //Výběr dat z recenzentů
                $prikaz = "SELECT * FROM recenzenti WHERE uzjmeno='$jmeno'";
                $resul = $conn->query($prikaz);

                if ($resul->num_rows > 0) {
                    //Ukáže dané odkazy
                    while ($data = $resul->fetch_assoc()) {
                        echo ' <td style=" padding: 5px;"><a href="recenzenti_menu.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference.php" class="text-success">KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference_k_recenzi.php" class="text-success">KONFERENCE K RECENZI</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="ohodnotit.php" class="text-success">OHODNOTIT KONFERENCI</a></td>';
                    }
                }

            }
            //Pokud není uživatel přihlášen
            else{
                echo('<td style=" padding: 5px;"><a href="about.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference.php" class="text-success">KONFERENCE</a></td>');
            }
            ?>
        </table>
    </div>
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
        //Vybrání všech položek z databáze konferencí pokud jsou schválené
        $sql = "SELECT * FROM konference WHERE stav='schvaleno'";
       $resul = $conn->query($sql);

        if ($resul->num_rows > 0) {
            //Výpis konferencí
            while($data = $resul->fetch_assoc()) {
                echo "<form method='POST' action='vypsat_konferenci.php'>";
        echo  '<input type="hidden" name="id" value="'.$data["id"].'"><input type="submit" class="btn btn-light" name="nazev" style="width:500px" value="'.$data["nazev"].'" ><br><br>' ;

                echo "</form>";
   }}
        ?>
    </div>
</center>
</body>
</html>
